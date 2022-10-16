<head>
    <link rel="stylesheet" href="../Css/persona.css">
    <script src="../Js/validacion.js"></script>
</head>
<?php
    include_once '../Estructura/header.php';
    include_once '../../configuracion.php';
    require_once ('../../Utiles/vendor/autoload.php');
    use MenaraSolutions\Geographer\City;
    use MenaraSolutions\Geographer\Collections\MemberCollection;
    use MenaraSolutions\Geographer\Country;
    use MenaraSolutions\Geographer\Divisible;
    use MenaraSolutions\Geographer\Earth;
    use MenaraSolutions\Geographer\Services\TranslationAgency;
    $datos = data_submitted();
    $objPais = new AbmPais();
    $objPersona = new AbmPersona();
    $earth = new Earth;
    $paises = $earth->getCountries();
    


?>

<body>
    <?php
        if (isset($datos['nuevoPais'])){
            $paisSelec = $earth->findOneByCode($datos['nuevoPais']);
                $pais= ['Nombre'=>$paisSelec->getName(),
                        'Poblacion'=>$paisSelec->getPopulation(),
                        'Area'=>$paisSelec->getArea(),
                        'Lenguaje'=>$paisSelec->getLanguage()];
                        echo 'aa'.print_r($pais);
            $listaPaises = $objPais->buscar($pais);
            if (count($listaPaises)==0){
                if ($objPais->alta($pais)){
                
    ?>
            <div class="card" style="width: 18rem;background-color:#b1f8a3;margin-left:40%;margin-top:2%">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center">Muy bien!</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Se ha ingresado un pais a la base de datos.<br>
                                    Nombre: <?php echo $pais['Nombre'] ?><br>
                                    Poblacion: <?php echo $pais['Poblacion'] ?><br>
                                    Area: <?php echo $pais['Area'] ?><br>
                                    Lenguaje: <?php echo $pais['Lenguaje'] ?><br>
                <a href="index.php" class="card-link" >Ir a la lista de paises</a>
            </div>
            </div>
        
    <?php }else{ 
                    echo ' <div class="card" style="width: 18rem;background-color:#f8a4a3;margin-left:40%;margin-top:2%">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center"></h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <p class="card-text">No se ha ingresado un pais a la base de datos.</p>
                        <a href="index.php" class="card-link" >Ir a la lista de paises</a>
                    </div>
                    </div>';
                    }}else{
                        echo ' <div class="card" style="width: 18rem;background-color:#f8a4a3;margin-left:40%;margin-top:2%">
                        <div class="card-body">
                        <h5 class="card-title" style="text-align: center"></h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <p class="card-text">El pais ya se encuentra en la base de datos.</p>
                        <a href="index.php" class="card-link" >Ir a la lista de paises</a>
                        </div>
                        </div>';
                    }
    }elseif(isset($datos['nombreEditar'])){
            $paisSelec= ['Nombre'=>$datos['nombreEditar'],
                'Poblacion'=>$datos['Poblacion'],
                'Area'=>$datos['Area'],
                'Lenguaje'=>$datos['Lenguaje']];
                $objPais->modificacion($paisSelec);
            echo '<div class="card" style="width: 18rem;background-color:#b1f8a3;margin-left:40%;margin-top:2%">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">Muy bien!</h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <p class="card-text">Se han editado los datos del pais en la base de datos.</p>
                        <a href="index.php" class="card-link" >Ir a la lista de paises</a>
                    </div>
                    </div>';

    }elseif(isset($datos['NombreEliminar'])){
        $listaPersona = $objPersona->buscar(null);
        if (count($listaPersona)>0){
            $resp = true;
            foreach ($listaPersona as $persona){
                if ($persona->getNombrePais()->getNombre() == $datos['NombreEliminar']){
                    $resp = false;
                }
            }
        }
        if ($resp == true) {
        
            $objPais = new AbmPais();
            $paisSelec[0] = ["Nombre"=>$datos['NombreEliminar']];
            $pais = $objPais->buscar($paisSelec[0]);
            $paisEliminar= ['Nombre'=>$pais[0]->getNombre(),
                    'Poblacion'=>$pais[0]->getPoblacion(),
                    'Area'=>$pais[0]->getArea(),
                    'Lenguaje'=>$pais[0]->getLenguaje()];
            if ($objPais->baja($paisEliminar)){
            echo '<div class="card" style="width: 18rem;background-color:#b1f8a3;margin-left:40%;margin-top:2%">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">Muy bien!</h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <p class="card-text">Se ha eliminado el pais de la base de datos.</p>
                        <a href="index.php" class="card-link" >Ir a la lista de paises</a>
                    </div>
                    </div>';
            }else{
                echo '<div class="card" style="width: 18rem;background-color:#f8a4a3;margin-left:40%;margin-top:2%">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center">Error!</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">No se ha podido eliminar al pais de la base de datos.</p>
                    <a href="index.php" class="card-link" >Ir a la lista de paises</a>
                </div>
                </div>';
            }
        }else{
            echo '<div class="card" style="width: 18rem;background-color:#f8a4a3;margin-left:40%;margin-top:2%">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center">Error!</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">No se ha podido eliminar al pais de la base de datos porque esta en uso.</p>
                <a href="index.php" class="card-link" >Ir a la lista de paises</a>
            </div>
            </div>';
        }
    }
    ?>
    <?php
        include ('../Estructura/footer.php');
    ?>

</body>