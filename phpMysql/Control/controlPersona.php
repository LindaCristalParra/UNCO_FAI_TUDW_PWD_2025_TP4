<?php
require_once __DIR__ . "/../Modelo/Persona.php";

class controlPersona
{
    public function listar($condicion = ""): array
    {
        $resultado = Persona::listar($condicion);
        return $resultado;
    }

    public function buscar($nroDni)
    {
        $resultado = null;
        $persona = new Persona($nroDni);
        if ($persona->obtener($nroDni)) {
            $resultado = $persona;
        }
        return $resultado;
    }

    public function crear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio)
    {
        $resultado = false;
        // Evitar duplicados por clave primaria
        $existente = $this->buscar($nroDni);
        if (!$existente) {
            $persona = new Persona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
            if ($persona->insertar()) {
                $resultado = true;
            }
        }
        return $resultado;
    }

    public function modificar($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio)
    {
        $resultado = null;
        $persona = new Persona($nroDni);
        if ($persona->obtener($nroDni)) {
            $persona->setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
            if ($persona->modificar()) {
                $resultado = $persona;
            }
        }
        return $resultado;
    }

    public function eliminar($nroDni)
    {
        $resultado = false;
        $persona = new Persona($nroDni);
        if ($persona->obtener($nroDni)) {
            $resultado = $persona->eliminar();
        }
        return $resultado;
    }
}
?>