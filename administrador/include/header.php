<nav class="navbar top-navbar">
    <div class="container">
        <div class="navbar-content">
            <a href="#" class="navbar-brand">
                Adjust<span>App</span>
            </a>
            <ul class="navbar-nav">
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
                                    <?php echo $_SESSION['name']; ?></p>
                                <p class="email text-muted mb-3">Administrador</p>
                            </div>
                        </div>
                        <div class="dropdown-body">
                            <ul class="profile-nav p-0 pt-3">
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