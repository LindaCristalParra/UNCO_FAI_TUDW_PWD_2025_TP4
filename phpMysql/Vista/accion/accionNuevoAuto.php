<?php
require_once __DIR__ . '/../../Control/controlAuto.php';
require_once __DIR__ . '/../../Control/controlPersona.php';

$pageTitle = 'Alta de Auto - Resultado';
include __DIR__ . '/../estructura/header.php';

$patente = isset($_POST['patente']) ? trim($_POST['patente']) : '';
$marca = isset($_POST['marca']) ? trim($_POST['marca']) : '';
$modelo = isset($_POST['modelo']) ? trim($_POST['modelo']) : '';
$dniDuenio = isset($_POST['dniDuenio']) ? trim($_POST['dniDuenio']) : '';

if ($patente === '' || $marca === '' || $modelo === '' || $dniDuenio === '') {
  echo '<div class="alert alert-warning">Faltan datos obligatorios.</div>';
  echo '<a class="btn btn-secondary" href="../NuevoAuto.php">Volver</a>';
  include __DIR__ . '/../estructura/footer.php';
  exit;
}

$cp = new controlPersona();
$duenio = $cp->buscar($dniDuenio);
if (!$duenio) {
  echo '<div class="alert alert-danger">El DNI del dueño no existe. Debés cargar la persona primero.</div>';
  echo '<a class="btn btn-primary" href="../NuevaPersona.php">Cargar persona</a> ';
  echo '<a class="btn btn-secondary" href="../NuevoAuto.php">Volver</a>';
  include __DIR__ . '/../estructura/footer.php';
  exit;
}

$ca = new controlAuto();
$nuevo = $ca->crear($patente, $marca, (int)$modelo, $dniDuenio);

if ($nuevo) {
  echo '<div class="alert alert-success">El auto se cargó correctamente.</div>';
  echo '<a class="btn btn-primary" href="../VerAutos.php">Ver autos</a> ';
  echo '<a class="btn btn-secondary" href="../NuevoAuto.php">Cargar otro</a>';
} else {
  echo '<div class="alert alert-danger">No se pudo cargar el auto. Verificá los datos o si la patente ya existe.</div>';
  echo '<a class="btn btn-secondary" href="../NuevoAuto.php">Volver</a>';
}

include __DIR__ . '/../estructura/footer.php';

