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

    <div class="row text-center mb-4">

        <?php if (isset($_GET['id']) && $_GET['id'] == 2) { ?>
          
            <p>Ingrese la persona o entidad al cual ira dirigida la carta de trabajo</p>
            <br>
            <textarea name="" id="" class="form-control" style="margin:10px;"></textarea>
            <br>
            <br>
            <input type="submit" class="btn btn-primary" value="Generar Carta">
            


        <?php }else{ ?>

            <p>Seleccione un colaborador y luego Presiones el Boton para generar la carta de trabajo o enviarla por correo</p>
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
            <input type="submit" class="btn btn-primary" value="Generar Carta" style="margin-top:20px;">
            <br>
            <input type="submit" class="btn btn-success" value="Enviar por correo" style="margin-top:10px;">

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
