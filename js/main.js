$(function() {
    //$('div.ocultar').hide();  //ya esta en css

    //letteringjs
    $('.nombre-sitio').lettering();

    //Agregar clase a Menu
    $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

    //Menu Fijo

    var windowHeight = $(window).height();
    var barraAltura = $('.barra').innerHeight()

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll > windowHeight) {
            $('.barra').addClass('fixed');
            $('body').css({ 'margin-top': barraAltura + 'px' });
        } else {
            $('.barra').removeClass('fixed');
            $('body').css({ 'margin-top': '0px' });
        }
    });



    //Menu Responsive
    $('.menu-movil').on('click', function() {
        $('.navegacion-principal').slideToggle();
    });



    //Programa de Conferencoas
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function() {

        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();

        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);

        return false;
    });



    //Animaciones para los numeros
    $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1200);
    $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 }, 1200);
    $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3 }, 1500);
    $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9 }, 1500);


    //Animación Countdown
    $('.cuenta-regresiva').countdown('2021/12/28 09:00:00', function(event) {
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    //Colorbox
    $('.invitado-info').colorbox({ inline: true, width: "50%" });


    var map = L.map('mapa').setView([-28.455693, -65.786256], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([-28.455693, -65.786256]).addTo(map)
        .bindPopup('GDLWebCamp 2021<br> Boletos ya disponibles!.')
        .openPopup()
        .bindTooltip('Ubicación.')
        .openTooltip();

});


//