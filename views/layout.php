<!DOCTYPE html>
<html lang="es">

<head>
  <!-- meta etiquetas de SEO -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="Courier Ecuador,  Importaciones para emprendedores, Impotacion de ropa, importaciones Hacia Ecuador, Compras en Amazon, Amazon, Ropa al por mayor">

    <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "Gc-box",
        "description": "Gc-box ofrece servicios de importación y courier en Ecuador. Facilitamos la importación de productos desde cualquier parte del mundo y proporcionamos servicios de courier rápidos y seguros a nivel nacional e internacional.",
        "url": "https://gcbox.mashacorp.com/",
        "logo": "https://www.gcbox.com/logo.png",
        "sameAs": [
          "https://www.facebook.com/profile.php?id=100064165084718&mibextid=LQQJ4d",
          "https://www.instagram.com/gcbox_593?igsh=NzQ5NGQwc2E4eG4z&utm_source=qr"
        ],
        "contactPoint": [
          {
            "@type": "Alejandro",
            "telephone": "+593999978264",
            "contactType": "operaciones"
          }
        ],
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Dirección de Gc-box",
          "addressLocality": "San Rafael",
          "addressRegion": "Pichincha",
          "postalCode": "171103",
          "addressCountry": "Ecuador"
        },
        "serviceArea": {
          "@type": "GeoCircle",
          "geoMidpoint": {
            "@type": "GeoCoordinates",
            "latitude": "-0.3291000",
            "longitude": "-78.4410400"
          },
          "geoRadius": "Radio en kilómetros"
        },
        "hasOfferCatalog": {
          "@type": "OfferCatalog",
          "name": "Servicios de Importación y Courier",
          "itemListElement": [
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Service",
                "name": "Servicio de Importación",
                "description": "Facilitamos la importación de productos desde cualquier parte del mundo a Ecuador."
              }
            },
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Service",
                "name": "Servicio de Courier",
                "description": "Envíos rápidos y seguros de courier a nivel nacional dentro de Ecuador."
              }
            }
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Service",
                "name": "Importacion de Vapes",
                "description": "Compra vapes e importalos de manera segura a Ecuadro, sin restriccion de cantidad."
              }
            }
              "@type": "Offer",
              "itemOffered": {
                "@type": "Service",
                "name": "Importacion para emprendedores",
                "description": "Compra vapes e importalos de manera segura a Ecuadro, sin restriccion de cantidad."
              }
            }
          ]
        }
      
    </script>

    <link rel="canonical" href="https://gc-box.com/" />

    <!-- robot para indexar o no una pagina     -->
    <meta name="robots" content="<?php echo $index; ?> " />

    <!-- etiquetas meta redessociales -->
    <meta property="og:title" content="<?php echo $titulo;?>" />
    <meta property="og:description" content="<?php echo $description ?>" />
    <meta property="og:image" content="URL_de_la_imagen" />



  <!-- fin de metaetiquetas SEO -->

  <title><?php echo $titulo?> | GC-box</title>

  <!-- Favicons -->
  <link href="/build/img/favicon.png" rel="icon">
  <link href="/build/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <?php 
    include __DIR__."/templates/".$header;
  ?>



  <!-- =======================================================
  * Template Name: GC-Box 
  * Updated: 28 de Junio de 2023
  * License: by Masha Corp.
  ======================================================== -->
  <!-- seguimiento de google analityc -->
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZBRQF8ZVCG"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-ZBRQF8ZVCG');
  </script>
</head>
<body class="bg-gray-200 bg-gradient-primary" id="body">

    <?php echo $contenido; ?>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="/build/js/main.js"></script>
  <?php 
    include __DIR__."/templates/".$script;
  ?>

</body>
</html>