<?php
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
?>
<!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
        <a href="/dashboard-u" class="logo d-flex align-items-center">
            <img src="/build/img/favicon.png" alt="logo de Gc-box">
            <span class="d-none d-lg-block">GC-Box</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <!-- <i class="bi bi-search"></i> -->
            </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#">
                    <span class="d-none d-md-block ps-2">
                    <?php echo $nombre." ".$apellido; ?>
                    </span>
                </a>
            </li><!-- End Profile Nav -->
            <li class="nav-item dropdown pe-3">
                <a href="/salir" class="btn btn-danger">
                    Salir
                </a>
            </li><!-- End Profile Nav -->

        </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->