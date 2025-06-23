<?php
include("conexion.php");
$resultado = mysqli_query($conexion, "SELECT * FROM eventos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Eventos | Antro Love</title>
  <link rel="stylesheet" href="css/eventos.css">
</head>
<body>

  <header>
    <h2> Eventos Love </h2>
    <p>Las noches más inolvidables están aquí</p>
  </header>

  <main class="eventos">

    <section class="lista-eventos">
      <h2> 🎉 Eventos Registrados</h2>
      <ul>
        <?php while ($evento = mysqli_fetch_assoc($resultado)) { ?>
          <li>
            <strong><?= $evento['nom_eve'] ?></strong> - <?= $evento['fecha_ini'] ?> - <?= $evento['hora_inicio'] ?> - <?= $evento['tipo_eve'] ?><br>
            <a href="reservas.php?id_evento=<?= $evento['id_evento'] ?>">Reservar este evento</a>
          </li>
        <?php } ?>
      </ul>
    </section>

    <section class="eventos-destacados">
      <h2>🌟 Eventos Destacados</h2>

      <div class="evento">
        <div class="contenido">
          <h2>🎤 Malilla</h2>
          <p>📅 Viernes 20 de junio - 10:00 PM</p>
          <p>💥 Shots gratis para los primeros 50</p>
        </div>
        <center><img src="imagenes/malilla.jpg" alt="Malilla"></center>
      </div>

      <div class="evento">
        <div class="contenido">
          <h2>😎 Dani Flow</h2>
          <p>📅 Sábado 21 de junio - 11:00 PM</p>
          <p>🎁 Promo 2x1 en botellas toda la noche</p>
        </div>
        <center><img src="imagenes/dani.jpg" alt="Dani Flow"></center>
      </div>

      <div class="evento">
        <div class="contenido">
          <h2>🎉 Xochifest</h2>
          <p>📅 Miércoles 25 de junio - 9:00 PM</p>
          <p>🎙️ Premios para los mejores cantantes</p>
        </div>
        <center><img src="imagenes/emafest.jpg" alt="Xochifest"></center>
      </div>

      <div class="evento">
        <div class="contenido">
          <h2>🎶 Noche de Corridos Tumbados</h2>
          <p>📅 Viernes 4 de julio - 9:30 PM</p>
          <p>🍸 Drinks gratis para Alucines</p>
        </div>
        <center><img src="imagenes/tumbados.png" alt="Corridos Tumbados"></center>
      </div>

    </section>

    <a href="menu.php">🔙 Regresar al menú</a>

  </main>

  <footer>
    <p>&copy; 2025 Antro Love - Vive la pasión de la noche</p>
  </footer>

</body>
</html>
