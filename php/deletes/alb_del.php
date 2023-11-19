<script>
    var notify = () => {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl)
        })
        toastList.forEach(toast => toast.hide());
        toastList.forEach(toast => toast.show());
    }
</script>

<?php
require "../connection.php";
$id = $_GET["id"];
$ruta_Img = "SELECT alb_cov as cover FROM albums WHERE id_alb=$id";
$res = str_replace("./img/uploads/", "../../img/uploads/", mysqli_query($conn, $ruta_Img)->fetch_object()->cover);
$sql = "DELETE FROM albums WHERE id_alb = $id";
if (mysqli_query($conn, $sql) == true) {

    if (file_exists($res) == true) {
        if (unlink($res)) {
            echo "Se eliminó correctamente.";
        } else {
            echo "Error inesperado";
        }
    } else {
        echo "Se eliminó con error, no se encontró imagen";
    }
} else {
    echo "Error en la consulta" . $conn->error;
}
$conn->close();
?>
