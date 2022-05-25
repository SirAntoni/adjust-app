<nav class="bottom-navbar">
    <div class="container">
        <ul class="nav page-navigation">
            <li class="nav-item mr-4 <?php echo ($_GET['module'] == 'dashboard') ? 'active':''; ?>">
                <a class="nav-link " href="main?module=dashboard">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            <?php if($_SESSION['caja'] == 1){ ?>

            <li
                class="nav-item mr-4 <?php echo ($_GET['module'] == 'cash' || $_GET['module'] == 'cash-closing' || $_GET['module'] == 'income' || $_GET['module'] == 'expenses') ? 'active':''; ?>">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="dollar-sign"></i>
                    <span class="menu-title">Caja</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="nav-item <?php echo ($_GET['module'] == 'cash') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=cash">Apertura</a></li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'cash-closing') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=cash-closing">Cierre /
                                Detalle</a></li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'income') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=income">Ingresos</a>
                        </li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'expenses') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=expenses">Gastos</a>
                        </li>

                    </ul>
                </div>

            </li>

            <?php } ?>
            <?php if($_SESSION['almacen'] == 1){ ?>
            <li
                class="nav-item mr-4 <?php echo ($_GET['module'] == 'articles' || $_GET['module'] == 'categories' || $_GET['module'] == 'brands') ? 'active':''; ?>">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="menu-title">Almacen</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="nav-item <?php echo ($_GET['module'] == 'articles') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=articles">Articulos</a></li>
                                <?php if($_SESSION['rol'] == 0){ ?>
                        <li class="nav-item <?php echo ($_GET['module'] == 'categories') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=categories">Categorias</a></li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'brands') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=brands">Marcas</a></li>
                                <?php } ?>

                    </ul>
                </div>
            </li>
            <?php } ?>
            <?php if($_SESSION['compras'] == 1){ ?>
            <li
                class="nav-item mr-4 <?php echo ($_GET['module'] == 'providers' || $_GET['module'] == 'purchases' || $_GET['module'] == 'add-purchase') ? 'active':''; ?>">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="menu-title">Compras</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li
                            class="nav-item <?php echo ($_GET['module'] == 'purchases' || $_GET['module'] == 'add-purchase') ? 'active':''; ?>">
                            <a class="nav-link" href="main?module=purchases">Compras</a>
                        </li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'providers') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=providers">Proveedores</a></li>

                    </ul>
                </div>
            </li>
            <?php } ?>
            <?php if($_SESSION['ventas'] == 1){ ?>
            <li
                class="nav-item mr-4 <?php echo ($_GET['module'] == 'clients' || $_GET['module'] == 'sales' || $_GET['module'] == 'add-sale') ? 'active':''; ?>">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="menu-title">Ventas</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li
                            class="nav-item <?php echo ($_GET['module'] == 'sales' || $_GET['module'] == 'add-sale') ? 'active':''; ?>">
                            <a class="nav-link" href="main?module=sales">Ventas</a>
                        </li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'clients') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=clients">Clientes</a></li>
                    </ul>
                </div>
            </li>

            <?php } ?>

            <?php if($_SESSION['reportes'] == 1){ ?>

                <li class="nav-item mr-4 <?php echo ($_GET['module'] == 'reports') ? 'active':''; ?>">
                <a class="nav-link " href="main?module=reports">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="menu-title">Reportes</span>
                </a>
            </li>
            <?php } ?>
            <?php if($_SESSION['usuarios'] == 1){ ?>
            <li class="nav-item mr-4 <?php echo ($_GET['module'] == 'users') ? 'active':''; ?>">
                <a class="nav-link" href="main?module=users">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="menu-title">Usuarios</span>
                </a>
            </li>
            <?php } ?>
            <?php if($_SESSION['configuracion'] == 1){ ?>
            <li
                class="nav-item mr-4 <?php echo ($_GET['module'] == 'settings'  || $_GET['module'] == 'vouchers' || $_GET['module'] == 'contacts' || $_GET['module'] == 'payment_methods') ? 'active':''; ?>">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="menu-title">Configuración</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="nav-item <?php echo ($_GET['module'] == 'settings') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=settings">General</a></li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'vouchers') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=vouchers">Comprobantes</a>
                        </li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'contacts') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=contacts">Contactos</a>
                        </li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'payment_methods') ? 'active':''; ?>"><a
                                class="nav-link" href="main?module=payment_methods">Métodos de pago</a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php } ?>



        </ul>
    </div>
</nav>