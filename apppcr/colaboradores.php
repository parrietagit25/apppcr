<?php 

session_start();
if (!isset($_SESSION['code'])) {
    header("Location: salir.php");
    exit();
}

include 'templates/header.php'; 

$host = 'localhost'; 
$dbname = 'apppcr'; 
$username = 'root'; 
$password = 'elchamo1787$$$';
//$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}

$code = $_SESSION['code'];
$stmt = $pdo->prepare("SELECT * FROM col_datos_generales_completos WHERE codigo_empleado = :code");
$stmt->bindParam(':code', $code, PDO::PARAM_INT);
$stmt->execute();

while ($list_code = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $codigo_empleado = $list_code['codigo_empleado'];
    $cod_horario = $list_code['cod_horario'];
    $nombre = $list_code['nombre'];
    $apellido = $list_code['apellido'];
    $fecha_nacimiento = $list_code['fecha_nacimiento'];
    $sexo = $list_code['sexo'];
    $estado_civil = $list_code['estado_civil'];
    $email = $list_code['email'];
    $telefono = $list_code['telefono'];
    $direccion = $list_code['direccion'];
    $fecha_ingreso = $list_code['fecha_ingreso'];
    $ultimo_pago = $list_code['ultimo_pago'];
}

?>

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
                    <h5 class="fw-bold">RRHH - Mis datos</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">

        <?php if (isset($_GET['id']) && $_GET['id'] == 2) { 
          
                    echo 'Codigo Empleado: <b> '.$codigo_empleado.' </b> <br>';
                    echo 'Horario: <b> '.$cod_horario.' </b> <br>';
                    echo 'Nombre: <b> '.$nombre.' </b> <br>';
                    echo 'Apellido: <b> '.$apellido.' </b> <br>';
                    echo 'Fecha Nacimiento: <b> '.$fecha_nacimiento.' </b> <br>';
                    echo 'Sexo: <b> '.$sexo.' </b> <br>';
                    echo 'Estado Civil: <b> '.$estado_civil.' </b> <br>';
                    echo 'Email: <b> '.$email.' </b> <br>';
                    echo 'Telefono: <b> '.$telefono.' </b> <br>';
                    echo 'Direccion: <b> '.$direccion.' </b> <br>';
                    echo 'Fecha de ingreso: <b> '.$fecha_ingreso.' </b> <br>';
                    echo 'Ultimo Pago: <b> '.$ultimo_pago.' </b> <br>';

         } ?> 
         
    </div>
    
</div>

<br>

<nav class="navbar fixed-bottom navbar-light bg-light border-top">
    <div class="container-fluid">
        <a href="main.php" class="navbar-brand text-center" style="width: 25%;">INICIO</a>
        <a href="#" class="navbar-brand text-center" style="width: 25%;"></a>
        <a href="rrhh.php" class="navbar-brand text-center" style="width: 25%;">VOLVER</a>
        <a href="#" class="navbar-brand text-center" style="width: 25%;"></a>
    </div>
</nav>

<?php include 'templates/footer.php'; ?>
