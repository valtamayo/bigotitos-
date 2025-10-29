<?php
    // 1. Incluir el archivo de conexión
    require_once 'conex.php';

    // 2. Verificar si los datos fueron enviados por POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // 3. Recoger los datos del formulario de mascotas
        $id_mascota = $_POST["id_mascota"];
        $nombre_mascota = $_POST["nombre_mascota"];
        $tipo_animal = $_POST["tipo_animal"];
        $raza = $_POST["raza"];
        $edad = $_POST["edad"];
        $nombre_dueno = $_POST["nombre_dueno"];
        $telefono_dueno = $_POST["telefono_dueno"];

        // 4. Preparar la consulta SQL para la tabla 'mascotas'
        // Asegúrate de que tu tabla en la base de datos se llame 'mascotas'
        // y tenga columnas con estos nombres.
        $sql = "INSERT INTO bigotes (id_mascota, nombre_mascota, tipo_animal, raza, edad, nombre_dueno, telefono_dueno) VALUES (?, ?, ?, ?, ?, ?, ?)";

        // 5. Preparar la sentencia
        if ($stmt = $conex->prepare($sql)) {
            // 6. Vincular los parámetros. "ssssiss" significa:
            // s - string (id_mascota)
            // s - string (nombre_mascota)
            // s - string (tipo_animal)
            // s - string (raza)
            // i - integer (edad)
            // s - string (nombre_dueno)
            // s - string (telefono_dueno)
            $stmt->bind_param("ssssiss", $id_mascota, $nombre_mascota, $tipo_animal, $raza, $edad, $nombre_dueno, $telefono_dueno);

            // 7. Ejecutar la sentencia
            if ($stmt->execute()) {
                // Si se guardó con éxito, redirigir al usuario a la página de login con un mensaje.
                header("Location: login.html?status=success");
            } else {
                echo "Error al guardar los datos: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conex->error;
        }
        $conex->close();
    }
?>