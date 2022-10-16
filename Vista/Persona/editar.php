<head>
    <link rel="stylesheet" href="../Css/persona.css">
    <script src="../Js/validacion.js"></script>
</head>
<?php
    include_once '../Estructura/header.php';
    include_once '../../configuracion.php';
    $datos = data_submitted();
    require '../../Utiles/vendor/autoload.php';
    use MenaraSolutions\Geographer\Earth;
    use MenaraSolutions\Geographer\Country;
?>

<body>
    <form method="post" action="accion.php" id="form" class="needs-validation" style="margin-top:2%" novalidate>

        <?php
            if (isset($datos['id'])){    
                $paises = new AbmPais();
                $listaPaises = $paises->buscar(null);
                if (count($listaPaises)>0){
        ?>  
                <div id="radioNG">
                    <label class="form-check-label" id="label" for="nuevoRadio">Desea ingresar una nueva persona?</label><br>
                        <input type="radio" class="form-check-input" id="nuevoRadio" name="nuevoRadio" value="si" required>Si
                        <input type="radio" class="form-check-input" id="nuevoRadio" name="nuevoRadio" value="no" required>No
                            <div class="valid-feedback">
                                Bien!
                            </div>
                            <div class="invalid-feedback">
                                Debe elegir una opcion!
                            </div><br><br>
                    <label class="form-check-label" id="label" for="pais">Desea ingresar una nueva persona?</label><br>
                        <select style="width:40%" class="form-control" id="pais" name="pais" value="si" required>
                            <option value="">Seleccione una opcion</option>
                                <?php foreach ($listaPaises as $pais){  ?>
                                    <option value='<?php echo $pais->getNombre() ?>' ><?php echo $pais->getNombre(); ?></option>
                                <?php } ?>
                        </select>
                            <div class="valid-feedback">
                                Bien!
                            </div>
                            <div class="invalid-feedback">
                                Debe elegir una opcion!
                            </div>
                </div>
                <input type="submit" class="btn btn-success" value="Ingresar nueva persona" id="enviar">

        <?php
            } else{
                echo ' <div class="card" style="width: 18rem;background-color:#f8a4a3;margin-left:40%;margin-top:2%">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center"></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">Debe ingresar paises en la base de datos antes de crear una persona.</p>
                    <a href="../Pais/index.php" class="card-link" >Ir a la lista de paises</a>
                </div>
                </div>';
            }} elseif (isset($datos['dniEditar'])){
                $objPersona = new AbmPersona();
                $dni[0] = ["Dni"=>$datos['dniEditar']];
                $persona = $objPersona->buscar($dni[0]);


        ?>
                <div id="radioNG">
                    <label class="form-check-label" style="margin-left:10%" id="label" for="nuevoRadio">Datos de Persona</label><br>
                    Dni: 
                    <input type="text" style="width:40%" class="form-control" id="DniEditar" name="DniEditar" value="<?php echo $persona[0]->getDni() ?>" readonly required>
                    Nombre:
                    <input type="text" pattern="[a-zA-Z]{1,20}" style="width:40%;margin-top:1%" class="form-control" id="Nombre" name="Nombre" value="<?php echo $persona[0]->getNombre() ?>" required>
                    Apellido:
                    <input type="text" pattern="[a-zA-Z]{1.20}" style="width:40%;margin-top:1%" class="form-control" id="Apellido" name="Apellido" value="<?php echo $persona[0]->getApellido() ?>" required>
                    Direccion:
                    <input type="text" style="width:40%;margin-top:1%" class="form-control" id="Direccion" name="Direccion" value="<?php echo $persona[0]->getDireccion() ?>" required>
                    Estado civil:
                    <select class="form-select" style="width:40%;margin-top:1%" id="Estado_civil" name="Estado_civil" required>
                        <option value="">Seleccione una opcion</option>
                        <option value="Casado">Casado</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Divorciado">Divorciado</option>
                    </select>

                </div>
                <input type="submit" class="btn btn-success" value="Modificar" id="enviar">


        <?php
            } elseif (isset($datos['dniEliminar'])){
                $objPersona = new AbmPersona();
                $dni[0] = ["Dni"=>$datos['dniEliminar']];
                $persona = $objPersona->buscar($dni[0]);
        ?>
                <div id="radioNG">
                    <div class="card" style="width:40%">
                        <div class="card-header" style="text-align:center"><h5>
                            Persona a eliminar:
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-title">DNI:</p>
                            <input type="text" style="width:40%" class="form-control" id="DniEliminar" name="DniEliminar" value="<?php echo $persona[0]->getDni() ?>" readonly required>
                            <p class="card-title">Nombre: <?php echo $persona[0]->getNombre(); ?>.</p>
                            <p class="card-title">Apellido: <?php echo $persona[0]->getApellido(); ?>.</p>
                            <p class="card-title">Direccion: <?php echo $persona[0]->getDireccion(); ?>.</p>
                            <p class="card-title">Estado civil: <?php echo $persona[0]->getEstadoCivil(); ?>.</p>

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