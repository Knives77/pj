<?php
require "../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["deshabilitar"])) {
        $test = $_POST["deshabilitar"];
        echo $test;
        if ($test == "on") {
            $id_usr = $_POST["id_usr"];
            $keyword = $_POST["keyword"];
            $date_sale = $_POST["date_sale"];
            $mode_sale = $_POST["mode_sale"];
            $ttl_sale = $_POST["ttl_sale"];
            $payment_type = $_POST["payment_type"];
            $warranty_months = $_POST["warranty_months"];
            $various_prdct = 0;

            $query = "INSERT INTO `sales` (`id_sale`, `id_usr`, `keyword`, `date_sale`, `mode_sale`, `ttl_sale`, `payment_type`, `warranty_months`, `various_prdct`)
            VALUES (NULL, " . $id_usr . ", '" . $keyword . "', '" . $date_sale . "', '" . $mode_sale . "', '" . $ttl_sale . "', '" . $payment_type . "', '" . $warranty_months . "', '" . $various_prdct . "')";
            // Ejecutar la consulta
            if ($conn->query($query) === TRUE) {
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
                echo "Registro insertado correctamente.";
            } else {
                echo "<script>notify();</script>";
                echo "Error al insertar el registro: " . $conn->error;
            }

        }
    }
}
// Cerrar la conexión
$conn->close();
?>