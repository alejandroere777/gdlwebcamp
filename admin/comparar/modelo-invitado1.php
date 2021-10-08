<?php

 include_once 'funciones/funciones.php';//conecto a la bd

$nombre= $_POST['nombre_invitado'];
$apellido= $_POST['apellido_invitado'];
$biografia= $_POST['biografia_invitado'];

$id_registro= $_POST['id_registro'];
/***********NUEEEEVOOO*******/
if($_POST['registro'] == 'nuevo'){
/*  //controlo q envie los datos
    $respuesta = array(
        'post'=> $_POST,
        'file'=> $_FILES
        
    );
    die(json_encode($respuesta));
    */
    //ubicacion de los archivos
    $directorio= "../img/invitados/";
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true); //crea el directorio, recursivo(true)
    }

    //funcion para mover archivos
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])){
        //accedo a la variable
        $imagen_url= $_FILES['archivo_imagen']['name'];
        $imagen_resultado= "Se subio correctamente";
    }
    else{
        $respuesta=array(
            'respuesta' => error_get_last() //imprime el error 
        );
    }

   try{
    $stmt= $conn->prepare('INSERT INTO invitados (nombre_invitado,apellido_invitado, descripcion, url_imagen) VALUES (? ,? ,?,?) ');
    $stmt->bind_param("ssss", $nombre, $apellido, $biografia, $imagen_url);
    $stmt->execute();
    $id_insertado= $stmt->insert_id;
    if($stmt->affected_rows){
        $respuesta = array(
            'respuesta'=> 'exito',
            'id_insertado'=> $id_insertado,
            'resultado_imagen' => $imagen_resultado
        );
    }else{
        $respuesta = array(
            'respuesta'=> 'error'
            
        );
    }
    $stmt->close();
    $conn->close();

   }catch(Exception $e){
       echo "Error: " .$e->getMessage();
   }
   die(json_encode($respuesta));
}
 
//***********EDITAR***** */
  if($_POST['registro']=='actualizar'){


    $directorio= "../img/invitados/";

    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true); //crea el directorio, recursivo(true)
    }

    //funcion para mover archivos
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])){
        //acedo a la variable
        $imagen_url= $_FILES['archivo_imagen']['name'];
        $imagen_resultado= "Se subio correctamente";
    }
    else{
        $respuesta=array(
            'respuesta' => error_get_last() //imprime el error 
        );
    }

    try {
        if($_FILES['archivo_imagen']['size'] >0){

            //con imagen
            $stmt = $conn->prepare('UPDATE invitados SET nombre_invitado =?, apellido_invitado =? , descripcion=?, url_imagen=?, editado= NOW() WHERE invitado_id= ?');
            $stmt-> bind_param("ssssi", $nombre, $apellido, $biografia, $imagen_url, $id_registro);

        }else{
            //sin imagen
            $stmt = $conn->prepare('UPDATE invitados SET nombre_invitado =?, apellido_invitado =? , descripcion=? WHERE invitado_id= ?');
            $stmt-> bind_param("sssi", $nombre, $apellido, $biografia,$id_registro);

        }

        $estado= $stmt->execute();
        /* $registros= $stmt->affected_rows; */

        if($estado ==true ){
            $respuesta= array(
                'respuesta'=> 'exito',
                'id_actualizado'=>$id_registro
            );
        }else{
            $respuesta=array(
                'respuesta' =>'error'
            );
        }
        $stmt->close();
        $conn->close();
    }catch(Exception $e){
        $respuesta=array(
            'respuesta'=>$e->getMessage()
        );
    }
   die(json_encode($respuesta));
};

//*******ELIMINAR******* */
if($_POST['registro']=='eliminar'){
    $id_borrar= $_POST['id'];

    try{
        $stmt= $conn->prepare('DELETE FROM invitados WHERE invitado_id = ?');
        $stmt-> bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta=array(
                'respuesta'=> 'exito',
                'id_eliminado'=> $id_borrar
            );
        }else{
            $respuesta=array(
                'respuesta'=> 'error'
            );
        }
        
    }catch(Exception $e){
        $respuesta=array(
            'respuesta'=>$e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

//***********LOGIIIN***** */
    

if(isset($_POST['login-admin'])){
    $usuarioPost= $_POST['usuario'];
    $passwordPost= $_POST['password'];
    $opciones= array(
        'cost'=>12
    );
   
    try{  
        $stmt= $conn->prepare("SELECT usuario,password,nombre,id_admin,editado,nivel FROM admins WHERE usuario=?");
    $stmt->bind_param("s", $usuarioPost);
    //ejecuto el stmt
    $stmt->execute();
    $stmt->bind_result($usuario,$password,$nombre,$id_admin,$editado,$nivel);
    if($stmt->affected_rows){
        $existe = $stmt->fetch();
        if($existe){
            if(password_verify($passwordPost,$password))
            {
                session_start();
                $_SESSION['usuario']= $usuario;
                $_SESSION['nombre']= $nombre;
                $_SESSION['nivel']= $nivel;
                $_SESSION['id']= $id_admin;
                $respuesta= array(
                    'respuesta'=>'exitoso',
                    'usuario'=> $nombre
                );
                die(json_encode($respuesta));
            }
            else{
                $respuesta= array(
                    'respuesta'=>'error' 
                );
            }
        }
        else
        {
            $respuesta= array(
                'respuesta'=>'error'
            );
        }
        $stmt->close();
        $conn->close();
    }
    }catch(Exception $e){
        echo "Error: " .$e->getMessage();
    }
   
  }