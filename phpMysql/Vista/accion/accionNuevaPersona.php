<?php
require_once __DIR__ . '/../../Control/controlPersona.php';

$pageTitle = 'Alta de Persona - Resultado';
include __DIR__ . '/../estructura/header.php';

$dni = isset($_POST['dni']) ? trim($_POST['dni']) : '';
$apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : '';
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$fechaNac = isset($_POST['fechaNac']) ? trim($_POST['fechaNac']) : '';
$telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';
$domicilio = isset($_POST['domicilio']) ? trim($_POST['domicilio']) : '';

if ($dni === '' || $apellido === '' || $nombre === '' || $fechaNac === '' || $telefono === '' || $domicilio === '') {
  echo '<div class="alert alert-warning">Faltan datos obligatorios.</div>';
  echo '<a class="btn btn-secondary" href="../NuevaPersona.php">Volver</a>';
  include __DIR__ . '/../estructura/footer.php';
  exit;
}

$cp = new controlPersona();
$nueva = $cp->crear($dni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);

if ($nueva) {
  echo '<div class="alert alert-success">La persona se cargó correctamente.</div>';
  echo '<a class="btn btn-primary" href="../listaPersonas.php">Ver listado</a> ';
  echo '<a class="btn btn-secondary" href="../NuevaPersona.php">Cargar otra</a>';
} else {
  echo '<div class="alert alert-danger">No se pudo cargar la persona. Verificá los datos o si el DNI ya existe.</div>';
  echo '<a class="btn btn-secondary" href="../NuevaPersona.php">Volver</a>';
}

include __DIR__ . '/../estructura/footer.php';

