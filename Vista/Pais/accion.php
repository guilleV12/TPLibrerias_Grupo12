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
    }elseif(isset($datos['DniEditar'])){
            $personaEditada= ['Dni'=>$datos['DniEditar'],
                'Nombre'=>$datos['Nombre'],
                'Apellido'=>$datos['Apellido'],
                'Direccion'=>$datos['Direccion'],
                'Telefono'=>$faker->phoneNumber(),
                'Estado_civil'=>$datos['Estado_civil']];
                $objPersona->modificacion($personaEditada);
            echo '<div class="card" style="width: 18rem;background-color:#b1f8a3;margin-left:40%;margin-top:2%">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">Muy bien!</h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <p class="card-text">Se han editado los datos de la persona en la base de datos.</p>
                        <a href="index.php" class="card-link" >Ir a la lista de personas</a>
                    </div>
                    </div>';

    }elseif(isset($datos['DniEliminar'])){
        $objPersona = new AbmPersona();
        $dni[0] = ["Dni"=>$datos['DniEliminar']];
        $persona = $objPersona->buscar($dni[0]);
        $personaEliminar= ['Dni'=>$datos['DniEliminar'],
                'Nombre'=>$persona[0]->getNombre(),
                'Apellido'=>$persona[0]->getApellido(),
                'Direccion'=>$persona[0]->getDireccion(),
                'Telefono'=>$persona[0]->getTelefono(),
                'Estado_civil'=>$persona[0]->getEstadoCivil()];
        if ($objPersona->baja($personaEliminar)){
        echo '<div class="card" style="width: 18rem;background-color:#b1f8a3;margin-left:40%;margin-top:2%">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center">Muy bien!</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">Se ha eliminado a persona en la base de datos.</p>
                    <a href="index.php" class="card-link" >Ir a la lista de personas</a>
                </div>
                </div>';
        }else{
            echo '<div class="card" style="width: 18rem;background-color:#f8a4a3;margin-left:40%;margin-top:2%">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center">Error!</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">No se ha podido eliminar a la persona en la base de datos.</p>
                <a href="index.php" class="card-link" >Ir a la lista de personas</a>
            </div>
            </div>';
        }
    }
    ?>
    <?php
        include ('../Estructura/footer.php');
    ?>

</body>