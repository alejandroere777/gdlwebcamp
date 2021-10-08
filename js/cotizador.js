(function() {
    "use strict";



    var regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function() {


        //Campos datos usuarios
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');


        //campos pases
        var pase_dia = document.getElementById('pase_dia');
        var pase_dosdias = document.getElementById('pase_dosdias');
        var pase_completo = document.getElementById('pase_completo');

        //Botones  y divs
        var calcular = document.getElementById('calcular');
        var errorDiv = document.getElementById('error');
        var botonRegistro = document.getElementById('btnRegistro');
        var lista_productos = document.getElementById('lista-productos');
        var suma = document.getElementById('suma-total');

        //Extras
        var camisas = document.getElementById('camisa_evento');
        var etiquetas = document.getElementById('etiqueta');

        botonRegistro.disabled = true;

        if (document.getElementById('calcular')) {

            calcular.addEventListener('click', calcularMontos);

            pase_dia.addEventListener('blur', mostrarDias);
            pase_dosdias.addEventListener('blur', mostrarDias);
            pase_completo.addEventListener('blur', mostrarDias);

            nombre.addEventListener('blur', validarCampos);
            apellido.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarMail);

            function validarCampos() {
                if (this.value == '') {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = 'Este campo es obligatorio';
                    this.style.border = '1px solid red';
                    errorDiv.style.border = '1px solid red';
                } else {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid #CCCCCC';
                }
            }


            function validarMail() {
                if (this.value.indexOf("@") > -1) {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid #CCCCCC';
                } else {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = 'Este campo debe contener un email.';
                    this.style.border = '1px solid red';
                    errorDiv.style.border = '1px solid red';
                }
            }




            function calcularMontos(event) {
                event.preventDefault();

                if (regalo.value == '') {
                    alert("Debes elegir un regalo");
                    regalo.focus();
                } else {
                    var boletosDia = parseInt(pase_dia.value, 10) || 0;
                    var boletos2Dias = parseInt(pase_dosdias.value, 10) || 0;
                    var boletosCompleto = parseInt(pase_completo.value, 10) || 0;
                    var cantCamisas = parseInt(camisas.value, 10) || 0;
                    var cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

                    console.log("Boletos Dia: " + boletosDia);
                    console.log("Boletos 2 Dia: " + boletos2Dias);
                    console.log("Boletos Completos: " + boletosCompleto);

                    var totalpagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletosCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

                    console.log(totalpagar);

                    var listadoProductos = [];

                    if (boletosDia >= 1) {
                        listadoProductos.push(boletosDia + ' Pases por Día');
                    }
                    if (boletos2Dias >= 1) {
                        listadoProductos.push(boletos2Dias + ' Pases por 2 Días');
                    }
                    if (boletosCompleto >= 1) {
                        listadoProductos.push(boletosCompleto + ' Pases Completos');
                    }

                    if (cantCamisas >= 1) {
                        listadoProductos.push(cantCamisas + ' Camisas');
                    }
                    if (cantEtiquetas >= 1) {
                        listadoProductos.push(cantEtiquetas + ' Etiquetas');
                    }

                    console.log(listadoProductos);

                    lista_productos.style.display = "block";
                    lista_productos.innerHTML = '';
                    for (var i = 0; i < listadoProductos.length; i++) {
                        lista_productos.innerHTML += listadoProductos[i] + '<br/>';

                    }

                    suma.innerHTML = "$" + totalpagar.toFixed(2);

                    botonRegistro.disabled = false;
                    document.getElementById('total_pedido').value = totalpagar;
                }
            }


            function mostrarDias() {
                var boletosDia = parseInt(pase_dia.value, 10) || 0,
                    boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                    boletosCompleto = parseInt(pase_completo.value, 10) || 0;

                var diasElegidos = [];

                if (boletosDia > 0) {
                    diasElegidos.push('viernes');
                    console.log(diasElegidos);
                }
                if (boletos2Dias > 0) {
                    diasElegidos.push('viernes', 'sabado');
                    console.log(diasElegidos);
                }
                if (boletosCompleto > 0) {
                    diasElegidos.push('viernes', 'sabado', 'domingo');
                    console.log(diasElegidos);
                }


                for (var i = 0; i < diasElegidos.length; i++) {
                    document.getElementById(diasElegidos[i]).style.display = 'block';
                }
            }


            // var map = L.map('mapa').setView([-28.455693, -65.786256], 16);

            // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            // }).addTo(map);

            // L.marker([-28.455693, -65.786256]).addTo(map)
            //     .bindPopup('GDLWebCamp 2021<br> Boletos ya disponibles!.')
            //     .openPopup()
            //     .bindTooltip('Ubicación.')
            //     .openTooltip();
        }

    }); //DOM content loaded
})();