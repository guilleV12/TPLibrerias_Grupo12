<?php
include_once "../../configuracion.php";
include_once "../Estructura/header.php";

?>

<div class="conteiner p-4">
    <p class="text-center fw-bold fs-1">GEOGRAPHER</p>
    <div class="mb-3">
        <p class="fs-3">Informaci&oacute;n</p>
        <p class="fs-5">
            Geographer es una librer&iacute;a contiene informaci&oacute;n sobre los
            pa&iacute;ses del mundo, como nombre, localizaci&oacute;n, idioma,
            estados/provincias y ciudades facilitando el uso de men&uacute;s
            desplegables con una lista de pa&iacute;ses o si la aplicaci&oacute;n
            tiene un feed con marcadores de ubicaciones.
        </p>
    </div>
    <div class="mb-3">
        <p class="fs-3">Instalaci&oacute;n</p>
        <p class="fs-5">
            Para la instalaci&oacute;n de Geographer requiere PHP >= 5.5, adem&aacute;s tener
            previamente instalado
            <a href="https://getcomposer.org/" class="text-decoration-none">Composer</a>.
            <br />
            Una vez ya instalado composer abrimos una nueva terminal y nos ubicamos en
            la carpeta en donde se desea descargar la librer&iacute;a, luego
            ingresamos la siguiente l&iacute;nea:
        </p>
        <table class="table table-secondary">
            <thead>
                <tr>
                    <th scope="col" class="font-monospace">
                        composer require menarasolutions/geographer
                    </th>
                </tr>
            </thead>
        </table>
        <p class="fs-5">Al finalizar la instalaci&oacute;n, en el repositorio se encontraran las carpetas que se describe a continuaci&oacute;n: </p>
        <img src="../Archivos/geographer.jpeg" alt="geographer">
    </div>

    <div class="mb-3">
        <p class="fs-3">Utilizaci&oacute;n</p>
        <p class="fs-5">
            Para empezar a utilizar Geographer en un archivo PHP se debe llamar el
            autoload.php
        </p>

        <table class="table table-secondary table-borderless">
            <tbody class="font-monospace">
                <tr>
                    <td>1</td>
                    <td>
                        <&#63;php
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>require_once "vendor/autoload.php";</td>
                </tr>
            </tbody>
        </table>

        <p class="fs-5">
            Luego para crear e inicializar Geographer escribe en tu c&oacute;digo:
        </p>
        <table class="table table-secondary table-borderless">
            <tbody>
                <tr>
                    <td>3</td>
                    <td scope="col" class="font-monospace">
                        use MenaraSolutions\Geographer\Earth;
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>use MenaraSolutions\Geographer\Country;</td>
                </tr>
                <tr>
                    <td>5</td>

                    <td>$earth = new Earth();</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    
    <div class="mb-3">
        <p class="fs-3">Biografia</p>
        <ul>
            <li><a href="https://geographer.au/documentation/php/"  class="text-decoration-none">Documentacion Geographer</a></li>
            <li><a href="https://github.com/MenaraSolutions/geographer"  class="text-decoration-none">GitHub Greographer</a></li>
           <!--  <li><a href="http://"></a></li>
            <li><a href="http://"></a></li> -->
        </ul>

    </div>
</div>

<?php
include_once "../Estructura/footer.php";
?>