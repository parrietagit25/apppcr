<?php
session_start();
$servername = "localhost"; 
$username = "root";        
$password = "";            
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
        echo "<div class='alert alert-success'>Carta generada correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al generar la carta: " . $conn->error . "</div>";
    }
}

// Consultar las solicitudes del usuario actual
$code_user = $_SESSION['code'];
$sql = "SELECT c.id, c.descripcion, c.fecha_log, 
        CASE c.stat
            WHEN 1 THEN 'Solicitado'
            WHEN 2 THEN 'Aprobado'
            WHEN 3 THEN 'Borrado'
        END AS estado, 
        c.file_add, 
        cl.nombre
        FROM carta_trabajo c inner join col_datos_generales cl on cl.codigo = c.code_user";

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
                    <h5 class="fw-bold">Aprobar carta de trabajo</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de solicitudes -->
    <div class="row mt-5">
        <h5 class="text-center">Solicitudes de Cartas de Trabajo</h5>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de Solicitud</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nombre']}</td>
                                <td>{$row['descripcion']}</td>
                                <td>{$row['fecha_log']}</td>
                                <td>
                                    <a href='#' data-bs-toggle='modal' data-bs-target='#modalAdjuntar{$row['id']}'>
                                        {$row['estado']}
                                    </a>
                                </td>
                            </tr>";

                        // Modal para adjuntar archivo
                        echo "
                        <div class='modal fade' id='modalAdjuntar{$row['id']}' tabindex='-1' aria-labelledby='modalLabel{$row['id']}' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='modalLabel{$row['id']}'>Adjuntar archivo a la solicitud</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <form action='subir_carta_trabajo.php' method='POST' enctype='multipart/form-data'>
                                            <input type='hidden' name='solicitud_id' value='{$row['id']}'>
                                            <div class='mb-3'>
                                                <label for='archivo' class='form-label'>Seleccione un archivo</label>
                                                <input type='file' class='form-control' name='archivo' id='archivo' required>
                                            </div>
                                            <div class='mb-3'>
                                                <label for='comentario' class='form-label'>Comentario (opcional)</label>
                                                <textarea class='form-control' name='comentario' id='comentario' rows='3'></textarea>
                                            </div>
                                            <button type='submit' class='btn btn-primary'>Subir archivo</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>";
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
