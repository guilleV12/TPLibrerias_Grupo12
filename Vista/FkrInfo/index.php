<!DOCTYPE html>
<html lang="en">
<head>
    <title>Faker</title>
    <link rel="stylesheet" href="../Css/persona.css"></link>
</head>
<body>
    <?php
        include_once '../Estructura/header.php';
        include_once '../../configuracion.php';
       
    ?>
     <div class="row">
     <div class="col-2">
     </div>
        <div class="col-4">
        <div class="card m-4" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Repositorio</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Libreria para generar datos sobre personas.</p>
                <a href="https://github.com/fzaninotto/Faker" class="card-link">Ir a repo</a>
            </div>
        </div>
        </div>
        <div class="col-4">
        <div class="card m-4" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Ejemplo</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text"></p>
                <a href="ejemploFkr.php" class="card-link">Ir a ejemplo de faker</a>
            </div>
        </div>
        </div>
        <div class="col-2">
        </div>
        <div class="col-2">
        </div>
        <div class="col-4">
        <div class="card m-4" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Licencia</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text"></p>
                <a href="../../Utiles/vendor/fzaninotto/faker/LICENSE" class="card-link">Ir a licencia</a>
            </div>
        </div>
        </div>
     </div>
     
     <div class="row">
     <div class="col-2">
     </div>
     <div class="col-4" >
        <a href="../../index.php" style="margin-left:5%">
                <button class="btn btn-primary " type="button">
                    Ir al menu principal
                </button>
        </a>
     </div>
     </div>

<?php
        include ('../Estructura/footer.php');
    ?>
</body>
</html>