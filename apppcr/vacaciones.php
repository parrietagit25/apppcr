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
$stmt = $pdo->prepare("SELECT dias_pendientes FROM col_vacaciones WHERE codigo = :code");
$stmt->bindParam(':code', $code, PDO::PARAM_INT);
$stmt->execute();

while ($list_code = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $dias_pendientes = $list_code['dias_pendientes'];
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
          
            <b>El total de vacaciones acumuladas hasta hoy son: <br> <?php echo $dias_pendientes; ?> Dias</b>

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

<?php include 'templates/footer.php'; ?>
