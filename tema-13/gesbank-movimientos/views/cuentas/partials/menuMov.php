<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>cuentas">Cuentas</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['showMovs']) || in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['showMovs'])) ? 'active' : 'disabled' ?>"
                        aria-current="page" href="<?= URL ?>cuentas">Volver a <b>Cuentas</b></a>
                </li>
            </ul>
        </div>
    </div>
</nav>