<head>
    <link rel="stylesheet" href="../Css/persona.css">
    <script src="../Js/validacion.js"></script>
</head>
<?php
    include_once '../Estructura/header.php';
    include_once '../../configuracion.php';
    require '../../Utiles/vendor/autoload.php';
    use MenaraSolutions\Geographer\Earth;
    use MenaraSolutions\Geographer\Country;
    $datos = data_submitted();
    
?>

<body>
    <form method="post" action="accion.php" id="form" class="needs-validation" style="margin-top:2%" novalidate>

        <?php
            if (isset($datos['id'])){
                $earth = new Earth;
        ?> 
                <div id="radioNG">
                    <label class="form-check-label" id="label" for="nuevoRadio" style="padding-left:10%">Seleccione un pais:</label><br>
                        <select class="form-control" id="nuevoPais" name="nuevoPais" style="width:40%" required>
                            <option value="">Seleccione una opcion</option>
                            <?php foreach ($earth->getCountries()->toArray() as $pais){  ?>
                                <option value='<?php echo $pais['code'] ?>' ><?php echo $pais['name']; ?></option>
                            <?php } ?>
                        </select>
                            <div class="valid-feedback">
                                Bien!
                            </div>
                            <div class="invalid-feedback">
                                Debe elegir una opcion!
                            </div>
                </div>
                <input type="submit" class="btn btn-success" value="Ingresar un pais" id="enviar">

        <?php
            } elseif (isset($datos['nombreEditar'])){
                $objPais = new AbmPais();
                $nombre[0] = ["Nombre"=>$datos['nombreEditar']];
                $pais = $objPais->buscar($nombre[0]);


        ?>
                <div id="radioNG">
                    <label class="form-check-label" style="margin-left:10%" id="label" for="nuevoRadio">Datos del pais</label><br>
                    Nombre: 
                    <input type="text" style="width:40%" class="form-control" id="nombreEditar" name="nombreEditar" value="<?php echo $pais[0]->getNombre() ?>" readonly required>
                    Poblacion:
                    <input type="text" pattern="[a-zA-Z]{1,20}" style="width:40%;margin-top:1%" class="form-control" id="Poblacion" name="Poblacion" value="<?php echo $pais[0]->getPoblacion() ?>" required>
                    Capital:
                    <input type="text" pattern="[a-zA-Z]{1.20}" style="width:40%;margin-top:1%" class="form-control" id="Capital" name="Capital" value="<?php echo $pais[0]->getCapital() ?>" required>
                    

                </div>
                <input type="submit" class="btn btn-success" value="Modificar" id="enviar">


        <?php
            } elseif (isset($datos['nombreEliminar'])){
                $objPais = new AbmPais();
                $nombre[0] = ["Nombre"=>$datos['nombreEliminar']];
                $pais = $objPais->buscar($nombre[0]);
        ?>
                <div id="radioNG">
                    <div class="card" style="width:40%">
                        <div class="card-header" style="text-align:center"><h5>
                            Pais a eliminar:
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-title">Nombre:</p>
                            <input type="text" style="width:40%" class="form-control" id="NombreEliminar" name="NombreEliminar" value="<?php echo $pais[0]->getNombre() ?>" readonly required>
                            <p class="card-title">Poblacion: <?php echo $pais[0]->getPoblacion(); ?>.</p>
                            <p class="card-title">Capital: <?php echo $pais[0]->getCapital(); ?>.</p>
                        </div>
                        </div>
                </div>
                <input type="submit" class="btn btn-success" value="Eliminar" id="enviar" >


        <?php
            } else{      
        ?>
                <div id="radioNG">
                    <div class="card" style="width:40%;background-color:#f39b98">
                        <div class="card-header" style="text-align:center"><h5>
                            Error
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-title">No se pudo realizar la accion solicitada.</p>
                        </div>
                        </div>
                </div>
        <?php
            }
        ?>


    </form>
    <a href='index.php' style="margin-left:35%">Volver</a>
    <?php
        include ('../Estructura/footer.php');
    ?>

</body>