<!DOCTYPE html>
<head>
    <link href="Vista/Css/estructura.css" rel="stylesheet" type="text/css">

    <script src="Vista/Css/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Vista/Css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Vista/Css/bootstrap/css/css_header_footer.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   

</head>
<body>
    <?php
        include_once ('Vista/Estructura/header.php');

    ?>
     <div class="row">
        <div class="col-4">
        </div>
        <div class="card m-4" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Faker</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Libreria para generar datos sobre personas.</p>
                <a href="Vista/Persona/index.php" class="card-link">Ir a aplicacion de faker</a>
            </div>
        </div>
     </div>
    <div class="row">
        <div class="col-4">
        </div>
        <div class="card m-4" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Geographer</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Libreria para obtener datos de paises.</p>
                <a href="Vista/Pais/index.php" class="card-link">Ir a aplicacion de Geographer</a>
            </div>
        </div>
     </div>
     <?php
        include ('Vista/Estructura/footer.php');
    ?>
    
    
</body>
</html>