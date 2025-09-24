<?php
require_once __DIR__ . "/../Modelo/Auto.php";

class controlAuto
{
    public function listar($condicion = "")
    {
        $resultado = Auto::listar($condicion);
        return $resultado;
    }

    public function buscar($patente)
    {
        $resultado = null;
        $auto = new Auto($patente);
        if($auto->cargar()){
            $resultado = $auto;
        }
        return $resultado;
    }

    public function crear($patente, $marca, $modelo, $dniDuenio)
    {
        $resultado = null;
        // Evitar duplicado por clave primaria Patente
        $existente = $this->buscar($patente);
        if ($existente) {
            return null;
        }
        $auto = new Auto($patente, $marca, $modelo, $dniDuenio);
        if($auto->insertar()){
            $resultado = $auto;
        }
        return $resultado;
    }

    public function modificar($patente, $marca, $modelo, $dniDuenio)
    {
        $resultado = null;
        $auto = new Auto($patente);
        if($auto->cargar()){
            $auto->setear($patente, $marca, $modelo, $dniDuenio);
            if($auto->modificar()){
                $resultado = $auto;
            }
        }
        return $resultado;
    }

    public function eliminar($patente)
    {
        $resultado = false;
        $auto = new Auto($patente);
        if($auto->cargar()){
            $resultado = $auto->eliminar();
        }
        return $resultado;
    }
}
?>
