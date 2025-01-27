<?php
session_start();
$servername = "localhost"; 
$username = "root";        
//$password = "";
$password = 'elchamo1787$$$';            
$dbname = "apppcr"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Insertar nueva solicitud
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['carta_trabajo'])) {
    
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $code_user = $_SESSION['code']; 
    $stat = 1;            
    $file_add = "";       
    $id_user_aprobado = 0; 

    $sql = "INSERT INTO carta_trabajo (code_user, descripcion, fecha_log, stat, file_add, id_user_aprobado) 
            VALUES ('$code_user', '$descripcion', CURRENT_TIMESTAMP(), $stat, '$file_add', $id_user_aprobado)";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Carta solicitada correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al generar la carta: " . $conn->error . "</div>";
    }
}

// Consultar las solicitudes del usuario actual
$code_user = $_SESSION['code'];
$sql = "SELECT id, descripcion, fecha_log, 
        CASE stat
            WHEN 1 THEN 'Solicitado'
            WHEN 2 THEN 'Aprobado'
            WHEN 3 THEN 'Borrado'
        END AS estado, 
        file_add
        FROM carta_trabajo
        WHERE code_user = '$code_user'";

$result = $conn->query($sql);
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
                    <h5 class="fw-bold">RRHH - Carta de trabajo</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario para generar carta -->
    <div class="row text-center mb-4">
        <form action="" method="POST">
            <p>Ingrese la persona o entidad al cual irá dirigida la carta de trabajo</p>
            <textarea name="descripcion" class="form-control" style="margin:10px;"></textarea>
            <br><br>
            <input type="submit" class="btn btn-primary" value="Solicitar Carta" name="carta_trabajo">
        </form>
    </div>

    <!-- Tabla de solicitudes -->
    <div class="row mt-5">
        <h5 class="text-center">Solicitudes de Cartas de Trabajo</h5>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Carta</th>
                    <th>Descripción</th>
                    <th>Fecha de Solicitud</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        if ($row['file_add'] != '') {
                            $link = '<a href="'.$row['file_add'].'" target="_blank">Carta</a>';
                        }else{
                            $link = '';
                        }

                        echo "<tr>
                                <td>{$link}</td>
                                <td>{$row['descripcion']}</td>
                                <td>{$row['fecha_log']}</td>
                                <td>{$row['estado']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No hay solicitudes registradas.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
</div>

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

<?php 
$conn->close(); 
include 'templates/footer.php'; 
?>
