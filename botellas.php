<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['correo'])) {
    header("Location: index.php");
    exit();
} 

$correo = $_SESSION['correo'];
$query_usuario = "SELECT id_usuario FROM usuarios WHERE correo = '$correo'";
$result_usuario = mysqli_query($conexion, $query_usuario);
$row_usuario = mysqli_fetch_assoc($result_usuario);
$id_usuario = $row_usuario['id_usuario'];

// Procesar compra desde el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombreb']) && isset($_POST['precio'])) {
    $nombreb = mysqli_real_escape_string($conexion, $_POST['nombreb']);
    $precio = floatval($_POST['precio']);

    $insertar = "INSERT INTO botellas (nombreb, precio, id_usuario) VALUES ('$nombreb', $precio, $id_usuario)";
    if (mysqli_query($conexion, $insertar)) {
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error al guardar la botella: " . mysqli_error($conexion);
    }
}


$query_botellas = "SELECT * FROM botellas WHERE id_usuario = $id_usuario";
$resultado = mysqli_query($conexion, $query_botellas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mis Botellas</title>
  <link rel="stylesheet" href="css/botella.css">
  <script>
    function agregarBotella(nombre, precio) {
      document.getElementById('nombreb').value = nombre;
      document.getElementById('precio').value = precio;
    }
  </script>
</head>
<body>
  <div class="top-section ">
  <h2>Mis Compras</h2>
  <ul>
    <?php while ($botella = mysqli_fetch_assoc($resultado)) { ?>
      <li>
        Botella: <?= $botella['nombreb'] ?> <br>
        Precio: $<?= $botella['precio'] ?>
      </li><br>
    <?php } ?>
  </ul>
</div>
<div class="compra-form">
  <h3>Comprar nueva botella</h3>
  <br>
  <form  method="POST">
    <input type="text" name="nombreb" id="nombreb" placeholder="Nombre de la botella" required />
    <input type="number" name="precio" id="precio" placeholder="Precio" required />
    <button type="submit">Comprar</button>
  </form>
  </div>

  <h2>Catálogo de Botellas</h2>
  <br>
  <div class="botellas-container">

    <div class="botella-card">
      <img src="imagenesbotellas/botella1.jpeg" alt="Botella 1">
      <div class="nombre-botella">Don Julio 70</div>
      <div class="precio-botella">$1800</div>
      <button onclick="agregarBotella('Don Julio 70', 1800)">Agregar</button>
    </div>

    <div class="botella-card">
      <img src="imagenesbotellas/BOTELLA2.webp" alt="Botella 2">
      <div class="nombre-botella">1800</div>
      <div class="precio-botella">$1700</div>
      <button onclick="agregarBotella('1800', 1700)">Agregar</button>
    </div>

    <div class="botella-card">
      <img src="imagenesbotellas/botella3.jpeg" alt="Botella 3">
      <div class="nombre-botella">Dom Perignon</div>
      <div class="precio-botella">$26000</div>
      <button onclick="agregarBotella('Dom Perignon', 26000)">Agregar</button>
    </div>

    <div class="botella-card">
      <img src="imagenesbotellas/botellacuatro.avif" alt="Botella 4">
      <div class="nombre-botella">Freixenet</div>
      <div class="precio-botella">$800</div>
      <button onclick="agregarBotella('Freixenet', 800)">Agregar</button>
    </div>

    <div class="botella-card">
      <img src="imagenesbotellas/botella5.webp" alt="Botella 5">
      <div class="nombre-botella">Buchanan’s 12 años</div>
      <div class="precio-botella">$1200</div>
      <button onclick="agregarBotella('Buchanan’s 12 años', 1200)">Agregar</button>
    </div>

    <div class="botella-card">
      <img src="imagenesbotellas/botella6.png" alt="Botella 6">
      <div class="nombre-botella">Johnnie Walker Red Label</div>
      <div class="precio-botella">$800</div>
      <button onclick="agregarBotella('Johnnie Walker Red Label', 800)">Agregar</button>
    </div>

    <div class="botella-card">
      <img src="imagenesbotellas/botella7.avif" alt="Botella 7">
      <div class="nombre-botella">Johnnie Walker Blue Label</div>
      <div class="precio-botella">$12500</div>
      <button onclick="agregarBotella('Johnnie Walker Blue Label', 12500)">Agregar</button>
    </div>

    <div class="botella-card">
      <img src="imagenesbotellas/botella8.avif" alt="Botella 8">
      <div class="nombre-botella">Grey Goose</div>
      <div class="precio-botella">$1800</div>
      <button onclick="agregarBotella('Grey Goose', 1800)">Agregar</button>
    </div>

    <div class="botella-card">
      <img src="imagenesbotellas/botella 9.jpeg" alt="Botella 9">
      <div class="nombre-botella">Clase Azul</div>
      <div class="precio-botella">$4300</div>
      <button onclick="agregarBotella('Clase Azul', 4300)">Agregar</button>
    </div>

    <div class="botella-card">
      <img src="imagenesbotellas/botella10.avif" alt="Botella 10">
      <div class="nombre-botella">Moët & Chandon</div>
      <div class="precio-botella">$2500</div>
      <button onclick="agregarBotella('Moët & Chandon', 2500)">Agregar</button>
    </div>

  </div>
  
  <div class="corazones">
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
    <div class="heart"></div><div class="heart"></div><div class="heart"></div>
    <div class="heart"></div>
  </div>


  <a href="menu.php">Volver al menú</a>

</body>
</html>
