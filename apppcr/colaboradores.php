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
                    <h5 class="fw-bold">RRHH - Mis datos</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center mb-4">

        <?php if (isset($_GET['id']) && $_GET['id'] == 2) { ?>
          
            <h4>Mis datos</h4>
            <br>
            <b>Nombre: </b><p> Jhon Doe</p>
            <b>Edad: </b> <p> 35 </p>
            <b>Fecha de contratacion: </b> <b>10/10/2015</b>

        <?php }else{ ?>
            
        <h4>Mis datos</h4>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>Departamento</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2</td>
                    <td>001744</td>
                    <td>GISELA, CHAMORRO</td>
                    <td>Femenino</td>
                    <td>ADMINISTRACION</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>002418</td>
                    <td>OMAYRA, CRUZ</td>
                    <td>Femenino</td>
                    <td>ADMINISTRACION</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>002450</td>
                    <td>YISARA ELIZABETH, CACERES</td>
                    <td>Femenino</td>
                    <td>ADMINISTRACION</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>002481</td>
                    <td>JOSELIN TARINA, URRIOLA HERRERA</td>
                    <td>Femenino</td>
                    <td>ADMINISTRACION</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>HP001</td>
                    <td>CLAUDIA COULSON</td>
                    <td>Masculino</td>
                    <td>ADMINISTRACION</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>001207</td>
                    <td>YAMILETH ESTELA, RODRIGUEZ</td>
                    <td>Femenino</td>
                    <td>ADMINISTRACION</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>002321</td>
                    <td>OMAR, CARRILLO ORO</td>
                    <td>Masculino</td>
                    <td>ADMINISTRACION</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>001082</td>
                    <td>JORGE JUAN, DE LA GUARDIA</td>
                    <td>Masculino</td>
                    <td>ADMINISTRACION</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>001232</td>
                    <td>GABRIEL, JURADO</td>
                    <td>Masculino</td>
                    <td>ADMINISTRACION</td>
                </tr>
            </tbody>
        </table>


        <?php } ?>
    </div>
    
</div>

<br>


<?php include 'templates/footer.php'; ?>
