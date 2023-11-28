<?php
require "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar el formulario
    // ...

    // Recuperar datos del formulario
    $id_sale = $_GET['id'];
    $id_usr = $_POST['id_usr'];
    $keyword = $_POST['keyword'];
    $date_sale = $_POST['date_sale'];
    $mode_sale = $_POST['mode_sale'];
    $ttl_sale = $_POST['ttl_sale'];
    $payment_type = $_POST['payment_type'];
    $warranty_months = $_POST['warranty_months'];

    // Actualizar los datos en la tabla de ventas
    $sql = "UPDATE sales SET
            id_usr = ?,
            keyword = ?,
            date_sale = ?,
            mode_sale = ?,
            ttl_sale = ?,
            payment_type = ?,
            warranty_months = ?
            WHERE id_sale = ?";

    $up_sale = $conn->prepare($sql);
    $up_sale->bind_param("isssisii", $id_usr, $keyword, $date_sale, $mode_sale, $ttl_sale, $payment_type, $warranty_months, $id_sale);

    if ($up_sale->execute()) {
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
        echo "Error al actualizar el registro: " . $conn->error;
        echo "<script>notify();</script>";
    }

    $up_sale->close();
}

// Cerrar la conexión
$conn->close();
?>
