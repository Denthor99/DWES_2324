<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Alumnos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('student.create')}}">Nuevo</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ordenar
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('student.order', ['field' => 'id'])}}">Id</a></li>
                <li><a class="dropdown-item" href="{{route('student.order', ['field' => 'lastname'])}}">Apellidos</a></li>
                <li><a class="dropdown-item" href="{{route('student.order', ['field' => 'name'])}}">Nombre</a></li>
                <li><a class="dropdown-item" href="{{route('student.order', ['field' => 'phone'])}}">Telefono</a></li>
                <li><a class="dropdown-item" href="{{route('student.order', ['field' => 'city'])}}">Ciudad</a></li>
                <li><a class="dropdown-item" href="{{route('student.order', ['field' => 'email'])}}">Email</a></li>
                <li><a class="dropdown-item" href="{{route('student.order', ['field' => 'course'])}}">Curso</a></li>
                <li><hr class="dropdown-divider"></li>
            </ul>
            </li>
    
        </ul>
        <form class="d-flex" method="GET" action="#">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="expresion">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </form>
        </div>
    </div>
</nav>