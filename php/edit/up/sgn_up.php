<?php
require "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_song = $_GET['id'];
    $id_alb = $_POST['id_alb'];
    $name_s = $_POST['name_s'];
    $date_s = $_POST['date_s'];
    $durtn = $_POST['durtn'];
    $tims_plyd = $_POST['tims_plyd'];
    $price_s = $_POST['price_s'];
    $format_s = $_POST['format_s'];
    $lyrics = $_POST['lyrics'];

    $sql = "UPDATE songs SET
            id_alb = ?,
            name_s = ?,
            date_s = ?,
            durtn = ?,
            tims_plyd = ?,
            price_s = ?,
            format_s = ?,
            lyrics = ?
            WHERE id_song = ?";

    $update_song = $conn->prepare($sql);
    $update_song->bind_param("isssiissi", $id_alb, $name_s, $date_s, $durtn, $tims_plyd, $price_s, $format_s, $lyrics, $id_song);

    if ($update_song->execute()) {
        echo "Registro de canción actualizado con éxito.";
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
        echo "Error al actualizar el registro de la canción: " . $conn->error;
        echo "<script>notify();</script>";
    }

    $update_song->close();
}

$conn->close();
?>
