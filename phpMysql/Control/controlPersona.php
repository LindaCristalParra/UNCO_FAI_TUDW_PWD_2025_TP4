<?php
require_once __DIR__ . "/../Modelo/Persona.php";

class controlPersona
{
    public function listar($condicion = "")
    {
        $resultado = Persona::listar($condicion);
        return $resultado;
    }

    public function buscar($nroDni)
    {
        $resultado = null;
        $persona = new Persona($nroDni);
        if($persona->cargar()){
            $resultado = $persona;
        }
        return $resultado;
    }

    public function crear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio)
    {
        $resultado = null;
        // Evitar duplicados por clave primaria
        $existente = $this->buscar($nroDni);
        if ($existente) {
            return null;
        }
        $persona = new Persona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
        if($persona->insertar()){
            $resultado = $persona;
        }
        return $resultado;
    }

    public function modificar($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio)
    {
        $resultado = null;
        $persona = new Persona($nroDni);
        if($persona->cargar()){
            $persona->setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
            if($persona->modificar()){
                $resultado = $persona;
            }
        }
        return $resultado;
    }

    public function eliminar($nroDni)
    {
        $resultado = false;
        $persona = new Persona($nroDni);
        if($persona->cargar()){
            $resultado = $persona->eliminar();
        }
        return $resultado;
    }
}
?>

