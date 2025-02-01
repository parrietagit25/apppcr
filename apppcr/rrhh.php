<?php 
session_start();
if (!isset($_SESSION['code'])) {
    header("Location: salir.php");
    exit();
}
?>
<?php include 'templates/header.php'; ?>

<div class="container mt-4">

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-button">
        <button class="btn btn-outline-secondary" type="button" id="search-button">
            <i class="bi bi-search"></i>
        </button>
    </div>
    <?php /*
    <!-- Slider con frase -->
    <div id="carouselExampleSlidesOnly" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="p-3 bg-light rounded">
                    <h5 class="fw-bold">RRHH - Admin</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Iconos de funcionalidades -->
    <div class="row text-center mb-4">
        <div class="col-4">
            <a href="colaboradores.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/users.png" alt="RRHH" class="mb-2" width="50">
                    <p>Colaboradores</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="vacaciones.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/vacaciones.png" alt="Beneficios" class="mb-2" width="50">
                    <p>Vacaciones</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="solicitudes.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/solicitud.png" alt="Servicios" class="mb-2" width="50">
                    <p>Solicitudes</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="carta_trabajo.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/carta.png" alt="Noticias" class="mb-2" width="50">
                    <p>Carta de Trabajo</p>
                </div>
            </a>
        </div>
    </div> */ ?>

    <div id="carouselExampleSlidesOnly" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="p-3 bg-light rounded">
                    <h5 class="fw-bold">RRHH - Colaborador</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center mb-4">
        <div class="col-4">
            <a href="colaboradores.php?id=2" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/misdatos.png" alt="RRHH" class="mb-2" width="50">
                    <p>Mis datos</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="vacaciones.php?id=2" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/vacaciones.png" alt="Beneficios" class="mb-2" width="50">
                    <p>Mis Vacaciones</p>
                </div>
            </a>
        </div>
        <!--<div class="col-4">
            <a href="solicitudes.php?id=2" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/solicitud.png" alt="Servicios" class="mb-2" width="50">
                    <p>Mis Solicitudes</p>
                </div>
            </a>
        </div>-->
        <div class="col-4">
            <a href="#" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/carta.png" alt="Noticias" class="mb-2" width="50">
                    <p>Ficha</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="#" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/carta.png" alt="Noticias" class="mb-2" width="50">
                    <p>Pagos</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="carta_trabajo.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/carta.png" alt="Noticias" class="mb-2" width="50">
                    <p>Carta de Trabajo</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="carta_trabajo_aprobar.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/carta.png" alt="Noticias" class="mb-2" width="50">
                    <p>V-RRHH Carta de Trabajo</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="carta_trabajo.php?id=2" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/carta.png" alt="Noticias" class="mb-2" width="50">
                    <p>Incapacidades</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="#" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/carta.png" alt="Noticias" class="mb-2" width="50">
                    <p>RRHH consulta</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="#" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/carta.png" alt="Noticias" class="mb-2" width="50">
                    <p>Vacantes</p>
                </div>
            </a>
        </div>

    </div>

    <!-- Top beneficios 
    <div class="bg-light p-3 rounded">
        <h5 class="fw-bold">Top Beneficios</h5>
        <div class="d-flex">
            <img src="https://via.placeholder.com/100x60" alt="Playa Blanca Resort" class="me-3">
            <div>
                <p class="mb-0">Playa Blanca Resort</p>
                <small class="text-muted">Descuento del 7% de la tarifa</small>
                <div class="d-flex align-items-center">
                    <span class="badge bg-warning text-dark me-2">4.9</span>
                    <small>(37 Reviews)</small>
                </div>
            </div>
        </div>
    </div>-->
    <br>
    <br><br><br><br>
</div>

<!-- Footer navigation
<nav class="navbar fixed-bottom navbar-light bg-light border-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brand text-center" style="width: 25%;">Inicio</a>
        <a href="#" class="navbar-brand text-center" style="width: 25%;">Mensajes</a>
        <a href="#" class="navbar-brand text-center" style="width: 25%;">Eventos</a>
        <a href="#" class="navbar-brand text-center" style="width: 25%;">Perfil</a>
    </div>
</nav> -->
<nav class="navbar fixed-bottom navbar-light bg-light border-top">
    <div class="container-fluid">
        <a href="main.php" class="navbar-brand text-center" style="width: 25%;">INICIO</a>
        <a href="#" class="navbar-brand text-center" style="width: 25%;"></a>
        <a href="main.php" class="navbar-brand text-center" style="width: 25%;">VOLVER</a>
        <a href="#" class="navbar-brand text-center" style="width: 25%;"></a>
    </div>
</nav>
<?php include 'templates/footer.php'; ?>
