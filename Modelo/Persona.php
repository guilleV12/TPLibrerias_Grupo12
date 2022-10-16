<?php
include_once 'Conector/BaseDatos.php';
include_once 'Pais.php';

class Persona extends BaseDatos{
    private $dni;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono;
    private $estado_civil;
    private $nombre_pais;
    private $mensajeoperacion;

    public function __construct(){
        $this->dni = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->direccion = "";
        $this->telefono = "";
        $this->estado_civil = "";
        $this->nombre_pais = "";
    }

    public function cargar($nro, $nomb, $ape, $dir, $tel, $est, $nombP){
        $this->setDni($nro);
        $this->setNombre($nomb);
        $this->setApellido($ape);
        $this->setDireccion($dir);
        $this->setTelefono($tel);
        $this->setEstadoCivil($est);
        $this->setNombrePais($nombP);
    }

    public function getDni(){
        return $this->dni;
    }
    
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getEstadoCivil(){
        return $this->estado_civil;
    }

    public function getNombrePais(){
        return $this->nombre_pais;
    }

    public function getMensajeoperacion(){
        return $this->mensajeoperacion;
    }

    public function setDni($valor){
        $this->dni = $valor;
    }
    
    public function setNombre($valor){
        $this->nombre = $valor;
    }

    public function setApellido($valor){
        $this->apellido = $valor;
    }

    public function setDireccion($valor){
        $this->direccion = $valor;
    }

    public function setTelefono($valor){
        $this->telefono = $valor;
    }

    public function setEstadoCivil($valor){
        $this->estado_civil = $valor;
    }

    public function setNombrePais($valor){
        $this->nombre_pais = $valor;
    }

    public function setMensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
    }

    /**
	 * Recupera los datos de un auto por patente
	 * @param int $patente
	 * @return true en caso de encontrar los datos, false en caso contrario 
	 */		
	public function Buscar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM persona WHERE Dni = '".$this->getDni()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $pais = new Pais();
                    $pais->setNombre($row['NombrePais']);
                    $pais->Buscar();
                    $this->cargar($row['Dni'], $row['Nombre'],$row['Apellido'],$row['Direccion'],$row['Telefono'],$row['Estado_civil']
                ,$pais);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Persona->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    

	public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM persona ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Persona();
                    $objPais = new Pais();
                    $objPais->setNombre($row['NombrePais']);
                    $objPais->Buscar();
                    $obj->cargar($row['Dni'], $row['Nombre'],$row['Apellido'],$row['Direccion'],$row['Telefono'],$row['Estado_civil']
                    ,$objPais);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setMensajeoperacion("Persona->listar: ".$base->getError());
        }
 
        return $arreglo;
    }

	
	
	public function insertar(){
        //echo "insertar";
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO persona(Dni,Nombre,Apellido,Direccion,Telefono,Estado_civil,NombrePais) 
		 VALUES('".$this->getDni()."','".$this->getNombre()."','".$this->getApellido()."','".$this->getDireccion().
		 "','".$this->getTelefono()."','".$this->getEstadoCivil()."','".$this->getNombrePais()."');";
        if ($base->Iniciar()) {
            
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeoperacion("Persona->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeoperacion("Persona->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        
        $sql="UPDATE persona SET Nombre='".$this->getNombre()."',Apellido='".$this->getApellido()."',Direccion='"
		.$this->getDireccion()."',Telefono='".$this->getTelefono()."',Estado_civil='".$this->getEstadoCivil()."',NombrePais='".
        $this->getNombrePais()."' WHERE Dni='".$this->getDni()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeoperacion("Persona->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeoperacion("Persona->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM persona WHERE Dni='".$this->getDni()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeoperacion("Persona->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeoperacion("Persona->eliminar: ".$base->getError());
        }
        return $resp;
    }

	public function __toString(){
	    return "\Dni: ".$this->getDni(). "\nNombre: ".$this->getNombre().", ".$this->getApellido().
        "\nTelefono: ".$this->getTelefono()."\nDireccion: ".$this->getDireccion().
		"\nEstado civil :".$this->getEstadoCivil()."\n<<>>\n";
			
	}
}



?>