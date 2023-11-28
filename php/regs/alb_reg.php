<?php
require "../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["cover_alb"]) && $_FILES["cover_alb"]["error"] == 0) {
        $nombre = $_FILES["cover_alb"]["name"];
        $tipo = $_FILES["cover_alb"]["type"];
        $tamano = $_FILES["cover_alb"]["size"];
        $ruta_temporal = $_FILES["cover_alb"]["tmp_name"];

        // Ruta donde deseas almacenar la imagen en el sistema de archivos
        // /pj/php/regs/alb_reg.php
        $ruta_destino = "../../img/uploads/" . $nombre;

        // Mueve la imagen desde la ruta temporal a la ruta de destino
        if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
            /* // Inserta los datos de la imagen en la base de datos
            $conexion = new mysqli("servidor", "usuario", "contraseña", "basededatos");

            $sql = "INSERT INTO imagenes (nombre, tipo, tamano, ruta) VALUES (?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ssis", $nombre, $tipo, $tamano, $ruta_destino);
            if ($stmt->execute()) {
                echo "La imagen se ha subido y registrado correctamente.";
            } else {
                echo "Error al registrar la imagen en la base de datos.";
            }
            $stmt->close();
            $conexion->close(); */
            $album = array(
                "alb_cover" => "./img/uploads/$nombre",
                "nm_alb" => $_POST["nm_alb"],
                "date_alb" => $_POST["date_alb"],
                "totl_trck" => $_POST["totl_trck"],
                "gen_alb" => $_POST["gen_alb"],
                "punct_alb" => $_POST["punct_alb"],
                "price_alb" => $_POST["price_alb"],
                "note_alb" => $_POST["note_alb"]
            );
            $sql = "INSERT INTO albums
                      VALUES (NULL,
                          '" . $album["alb_cover"] . "',
                          '" . $album["nm_alb"] . "',
                          '" . $album["date_alb"] . "',
                          " . $album["totl_trck"] . ",
                          '" . $album["gen_alb"] . "',
                          " . $album["punct_alb"] . ",
                          " . $album["price_alb"] . ",
                          '" . $album["note_alb"] . "'
                     )";
            $up_album = $conn->prepare($sql);
            if ($up_album->execute()) {
                echo "Registro exitoso";
            echo"<script>
            var notify = () => {
                var toastElList = [].slice.call(document.querySelectorAll('.toast'))
                var toastList = toastElList.map(function (toastEl) {
                    return new bootstrap.Toast(toastEl)
                })
                toastList.forEach(toast => toast.hide());
                toastList.forEach(toast => toast.show());
            }
            notify();
            </script>";

                
            } else {
                echo "Error al insertar registro: " . $conn->error;
                echo "<script>notify();</script>";
            }
            $up_album->close();
        } else {
            echo "Error al subir la imagen al servidor.";
            echo "<script>notify();</script>";
        }
    } else {
        echo "Error al cargar la imagen" . $conn->error;
        echo "<script>notify();</script>";
    }
}

$conn->close();
