<?php
session_start();
if (!isset($_SESSION['correo'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú</title>
</head>

<link rel="stylesheet" href="css/style.css">
<body>
  <div class="hamburger" onclick="toggleMenu()">
    <div></div>
    <div></div>
    <div></div>
  </div>

  <nav class="sidebar" id="sidebar">
    <h2>MENU</h2>
    <ul>
      <li><a href="reservas.php">🎟 Reservar</a></li>
      <li><a href="botellas.php">🍾 Comprar Botellas</a></li>
      <li><a href="misreservas.php">🧾 Mis Reservas</a></li>
      <li><a href="eventos.php"> 🎉 Eventos</a></li>
      <li><a href="cerrarsesion.php">Cerrar sesión</a></li>
    </ul>
  </nav>

  <main class="main-content">
    <div class="title">
      <h1>Bienvenido a LOVE, <?php echo $_SESSION['nombre']; ?></h1>
      <p>Selecciona una opción para comenzar tu noche</p>
    </div>
  </main>

  <div class="background-heart"></div>
  <div class="floating-hearts">
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
  </div>

  <script>
    function toggleMenu() {
      document.getElementById('sidebar').classList.toggle('active');
    }
  </script>
  
</body>
</html>