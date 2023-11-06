<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <title>Actividad 3.1 Formulario Registro</title>
    <?php
    include 'layouts/head.html';
    ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-person-fill-check"></i>
            <span class="fs-5">Actividad 3.1 Formulario Registro</span>
        </header>

        <legend>Datos del usuario</legend>
        <form>
            <div class="mb-3">
                <nav>
                    <ul class="nav nav-tabs">
                        <?php if ($tipoUser == "admin"): ?>
                            <li class="nav-item">
                                <a class="nav-link"  href="#">Nuevo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Eliminar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Actualizar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Consultar</a>
                            </li>
                        <?php elseif ($tipoUser == "editor"): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Nuevo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Actualizar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Consultar</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Consultar</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
            <div class="mb-3">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Campo</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Usuario</td>
                            <td>
                                <?= $user ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <?= $email ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <?= $passwd ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tipo de Usuario</td>
                            <td>
                                <?= $tipoUser ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </form>
        <br>
        <br>
        <br>


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>