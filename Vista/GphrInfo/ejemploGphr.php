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
        $earth = new Earth();

    ?>
        <form class="needs-validation" method="post" action="ejStates.php" style="margin-top:2%" novalidate>

                <div id="radioNG">
                    <label class="form-check-label" id="label" for="pais" style="padding-left:10%">Seleccione un pais:</label><br>
                        <select class="form-control" id="pais" name="pais" style="width:40%" required>
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
                <input type="submit" class="btn btn-success" value="Ver provincias" id="enviar">
        </form>
    <?php
        include ('../Estructura/footer.php');
    ?>
</body>
</html>