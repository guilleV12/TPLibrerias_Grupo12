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
    require_once '../../Utiles/vendor/autoload.php';
    $faker = Faker\Factory::create();
    
    ?>

<table class="table table-dark" id="tabla">
        <title>Generar informacion:</title>
        <thead>
            <th>
                Nombres:
            </th>
            <th>
                Telefonos:
            </th>
            <th>
                Direcciones:
            </th>
            <th>
                Email:
            </th>
        </thead>
        <tbody>
            <?php
                    echo "<tr class='table-active'>";
                        echo "<td>".$faker->name()."</td>";
                        echo "<td>".$faker->phoneNumber()."</td>";
                        echo "<td>".$faker->address."</td>";
                        echo "<td>".$faker->email."</td>";
                        echo "</tr>";
                ?>
        </tbody>
</table>
        <a href="index.php">
            <button class="btn btn-primary " type="button">
                Ir al menu
            </button>
        </a>
        <a href="ejemploFkr.php">
            <button class="btn btn-primary " type="button">
                Generar otra persona
            </button>
        </a>

<?php
        include ('../Estructura/footer.php');
    ?>
</body>

</html>