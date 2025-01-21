<?php 
session_start();
if (!isset($_SESSION['code'])) {
    header("Location: salir.php");
    exit();
}

$host = 'localhost'; 
$dbname = 'apppcr'; 
$username = 'root'; 
$password = 'elchamo1787$$$'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}

$code = $_SESSION['code'];
$stmt = $pdo->prepare("SELECT * FROM col_vacaciones WHERE codigo = :code");
$stmt->bindParam(':code', $code, PDO::PARAM_INT);
$stmt->execute();

while ($list_code = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $dias_pendientes = $list_code['dias_pendientes'];
    $fecha_ingreso = $list_code['fecha_ingreso'];
    $proximas_vac = $list_code['proximas_vac'];
    $vac_pag_hasta = $list_code['vac_pag_hasta'];
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

    <!-- Slider con frase -->
    <div id="carouselExampleSlidesOnly" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="p-3 bg-light rounded">
                    <h5 class="fw-bold">RRHH - Vacaciones</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center mb-4">

        <?php if (isset($_GET['id']) && $_GET['id'] == 2) { ?>
          
            <p>Vacaciones Acumuladas: <b><?php echo $dias_pendientes; ?></b> Días</p>
            <p>Fecha de Ingreso: <b><?php echo $fecha_ingreso; ?></b></p>
            <p>Próximas Vacaciones: <b><?php echo $proximas_vac; ?></b></p>
            <p>Vacaciones pagadas hasta: <b><?php echo $vac_pag_hasta; ?></b></p>

        <?php }else{ ?>

            <b>Seleccione un colaborador para visualizar sus dias de vacaciones disponibles</b>
            <br>
        
            <select class="form-select" id="nombreSelect" name="nombre">
                    <option selected disabled>Seleccione un colaborador</option>
                    <option value="1">GISELA, CHAMORRO</option>
                    <option value="2">OMAYRA, CRUZ</option>
                    <option value="3">YISARA ELIZABETH, CACERES</option>
                    <option value="4">JOSELIN TARINA, URRIOLA HERRERA</option>
                    <option value="5">CLAUDIA COULSON</option>
                    <option value="6">YAMILETH ESTELA, RODRIGUEZ</option>
                    <option value="7">OMAR, CARRILLO ORO</option>
                    <option value="8">JORGE JUAN, DE LA GUARDIA</option>
                    <option value="9">GABRIEL, JURADO</option>
                </select>

                <br>

                <input type="submit" class="btn btn-primary" value="Consultar" style="margin-top:20px;">

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
