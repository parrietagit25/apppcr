<?php 
session_start();
if (!isset($_SESSION['code'])) {
    header("Location: salir.php");
    exit();
}

$host = 'localhost'; 
$dbname = 'apppcr'; 
$username = 'root'; 
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}

$code = $_SESSION['code'];
$stmt = $pdo->prepare("SELECT nombre FROM col_vacaciones WHERE codigo = :code");
$stmt->bindParam(':code', $code, PDO::PARAM_INT);
$stmt->execute();

while ($list_code = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $nombre = $list_code['nombre'];
}

?>
<?php include 'templates/header.php'; ?>

<div class="container mt-4">
    <div class="text-center mb-4">
        <img src="images/user.png" alt="User Avatar" class="rounded-circle" width="80">
        <h4>Bienvenido</h4>
        <p><b><?php echo $nombre; ?></b></p>
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
                    <img src="images/rrhh.png" alt="RRHH" class="mb-2" width="50">
                    <p>RRHH</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="#" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/beneficios.png" alt="Beneficios" class="mb-2" width="50">
                    <p>Beneficios</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="#" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/servicios.png" alt="Servicios" class="mb-2" width="50">
                    <p>Servicios</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="#" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/notocias.png" alt="Noticias" class="mb-2" width="50">
                    <p>Noticias</p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="cumple.php" class="text-decoration-none">
                <div class="p-2">
                    <img src="images/hb.png" alt="Cumpleaños" class="mb-2" width="50">
                    <p>Cumpleaños del mes</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Top beneficios -->
    <div class="bg-light p-3 rounded">
        <h5 class="fw-bold">Top Beneficios</h5>
        <div class="d-flex">
            <img src="images/playablanca.jpg" alt="Playa Blanca Resort" class="me-3" width="100">
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

<!-- Footer navigation -->
<nav class="navbar fixed-bottom navbar-light bg-light border-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brand text-center" style="width: 25%;">Inicio</a>
        <a href="#" class="navbar-brand text-center" style="width: 25%;">Mensajes</a>
        <a href="#" class="navbar-brand text-center" style="width: 25%;">Eventos</a>
        <a href="#" class="navbar-brand text-center" style="width: 25%;">Perfil</a>
    </div>
</nav>

<?php include 'templates/footer.php'; ?>
