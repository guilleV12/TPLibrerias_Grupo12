<?php
include_once 'Conector/BaseDatos.php';

class Pais extends BaseDatos{
    private $nombre;
    private $poblacion;
    private $area;
    private $lenguaje;
    private $mensajeoperacion;

    public function __construct(){
        $this->nombre = "";
        $this->poblacion = "";
        $this->area = "";
        $this->lenguaje = "";
    }

    public function cargar($nomb, $pob, $ar, $leng){
        $this->setNombre($nomb);
        $this->setPoblacion($pob);
        $this->setArea($ar);
        $this->setLenguaje($leng);
    }
    
    public function getNombre(){
        return $this->nombre;
    }

    public function getPoblacion(){
        return $this->poblacion;
    }

    public function getArea(){
        return $this->area;
    }

    public function getLenguaje(){
        return $this->lenguaje;
    }

    public function getMensajeoperacion(){
        return $this->mensajeoperacion;
    }
    
    public function setNombre($valor){
        $this->nombre = $valor;
    }

    public function setPoblacion($valor){
        $this->poblacion = $valor;
    }

    public function setArea($valor){
        $this->area = $valor;
    }

    public function setLenguaje($valor){
        $this->lenguaje = $valor;
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
        $sql="SELECT * FROM pais WHERE Nombre = '".$this->getNombre()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->cargar($row['Nombre'], $row['Poblacion'],$row['Area'],$row['Lenguaje']);
                    
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
        $sql="SELECT * FROM pais ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Pais();
                    $obj->cargar($row['Nombre'],$row['Poblacion'],$row['Area'],$row['Lenguaje']);
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
        $sql="INSERT INTO pais(Nombre,Poblacion,Area,Lenguaje) 
		 VALUES('".$this->getNombre()."','".$this->getPoblacion()."','".$this->getArea()."','".$this->getLenguaje()."');";
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
        
        $sql="UPDATE pais SET Poblacion='".$this->getPoblacion()."',Area='".$this->getArea()."',Lenguaje='".$this->getLenguaje()
        ."' WHERE Nombre='"
		.$this->getNombre()."'";
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
        $sql="DELETE FROM pais WHERE Nombre='".$this->getNombre()."'";
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
	    return "Nombre: ".$this->getNombre()."\nPoblacion: ".$this->getPoblacion()."\nArea: ".$this->getArea()."\n<<>>\n";
			
	}
}



?>