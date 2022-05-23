<nav class="navbar top-navbar">
    <div class="container">
        <div class="navbar-content">
            <a href="#" class="navbar-brand">
                Adjust<span>App</span>
            </a>
            <ul class="navbar-nav">

                <!--li class="nav-item dropdown nav-apps">
                                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="grid"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="appsDropdown">
                                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                                        <p class="mb-0 font-weight-medium">Aplicaciones</p>
                                    </div>
                                    <div class="dropdown-body">
                                        <div class="d-flex align-items-center apps">
                                            <a href="pages/apps/chat.html"><i data-feather="message-square"
                                                    class="icon-lg"></i>
                                                <p>Soporte</p>
                                            </a>
                                            <a href="pages/apps/calendar.html"><i data-feather="calendar"
                                                    class="icon-lg"></i>
                                                <p>Calculadora</p>
                                            </a>
                                            <a href="pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i>
                                                <p>Perfil</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li-->
                <li class="nav-item dropdown nav-profile">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/images/user.svg" alt="profile">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                        <div class="dropdown-header d-flex flex-column align-items-center">
                            <div class="figure mb-3">
                                <img src="assets/images/user.svg" alt="">
                            </div>
                            <div class="info text-center">
                                <p class="name font-weight-bold mb-0">
                                    <?php echo $_SESSION['name']. " " . $_SESSION['last_name']; ?></p>
                                <p class="email text-muted mb-3">
                                    <?php echo ($_SESSION['rol'] == 0) ? "Administrador" : "Asesor"; ?></p>
                            </div>
                        </div>
                        <div class="dropdown-body">
                            <ul class="profile-nav p-0 pt-3">
                                <li class="nav-item">
                                    <a href="pages/general/profile.html" class="nav-link">
                                        <i data-feather="user"></i>
                                        <span>Perfil</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="logout" class="nav-link">
                                        <i data-feather="log-out"></i>
                                        <span>Cerrar Sesión</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="horizontal-menu-toggle">
                <i data-feather="menu"></i>
            </button>
        </div>
    </div>
</nav>