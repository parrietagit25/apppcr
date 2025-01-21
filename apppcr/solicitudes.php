<?php include 'templates/header.php'; ?>

<div class="container mt-4">

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-button">
        <button class="btn btn-outline-secondary" type="button" id="search-button">
            <i class="bi bi-search"></i>
        </button>
    </div>

    <!-- Slider con frase -->
    <div id="carouselExampleSlidesOnly" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="p-3 bg-light rounded">
                    <h5 class="fw-bold">RRHH - Solicitudes</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center mb-4">

        <?php if (isset($_GET['id']) && $_GET['id'] == 2) { ?>

            <b>Seleccione una solicitud</b>
            <br>
        
            <select class="form-select" id="nombreSelect" name="nombre">
                <option selected disabled>Seleccione una solicitud</option>
                <option value="1">Vacaciones</option>
                <option value="2">Prestamos</option>
                <option value="3">Carnet</option>
                <option value="4">Permisos</option>
                <option value="5">Cursos</option>
                <option value="6">Vehiculo</option>
            </select>

                <br>

                <input type="submit" class="btn btn-primary" value="Solicitar" style="margin-top:20px;">
          
        <?php }else{ ?>

            <b>El total de solicitudes registradas por los usuarios: 15 Solicitudes</b>
            <a href="#">Ver las solicitudes</a>

        <?php } ?>
    </div>
    
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br><br><br>

<nav class="navbar fixed-bottom navbar-light bg-light border-top">
    <div class="container-fluid">
        <a href="main.php" class="navbar-brand text-center" style="width: 25%;">INICIO</a>
        <a href="#" class="navbar-brand text-center" style="width: 25%;"></a>
        <a href="rrhh.php" class="navbar-brand text-center" style="width: 25%;">VOLVER</a>
        <a href="#" class="navbar-brand text-center" style="width: 25%;"></a>
    </div>
</nav>

<?php include 'templates/footer.php'; ?>
