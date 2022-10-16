<!DOCTYPE html>
<html lang="en">
<head>
    <title>Geographer</title>
    <link rel="stylesheet" href="../Css/persona.css"></link>
</head>
<body>
<?php
        include_once '../Estructura/header.php';
        include_once '../../configuracion.php';
        use MenaraSolutions\Geographer\Earth;
        use MenaraSolutions\Geographer\Country;
        $datos = data_submitted();
        $earth = new Earth();
        $codPais = trim($datos['pais']);
        $pais = $earth->findOne(['code'=>$codPais]);
        $codEstado = trim($datos['provincias']);
        $provincias = $pais->getStates()->findOne(['code'=>($codEstado)]);
        $arrayCiudades = $provincias->getCities()->toArray();
        
    ?>
        <table class="table table-dark" id="tabla">
        <thead>
            <th>
                Ciudades:
            </th>
        </thead>
        <tbody>
            <?php
                if (count($arrayCiudades) > 0){
                    for ($i = 0; $i < count($arrayCiudades); $i++){
                        echo "<tr class='table-active'>";
                        echo "<td>".$arrayCiudades[$i]['name']."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>

    <div id="botones" style="margin-bottom: 5%;">
        <a href="index.php">
            <button class="btn btn-primary " type="button">
                Volver a ejemplo Geographer
            </button>
        </a>
        <br>
      
    </div>
    <?php
        include ('../Estructura/footer.php');
    ?>
</body>
</html>