<!DOCTYPE html>
<html lang="en">
<head>
    <title>Faker-ABM Persona</title>
    <link rel="stylesheet" href="../Css/persona.css"></link>
</head>
<body>
    <?php
        include_once '../Estructura/header.php';
        include_once '../../configuracion.php';
        $objPersona = new AbmPersona();
        $listaPersonas = $objPersona->buscar(null);

    ?>

    <h3 id="title">
        ABM - Persona
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
                Apellido:
            </th>
            <th>
                DNI:
            </th>
            <th>
                Direccion:
            </th>
            <th>
                Pais:
            </th>
            <th colspan="2">
                Estado civil:
            </th>
        </thead>
        <tbody>
            <?php
                if (count($listaPersonas) > 0){
                    foreach ($listaPersonas as $persona){
                        echo "<tr class='table-active'>";
                            echo "<td>".$persona->getNombre()."</td>";
                            echo "<td>".$persona->getApellido()."</td>";
                            echo "<td>".$persona->getDni()."</td>";
                            echo "<td>".$persona->getDireccion()."</td>";
                            echo "<td>".$persona->getNombrePais()->getNombre()."</td>";
                            echo "<td>".$persona->getEstadoCivil()."</td>";
                            echo "<td><a href='editar.php?dniEditar=".$persona->getDni()."'><button class='btn btn-primary'>Editar</button></a>
                                <a href='editar.php?dniEliminar=".$persona->getDni()."'><button class='btn btn-primary'>Eliminar</button></a></td>";
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
