<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?=URL?>cuentas">Cuentas</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link 
                            <?=(in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['new']))?'activate':'disabled'?>" aria-current="page" href="<?=URL?>cuentas/nuevo">Nuevo</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle
                            <?=(in_array($_SESSION['id_rol'],$GLOBALS['clientes']['order']))?'activate':'disabled'?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ordenar
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?=URL?>cuentas/ordenar/1">Id</a></li>
                                <li><a class="dropdown-item" href="<?=URL?>cuentas/ordenar/2">Nº de cuenta</a></li>
                                <li><a class="dropdown-item" href="<?=URL?>cuentas/ordenar/8">Titular</a></li>
                                <li><a class="dropdown-item" href="<?=URL?>cuentas/ordenar/4">Fecha</a></li>
                                <li><a class="dropdown-item" href="<?=URL?>cuentas/ordenar/5">Fecha Ult. Mov.</a></li>
                                <li><a class="dropdown-item" href="<?=URL?>cuentas/ordenar/6">Nº Movimientos</a></li>
                                <li><a class="dropdown-item" href="<?=URL?>cuentas/ordenar/7">saldo</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link 
                            <?=(in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['import']))?'activate':'disabled'?>" aria-current="page" href="<?=URL?>cuentas/importar">Importar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link 
                            <?=(in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['export']))?'activate':'disabled'?>" aria-current="page" href="<?=URL?>cuentas/exportar">Exportar</a>
                        </li>

                    </ul>
                    <form class="d-flex" method="get" action="<?=URL?>cuentas/buscar">
                        <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" name="expresion">
                        <button class="btn btn-outline-secondary
                        <?=(in_array($_SESSION['id_rol'],$GLOBALS['clientes']['filter']))?null:'disabled'?>" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>