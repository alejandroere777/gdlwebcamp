$(function() {
    $("#registros").DataTable({
        "paging": true,
        'pageLength': 10,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        'language': {
            paginate: {
                next: 'Siguiente',
                previous: 'Anterior',
                last: 'Último',
                first: 'Primero'
            },
            info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
            emptyTable: 'No hay registros',
            infoEmpty: '0 Resgistros',
            search: 'Buscar:'

        }
    });

    $('#crear_registro_admin').attr('disabled', true);


    $('#repetir_password').on('input', function() {
        var password_nuevo = $('#password').val();

        if ($(this).val() == password_nuevo) {
            $('#resultado_password').text('Correcto');
            $('#resultado_password').parents('.form-group').addClass('text-success').removeClass('text-error');
            $('input#password').parents('.form-group').addClass('text-success').removeClass('text-error');
            $('#crear_registro_admin').attr('disabled', false);
        } else {
            $('#resultado_password').text('No son iguales!');
            $('#resultado_password').parents('.form-group').addClass('text-error').removeClass('text-success');
            $('input#password').parents('.form-group').addClass('text-error').removeClass('text-success');
            $('#crear_registro_admin').attr('disabled', true);
        }
    });

    //Date picker
    // $('#reservationdate').datetimepicker({
    //     format: 'L'
    // });

    // $('#icono').iconpicker();
    (async() => {
        const response = await fetch('js/fontawesome4.json')
        const result = await response.json()
        const iconpicker = new Iconpicker(document.querySelector('.iconpicker'), {
            icons: result,
            showSelectedIn: document.querySelector('.selected-icon'),
            defaultValue: document.querySelector('.iconpicker').getAttribute('icono'),
            valueFormat: val => `fa ${val}`,

        })

    })()

    // $(document).ready(function() {
    //     $('input').iCheck({
    //         checkboxClass: 'icheckbox_square',
    //         radioClass: 'iradio_square',
    //         increaseArea: '20%' // optional
    //     });
    // });
});