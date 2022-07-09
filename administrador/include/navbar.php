<nav class="bottom-navbar">
    <div class="container">
        <ul class="nav page-navigation">
            <li class="nav-item mr-4 <?php echo ($_GET['module'] == 'dashboard') ? 'active' : ''; ?>">
                <a class="nav-link " href="main?module=dashboard">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>



            <li
                class="nav-item mr-4 <?php echo ($_GET['module'] == 'crear-auto' || $_GET['module'] == 'asignar-categoria' || $_GET['module'] == 'asignar-autoparte') ? 'active' : ''; ?>">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="menu-title">Autos</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="nav-item <?php echo ($_GET['module'] == 'crear-auto') ? 'active' : ''; ?>">
                            <a class="nav-link" href="main?module=crear-auto">Crear auto</a>
                        </li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'asignar-categoria') ? 'active' : ''; ?>"><a
                                class="nav-link" href="main?module=asignar-categoria">Asignar categoría</a></li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'asignar-autoparte') ? 'active' : ''; ?>"><a
                                class="nav-link" href="main?module=asignar-autoparte">Asignar autoparte</a></li>
                    </ul>
                </div>
            </li>

            <li
                class="nav-item mr-4 <?php echo ($_GET['module'] == 'marcas' || $_GET['module'] == 'tipos' || $_GET['module'] == 'modelos' || $_GET['module'] == 'anios' || $_GET['module'] == 'categorias') ? 'active' : ''; ?>">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="menu-title">Configuración</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li
                            class="nav-item <?php echo ($_GET['module'] == 'marcas') ? 'active' : ''; ?>">
                            <a class="nav-link" href="main?module=marcas">Marcas</a>
                        </li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'tipos') ? 'active' : ''; ?>"><a
                                class="nav-link" href="main?module=tipos">Tipos</a></li>
                                <li class="nav-item <?php echo ($_GET['module'] == 'modelos') ? 'active' : ''; ?>"><a
                                class="nav-link" href="main?module=modelos">Modelos</a></li>
                                <li class="nav-item <?php echo ($_GET['module'] == 'anios') ? 'active' : ''; ?>"><a
                                class="nav-link" href="main?module=anios">Años</a></li>
                                <li class="nav-item <?php echo ($_GET['module'] == 'categorias') ? 'active' : ''; ?>"><a
                                class="nav-link" href="main?module=categorias">Categorias</a></li>

                    </ul>
                </div>
            </li>

        </ul>
    </div>
</nav>