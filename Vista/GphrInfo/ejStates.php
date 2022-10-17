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
        $pais = $earth->findOneByCode($datos['pais']);

    ?>
        <form class="needs-validation" method="post" action="ejCitys.php" style="margin-top:2%" novalidate>

                <div id="radioNG">
                        <input type="hidden" class="form-control" id="pais" name="pais" value="<?php echo $datos['pais'] ?>"style="width:40%" readonly required>

                        <label class="form-check-label" id="label" for="provincias" style="padding-left:10%">Seleccione un pais:</label><br>
                        <select class="form-control" id="provincias" name="provincias" style="width:40%" required>
                            <option value="">Seleccione una opcion</option>
                            <?php foreach ($pais->getStates()->sortBy('name')->toArray() as $provincia){  ?>
                                <option value='<?php echo $provincia['isoCode'] ?>' ><?php echo $provincia['name']; ?></option>
                            <?php } ?>
                        </select>
                            <div class="valid-feedback">
                                Bien!
                            </div>
                            <div class="invalid-feedback">
                                Debe elegir una opcion!
                            </div>

                </div>
                <input type="submit" class="btn btn-success" value="Ver ciudades" id="enviar">
        </form>
    <?php
        include ('../Estructura/footer.php');
    ?>
</body>
</html>