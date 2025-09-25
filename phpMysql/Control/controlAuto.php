<?php
require_once __DIR__ . "/../Modelo/Auto.php";
require_once __DIR__ . "/../Modelo/Persona.php";

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
        if ($auto->obtener($patente)) {
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
        if ($auto->insertar()) {
            $resultado = $auto;
        }
        return $resultado;
    }

    public function modificarDuenio($patente, $dniNuevoDuenio)
    {//primero verifico que exista el auto 
        // segundo verifico que la persona exista en nuestra base
        $resultado = false;
        $auto = new Auto($patente);

        if ($auto->obtener($patente)) {
            //verificar es que el dni actual no se el mismo que quiero modificar
            if (!($auto->getDniDuenio() === $dniNuevoDuenio)) {
                $nuevoDuenio = new Persona($dniNuevoDuenio);
                if ($nuevoDuenio->obtener($dniNuevoDuenio)) {
                    $auto->setear($patente, $auto->getMarca(), $auto->getModelo(), $dniNuevoDuenio);
                    if ($auto->modificar()) {
                        $resultado = true;
                    }
                }
            }
        }
        return $resultado;
    }

    public function eliminar($patente)
    {
        $resultado = false;
        $auto = new Auto($patente);
        if ($auto->obtener($patente)) {
            $resultado = $auto->eliminar();
        }
        return $resultado;
    }
}
?>