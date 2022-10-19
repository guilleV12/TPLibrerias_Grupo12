<?php
include_once "../../configuracion.php";
include_once "../Estructura/header.php";

?>

<div class="conteiner p-4">
    <p class="text-center fw-bold fs-1">FAKER</p>
    <div class="mb-3">
        <p class="fs-3">Informaci&oacute;n</p>
        <p class="fs-5">Faker es una librer&iacute;a PHP que genera datos ficticios de relleno que se necesitan en las
            pruebas de aplicaciones ya sea para completar una base de datos, crear documentos o rellenar formularios
            entre otros. </p>
    </div>
    <div class="mb-3">
        <p class="fs-3">Instalaci&oacute;n</p>
        <p class="fs-5">Faker se puede instalar a trav&eacute;s de <a href="https://getcomposer.org/"
                style="">Composer</a>. por lo tanto previamente se debe instalar este gestor de dependencias para php.
            <!-- </p> 
        <p> -->Faker requiere de una version PHP >= 5.3.3. <br>
            Entonces para su instalación a través de composer abrimos una nueva terminal y escribimos la siguiente
            linea:
        </p>

        <table class="table table-secondary">
            <thead>
                <tr>
                    <th scope="col" class="font-monospace"> composer require fzaninotto/faker</th>
            </thead>
        </table>

        <!-- <p class="font-monospace"> composer require fakerphp/faker </p>
 -->

        <p class="fs-5">Al finalizar la instalaci&oacute;n, en el repositorio se encontraran las carpetas que se
            describe a continuaci&oacute;n:
        </p>
        <img src="../Archivos/faker.jpeg" alt="faker">

    </div>
    <div class="mb-3">
        <p class="fs-3">Utilizacion</p>
        <p class="fs-5">Faker admite cargadores automáticos PSR-0 como PSR-4 </br>
            Para empezar a utilizar Faker en un archivo PHP se debe llamar el autoload.php
        </p>

        <table class="table table-secondary table-borderless ">
            <tbody class="font-monospace">
                <tr>
                    <td>1</td>
                    <td><&#63;php</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>require_once "vendor/autoload.php";</td>
                </tr>
            </tbody>
        </table>

        <p class="fs-5">Luego para crear e inicializar faker escribe en tu c&oacute;digo:</p>
        <table class="table table-secondary">
            <tbody>
                <tr>
                    <td>3</td>
                    <td scope="col" class="font-monospace">$faker = Faker\Factory::create(); </td>
            </tbody>
        </table>
    </div>
    <div class="mb-3">
        <p class="fs-3">Biografia</p>
        <ul>
            <li><a href="https://github.com/fzaninotto/Faker"  class="text-decoration-none">Github faker</a></li>
            <li><a href="https://fakerphp.github.io/"  class="text-decoration-none">Documentacion faker</a></li>
           <!--  <li><a href="http://"></a></li>
            <li><a href="http://"></a></li> -->
        </ul>

    </div>
</div>
 
<?php
include_once "../Estructura/footer.php";
?>