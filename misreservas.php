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

$query = "SELECT r.*, e.nom_eve FROM reservas r 
          JOIN eventos e ON r.id_evento = e.id_evento 
          WHERE r.id_usuario = $id_usuario";
$reservas = mysqli_query($conexion, $query);
?>
<link rel="stylesheet" href="css/misreservas.css">
<h1>Mis Reservas</h1>
<ul>
<?php while($r = mysqli_fetch_assoc($reservas)) { ?>
    <li>
        Evento: <?= $r['nom_eve'] ?> <br>
        Personas: <?= $r['cantidad_personas'] ?> <br>
        Fecha Reserva: <?= $r['fecha_reserva'] ?> <br>
        Zona: <?= $r['tipo_zona'] ?>
    </li><br>
<?php } ?>
</ul>
<a href="menu.php">Volver</a>
 <div class="corazones">
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
    <div class="heart"></div>
  </div>

