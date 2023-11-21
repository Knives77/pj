<?php
require "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["cover_alb"]) && $_FILES["cover_alb"]["error"] == 0) {
        $nombre = $_FILES["cover_alb"]["name"];
        $tipo = $_FILES["cover_alb"]["type"];
        $tamano = $_FILES["cover_alb"]["size"];
        $ruta_temporal = $_FILES["cover_alb"]["tmp_name"];

        $ruta_destino = "../../../img/uploads/" . $nombre;
        if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
            $id_alb = $_GET['id'];
            $alb_cov = "./img/uploads/".$nombre."";
            $name_a = $_POST['nm_alb'];
            $date_alb = $_POST['date_alb'];
            $totl_trck = $_POST['totl_trck'];
            $gen_alb = $_POST['gen_alb'];
            $punct = $_POST['punct_alb'];
            $price = $_POST['price_alb'];
            $note = $_POST['note_alb'];

            // Actualizar los datos en la tabla de álbumes
            $sql = "UPDATE albums SET
            alb_cov = '$alb_cov',
            name_a = '$name_a',
            date_alb = '$date_alb',
            totl_trck = $totl_trck,
            gen_alb = '$gen_alb',
            punct = $punct,
            price = $price,
            note = '$note'
            WHERE id_alb = $id_alb";
            $up_album = $conn->prepare($sql);

            if ($up_album->execute()) {
                echo "Registro actualizado";
                echo "<script>
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
                echo "Error al actualizar registro: " . $conn->error;
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
// Cerrar la conexión
$conn->close();
?>