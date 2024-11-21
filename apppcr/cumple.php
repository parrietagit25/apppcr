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
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}

// Obtener el mes actual en texto
$current_month = date('F'); // Obtiene el mes actual en inglés (e.g., January)
// Convertir el mes a español si es necesario
$months = [
    "January" => "Enero", "February" => "Febrero", "March" => "Marzo", "April" => "Abril",
    "May" => "Mayo", "June" => "Junio", "July" => "Julio", "August" => "Agosto",
    "September" => "Septiembre", "October" => "Octubre", "November" => "Noviembre", "December" => "Diciembre"
];
$current_month_es = $months[$current_month];

// Consulta para obtener los cumpleaños del mes corriente
$stmt = $pdo->prepare("
    SELECT cdg.nombre, tc.fecha_cumpleanios_texto
    FROM tabla_cumpleanos AS tc
    JOIN col_datos_generales AS cdg ON tc.codigo = cdg.codigo
    WHERE tc.fecha_cumpleanios_texto LIKE :current_month
    order by tc.fecha_cumpleanios_texto asc
");
$stmt->bindValue(':current_month', "%$current_month_es%", PDO::PARAM_STR);
$stmt->execute();

$cumpleanos = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                    <h5 class="fw-bold">Cumpleaños del mes</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <?php if (!empty($cumpleanos)) { ?>
            <ul class="list-group">
                <?php foreach ($cumpleanos as $cumple) { ?>
                    <li class="list-group-item">
                        <b>Nombre:</b> <?php echo $cumple['nombre']; ?><br>
                        <b>Fecha:</b> <?php echo $cumple['fecha_cumpleanios_texto']; ?>
                    </li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>No hay cumpleaños para este mes.</p>
        <?php } ?>
    </div>
    
</div>

<br>

<?php include 'templates/footer.php'; ?>
