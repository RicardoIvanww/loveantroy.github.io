<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['correo'])) {
    header("Location: index.php");
    exit();
}

$correo = $_SESSION['correo'];
$query_user = mysqli_query($conexion, "SELECT id_usuario FROM usuarios WHERE correo='$correo'");
$user = mysqli_fetch_assoc($query_user);
$id_usuario = $user['id_usuario'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_evento = $_POST['id_evento'];
    $personas = $_POST['cantidad_personas'];
    $zona = $_POST['tipo_zona'];
    $fecha = date('Y-m-d');

    $insert = "INSERT INTO reservas (id_usuario, id_evento, cantidad_personas, fecha_reserva, tipo_zona)
               VALUES ($id_usuario, $id_evento, $personas, '$fecha', '$zona')";
    mysqli_query($conexion, $insert);
    echo "Reserva realizada.";
}

$eventos = mysqli_query($conexion, "SELECT * FROM eventos");
?>
<link rel="stylesheet" href="css/reservas.css">
<h2>Reservar Evento</h2>
<br>
<form method="POST">
    <label>Evento:</label>
    <select name="id_evento">
        <?php while($e = mysqli_fetch_assoc($eventos)) { ?>
            <option value="<?= $e['id_evento'] ?>"><?= $e['nom_eve'] ?> - <?= $e['hora_inicio'] ?> - <?= $e['fecha_ini'] ?></option>
        <?php } ?>
    </select><br>
    <input type="number" name="cantidad_personas" placeholder="Personas" required><br>
    <input type="text" name="tipo_zona" placeholder="Zona" required><br>
    <input type="submit" value="Reservar">
</form>
<a href="menu.php">Volver</a>
 <div class="corazones">
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
    <div class="heart"></div>
  </div>
