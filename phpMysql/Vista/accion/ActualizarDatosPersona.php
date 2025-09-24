<?php
require_once __DIR__ . '/../../Control/controlPersona.php';

$pageTitle = 'Actualizar Persona - Resultado';
include __DIR__ . '/../estructura/header.php';

$dni = isset($_POST['dni']) ? trim($_POST['dni']) : '';
$apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : '';
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$fechaNac = isset($_POST['fechaNac']) ? trim($_POST['fechaNac']) : '';
$telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';
$domicilio = isset($_POST['domicilio']) ? trim($_POST['domicilio']) : '';

if ($dni === '' || $apellido === '' || $nombre === '' || $fechaNac === '' || $telefono === '' || $domicilio === '') {
  echo '<div class="alert alert-warning">Faltan datos obligatorios.</div>';
  echo '<a class="btn btn-secondary" href="../BuscarPersona.html">Volver</a>';
  include __DIR__ . '/../estructura/footer.php';
  exit;
}

$cp = new controlPersona();
$actualizada = $cp->modificar($dni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);

if ($actualizada) {
  echo '<div class="alert alert-success">Los datos de la persona fueron actualizados.</div>';
  echo '<a class="btn btn-primary" href="../listaPersonas.php">Ver listado</a> ';
  echo '<a class="btn btn-secondary" href="../BuscarPersona.html">Buscar otra</a>';
} else {
  echo '<div class="alert alert-danger">No se pudo actualizar la persona.</div>';
  echo '<a class="btn btn-secondary" href="../BuscarPersona.html">Volver</a>';
}

include __DIR__ . '/../estructura/footer.php';

