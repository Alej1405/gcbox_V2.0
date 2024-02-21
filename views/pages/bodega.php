<main id="main">

<!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs margen" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h1><?php echo $titulo ?></h1>
            <ol>
                <li><a class="link" href="/?#servicios">Inicio</a></li>
                <li><?php echo $titulo ?></li>
            </ol>
            </div>
        </div>
    </section>
<!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

    <div class="row gy-4">
        <h3>
            <i class="ri-store-2-line"></i>
            <span>Bodega Internacional</span>
        </h3>
        <div class="col-lg-4">
            <div class="portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                    <img src="/build/img/bodega/bodega.jpeg" alt="Foto de bodega con productos de compra">
                </div>

                <div class="swiper-slide">
                    <img src="/build/img/bodega/bodega1.jpeg" alt="Foto de producto de bodega">
                </div>

                <div class="swiper-slide">
                    <img src="/build/img/bodega/bodega2.jpeg" alt="Foto de producto de bodega">
                </div>

                <div class="swiper-slide">
                    <img src="/build/img/bodega/bodega3.jpeg" alt="Foto de producto de bodega">
                </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="col-lg-8">
            <article class="portfolio-description">
                <p>Si eres un apasionado de las <span>compras en línea</span> desde Estados Unidos y te encuentras en Ecuador, nuestro servicio de <span>Bodega</span> está diseñado para ti. Utiliza nuestro eficiente servicio de courier para recibir tus productos de forma <span>segura y rápida en la puerta de tu hogar</span>.</p>

                <p>Nuestra oferta incluye <span>consolidación de compras</span>, permitiéndote <span>agrupar múltiples artículos</span> en un solo envío. Esto no solo optimiza los <span>costos de envío, sino que también simplifica el proceso</span>, brindándote una experiencia de <span>compras en internet más conveniente</span> y económica. ¡Descubre cómo nuestro servicio de <span>Bodega Internacional</span> puede hacer que tus compras en línea sean más accesibles y eficientes que nunca!</p>
                <h4>Beneficios</h4>
                <ul>
                    <li><strong><span>Consolidación Eficiente</span>:</strong> Maximiza tu experiencia de <span>compras en línea</span> <span>agrupando múltiples productos</span> en un solo envío, optimizando los costos y simplificando el proceso de entrega.</li>
                    <li><strong>Envíos Seguros:</strong> Garantizamos la <span>seguridad de tus productos</span> desde Estados Unidos hasta Ecuador, utilizando servicios de courier confiables para asegurar la llegada intacta de tus compras.</li>
                    <li><strong>Ahorros Significativos:</strong> Disfruta de ahorros notables en costos de envío al aprovechar nuestra consolidación eficiente, permitiéndote disfrutar de tus productos favoritos sin preocuparte por gastos excesivos de envío.</li>
                    <li><strong>Rastreo en Tiempo Real:</strong> Mantente informado sobre el estado de tus envíos con nuestro sistema de rastreo en tiempo real, brindándote tranquilidad y control sobre el proceso de entrega.</li>
                </ul>
            </article>
            <div class="portfolio-info">
                <h3>Informacion del Articulo</h3>
                <ul>
                <li><strong>Autor</strong>: Gc-box operaciones</li>
                <li><strong>Origen</strong>: web</li>
                <li><strong>Calificacion</strong>: <i class="ri-star-s-line"></i><i class="ri-star-s-line"></i><i class="ri-star-s-line"></i><i class="ri-star-s-line"></i></li>
                <li><strong>Redaccion</strong>: Alejandro</li>
                </ul>
                <a href="<?php echo $registrarC ?>" class="get-started-btn blo link scrollto">Registrarse para mas informacion</a>
            </div>
        </div>
    </div>


    </div>
</section><!-- End Portfolio Details Section -->

</main>
<!--======== End #main ========-->
<?php 
    include __DIR__ . "/../templates/footer.php" 
?>