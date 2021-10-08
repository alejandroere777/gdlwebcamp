<footer class="site-footer">
        <div class="contenedor clearfix">
            <div class="footer-informacion">
                <h3>Sobre <span>gdlwebcamp</span></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, iste aspernatur a culpa ab optio voluptatem neque est ea ut quisquam, odio aliquid dignissimos repellendus praesentium? Id quae alias vitae!</p>
            </div>

            <div class="ultimos-tweets">
                <h3>Ultimos <span>Tweets</span></h3>
                <ul>
                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Lorem ipsum dolor, sit amet consectetur adipisicing elit. </li>
                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Lorem ipsum dolor, sit amet consectetur adipisicing elit. </li>
                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Lorem ipsum dolor, sit amet consectetur adipisicing elit. </li>
                </ul>
            </div>

            <div class="menu">
                <h3>Redes <span>Sociales</span></h3>
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>
            </div>
        </div>
        <p class="copyright">Todos los Deerechos Reservados GDLWEBCAMP 2021</p>
    </footer>


</body>


<script src="js/vendor/modernizr-3.11.2.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/video.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="js/plugins.js"></script>
<script src="js/jquery.animateNumber.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.lettering.js"></script>

<?php 
        $archivo= basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "", $archivo);
        if($pagina == 'invitados' || $pagina == 'index'){
            echo '<script src="js/jquery.colorbox-min.js"></script>';
        } else if($pagina == 'conferencia'){
            echo '<script src="js/jquery.colorbox-min.js"></script>';
        }
    ?>

<script src="js/jquery.colorbox-min.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/main.js"></script>
<script src="js/cotizador.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'anonymizeIp', true);
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js " async></script>

</html>