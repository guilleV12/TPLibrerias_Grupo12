<!DOCTYPE html>
<html lang="en">
<head>
    <title>Faker-ABM Pais</title>
    <link rel="stylesheet" href="../Css/persona.css"></link>
</head>
<body>
    <?php
        include_once '../Estructura/header.php';
        include_once '../../configuracion.php';
        $objPais = new AbmPais();
        $listaPais = $objPais->buscar(null);

    ?>

    <h3 id="title">
        ABM - Pais
    </h3>

    <a href="editar.php?id='nuevo'">
        <button class="btn btn-success" id="nuevo" >
            Nuevo
        </button>
    </a>

    <table class="table table-dark" id="tabla">
        <thead>
            <th>
                Nombre:
            </th>
            <th>
                Poblacion:
            </th>
            <th>
                Area:
            </th>
            <th colspan="2">
                Lenguaje:
            </th>
        </thead>
        <tbody>
            <?php
                if (count($listaPais) > 0){
                    foreach ($listaPais as $pais){
                        echo "<tr class='table-active'>";
                            echo "<td>".$pais->getNombre()."</td>";
                            echo "<td>".$pais->getPoblacion()."</td>";
                            echo "<td>".$pais->getArea()."</td>";
                            echo "<td>".$pais->getLenguaje()."</td>";
                            echo "<td><a href='editar.php?nombreEditar=".$pais->getNombre()."'><button class='btn btn-primary'>Editar</button></a>
                                <a href='editar.php?nombreEliminar=".$pais->getNombre()."'><button class='btn btn-primary'>Eliminar</button></a></td>";
                        echo "</tr>";
                    }        
                }
            ?>
        </tbody>
    </table>

    <div id="botones" style="margin-bottom: 5%;">
        <a href="../../index.php">
            <button class="btn btn-primary " type="button">
                Ir al menu principal
            </button>
        </a>
    </div>
    <?php
        include ('../Estructura/footer.php');
    ?>
</body>
</html>