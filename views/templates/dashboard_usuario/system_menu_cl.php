<!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link <?php echo ($titulo === 'Dashboard') ? '' : 'collapsed'; ?>" href="/dashboard-u">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Cargas y Embarques</li>

        <li class="nav-item">
            <a class="nav-link <?php echo ($titulo === 'Compras') ? '' : 'collapsed'; ?>" href="/registro">
            <i class="bi bi-box-arrow-in-down"></i>
            <span>Agregar</span>
            </a>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            <a class="nav-link <?php echo ($titulo === 'Procesos') ? '' : 'collapsed'; ?>" href="/embarques">
            <i class="bi bi-airplane-fill"></i>
            <span>Procesos</span>
            </a>
        </li><!-- End Components Nav -->

    <li class="nav-heading">Serviocios y remitentes</li>

        <li class="nav-item">
            <a class="nav-link <?php echo ($titulo === 'Consignatarios') ? '' : 'collapsed'; ?>" href="/consignatarios">
            <i class="ri-folder-user-fill"></i>
            <span>Consignatarios</span>
            </a>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo ($titulo === 'Servicios') ? '' : 'collapsed'; ?>" href="/servicios">
            <i class="ri-hand-coin-line"></i>
            <span>Servicios</span>
            </a>
        </li><!-- End Components Nav -->
    
    <li class="nav-heading">Configuración</li>

    <li class="nav-item">
        <a class="nav-link <?php echo ($titulo === 'Perfil') ? '' : 'collapsed'; ?>" href="/dashboard-perfil">
        <i class="bi bi-person"></i>
        <span>Profile</span>
        </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
        <a class="nav-link <?php echo ($titulo === 'F.A.Q') ? '' : 'collapsed'; ?>" href="/dashboard-faq">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
        </a>
    </li><!-- End F.A.Q Page Nav -->

    <li class="nav-item">
        <a class="nav-link <?php echo ($titulo === 'Contact') ? '' : 'collapsed'; ?>" href="https://wa.me/message/IAVMS2G5JDZFC1" target="_blank">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
        </a>
    </li><!-- End Contact Page Nav -->

    </ul>

    </aside><!-- End Sidebar-->