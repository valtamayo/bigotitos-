<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datos de Mascotas - Bigotitos</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar">
    <img src="animalitos.jpg" alt="animalitos" width="50" height="50">
    <ul class="nav-links">
      <li><a href="index.html">Inicio</a></li>
      <li><a href="sobre-nosotros.html">Sobre Nosotros</a></li>
      <li><a href="index.html#services">Servicios</a></li>
      <li><a href="tienda.html">Tienda</a></li>
      <li><a href="contacto.html">Contacto</a></li>
      <li><a href="login.html">Login</a></li>
      <li><a href="mostrar.php">Ver datos</a></li>
      <li><button id="theme-toggle-btn" class="theme-toggle-btn">☀️</button></li>
    </ul>
  </nav>

  <main class="tienda-main">
    <section class="content-section">
      <h3>Mascotas Registradas</h3>
      <div class="table-container">
        <?php
            require_once 'conex.php';

            // Consulta para obtener todos los registros de la tabla 'bigotes'
            $sql = "SELECT id_mascota, nombre_mascota, tipo_animal, raza, edad, nombre_dueno, telefono_dueno FROM bigotes";
            $resultado = $conex->query($sql);

            // Verificar si hay resultados
            if ($resultado->num_rows > 0) {
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>ID Mascota</th>";
                echo "<th>Nombre</th>";
                echo "<th>Tipo</th>";
                echo "<th>Raza</th>";
                echo "<th>Edad</th>";
                echo "<th>Dueño</th>";
                echo "<th>Teléfono</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                // Imprimir cada fila de datos
                while($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fila["id_mascota"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["nombre_mascota"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["tipo_animal"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["raza"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["edad"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["nombre_dueno"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["telefono_dueno"]) . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>No hay mascotas registradas todavía.</p>";
            }
            $conex->close();
        ?>
      </div>
    </section>
  </main>

  <footer id="contact">
    <p>Instagram: <a href="https://www.instagram.com/valen_t030" target="_blank">@valen_t030</a></p>
    <p>Teléfono: 3113473926</p>
    <p>Correo: valentamayouco@gmail.com</p>
    <p>&copy; 2025 Bigotitos. Todos los derechos reservados.</p>
  </footer>

  <script src="theme-switcher.js"></script>
</body>
</html>