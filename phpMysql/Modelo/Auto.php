<?php
class Auto
{
    private $patente;
    private $marca;
    private $modelo;
    private $dniDuenio;
    private $mensajeoperacion;

    public function __construct($patente, $marca, $modelo, $dniDuenio)
    {
        $this->patente = $patente;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->dniDuenio = $dniDuenio;
    }

    public function getPatente()
    {
        return $this->patente;
    }

    public function setPatente($patente)
    {
        $this->patente = $patente;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getDniDuenio()
    {
        return $this->dniDuenio;
    }

    public function setDniDuenio($dniDuenio)
    {
        $this->dniDuenio = $dniDuenio;
    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion ;
    }

    public function setmensajeoperacion($mensajeoperacion){
        $this->mensajeoperacion = $mensajeoperacion ;
    }

        public function setear($patente, $marca, $modelo, $dniDuenio)
        {
            $this->setPatente($patente);
            $this->setMarca($marca);
            $this->setModelo($modelo);
            $this->setDniDuenio($dniDuenio);
        }

    public function __toString()
    {
        return "Patente: " . $this->patente . ", Marca: " . $this->marca . ", Modelo: " . $this->modelo . ", DNI Dueño: " . $this->dniDuenio;
    }

        public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM auto WHERE Patente = '".$this->getPatente()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $row['DniDuenio']);
                }
            }
        } else {
            $this->setmensajeoperacion("Auto->cargar: ".$base->getError());
        }
        return $resp;    
        
    }

} ?>