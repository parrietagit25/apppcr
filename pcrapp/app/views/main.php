<?php
//session_start();
if (!isset($_SESSION['code'])) {
    header("Location: salir.php");
    exit();
}

include __DIR__ . '/header.php'; 
?>

<div class="container mt-4">
    <div class="text-center mb-4">
        <img src="images/user.png" alt="User Avatar" class="rounded-circle" width="80">
        <h4>Bienvenido</h4>
        <p><b><?php echo isset($nombre) ? htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') : 'Usuario'; ?></b></p>
    </div>

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
                    <h5 class="fw-bold">Frase de la semana</h5>
                    <p class="mb-0">"Planificar tus finanzas es el primer paso para lograr la libertad <strong>financiera.</strong>."</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Iconos de funcionalidades -->
    <div class="row text-center mb-4">
        <div class="col-4">
            <a href="rrhh.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="<?php echo BASE_URL; ?>/images/rrhh.png" alt="RRHH" class="mb-2" width="50">
                    <p>RRHH</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="https://pcrgrupo.sharepoint.com/sites/PanamaCarRental/SitePages/CONOCE-LOS-BENEFICIOS.aspx?xsdata=MDV8MDJ8fDhiMDM3MjA0YTk4MTRjMWVlMzJiMDhkZDBhMmRiMmIxfGQzNDc5NzI4MDM4ZDQ5ODY4NTgzMGJjYWE4OTk5NTY5fDB8MHw2Mzg2Nzc5MTM1NDQyODcwMTl8VW5rbm93bnxWR1ZoYlhOVFpXTjFjbWwwZVZObGNuWnBZMlY4ZXlKV0lqb2lNQzR3TGpBd01EQWlMQ0pRSWpvaVYybHVNeklpTENKQlRpSTZJazkwYUdWeUlpd2lWMVFpT2pFeGZRPT18MXxMMk5vWVhSekx6RTVPakF4T1RnMlpESXlMVGsxT1RrdE5EWTFZeTA0T0RGakxUUmpPREUxTkRrMFpqZ3lZVjlsWm1Vd01HUmhPQzAyTVdRMExUUTBNR0V0WVdOaFppMHdZVE00TTJZMk5UVmxZbUZBZFc1eExtZGliQzV6Y0dGalpYTXZiV1Z6YzJGblpYTXZNVGN6TWpFNU5EVTFNekEzTWc9PXwyOGNkNTdmNzFiN2E0OTIxZTMyYjA4ZGQwYTJkYjJiMXwzOWU3YjQxOWEzODk0ZjIwOGFjNWQyMDU2N2YxMjEwZQ%3D%3D&sdata=c3hSbGRoTk44Wnk3UnZEZSt0R3lPUjNVZmNPL3kzREx5eUlwcjdSVmlCZz0%3D&ovuser=d3479728-038d-4986-8583-0bcaa8999569%2Cpedro.arrieta%40grupopcr.com.pa&OR=Teams-HL&CT=1732234125670&clickparams=eyJBcHBOYW1lIjoiVGVhbXMtRGVza3RvcCIsIkFwcFZlcnNpb24iOiI0OS8yNDEwMjAwMTMxOCIsIkhhc0ZlZGVyYXRlZFVzZXIiOmZhbHNlfQ%3D%3D" target="_blank" class="text-decoration-none">
                <div class="p-2">
                    <img src="<?php echo BASE_URL; ?>/images/beneficios.png" alt="Beneficios" class="mb-2" width="50">
                    <p>Beneficios</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="carnet.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="<?php echo BASE_URL; ?>/images/carnet.png" alt="Servicios" class="mb-2" width="50">
                    <p>Carnet</p>
                </div>
            </a>
        </div>
        <!-- <div class="col-4">
            <a href="#" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/notocias.png" alt="Noticias" class="mb-2" width="50">
                    <p>Noticias</p>
                </div>
            </a>
        </div> -->
        <div class="col-4">
            <a href="cumple.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="<?php echo BASE_URL; ?>/images/hb.png" alt="Cumpleaños" class="mb-2" width="50">
                    <p>Cumpleaños del mes</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="ms-outlook://" class="text-decoration-none">
                <div class="p-2">
                    <img src="<?php echo BASE_URL; ?>/images/hb.png" alt="Cumpleaños" class="mb-2" width="50">
                    <p>Correo Electronico</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="tel:+1234567890" class="text-decoration-none">
                <div class="p-2">
                    <img src="<?php echo BASE_URL; ?>/images/hb.png" alt="Cumpleaños" class="mb-2" width="50">
                    <p>Linea de apoyo</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="cumple.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="<?php echo BASE_URL; ?>/images/hb.png" alt="Cumpleaños" class="mb-2" width="50">
                    <p>Operativa de la empresa</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="cumple.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="<?php echo BASE_URL; ?>/images/hb.png" alt="Cumpleaños" class="mb-2" width="50">
                    <p>Crecimiento interno</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="cumple.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="<?php echo BASE_URL; ?>/images/hb.png" alt="Cumpleaños" class="mb-2" width="50">
                    <p>Evaluacion de desempeño</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Top beneficios -->
    <div class="bg-light p-3 rounded">
        <h5 class="fw-bold">Top Beneficios</h5>
        <div class="d-flex">
            <img src="<?php echo BASE_URL; ?>/images/playablanca.jpg" alt="Playa Blanca Resort" class="me-3" width="100">
            <div>
                <p class="mb-0">Playa Blanca Resort</p>
                <small class="text-muted">Descuento del 7% de la tarifa</small>
                <div class="d-flex align-items-center">
                    <span class="badge bg-warning text-dark me-2">4.9</span>
                    <small>(37 Reviews)</small>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-light text-center text-lg-start mt-5">
    <div class="container p-4">
        <p>&copy; 2024 GrupoPCR. Todos los derechos reservados.</p>
    </div>
</footer>

<?php include __DIR__ . '/footer.php'; ?>
