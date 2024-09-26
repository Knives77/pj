<?php
require "../connection.php";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recoger datos del formulario
    $id_alb = $_POST['id_alb'];
    $name_s = $_POST['name_s'];
    $date_s = $_POST['date_s'];
    $durtn = $_POST['durtn'];
    $tims_plyd = $_POST['tims_plyd'];
    $price_s = $_POST['price_s'];
    $format_s = $_POST['format_s'];
    $lyrics = $_POST['lyrics'];

    // Crear la consulta de inserción
    $query_insert = "INSERT INTO songs (id_alb, name_s, date_s, durtn, tims_plyd, price_s, format_s, lyrics) 
                     VALUES ('$id_alb', '$name_s', '$date_s', '$durtn', '$tims_plyd', '$price_s', '$format_s', '$lyrics')";

    // Ejecutar la consulta
    if ($conn->query($query_insert) === TRUE) {
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
        echo "Registro insertado correctamente.";
    } else {
        echo "<script>notify();</script>";
        echo "Error al insertar el registro: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
