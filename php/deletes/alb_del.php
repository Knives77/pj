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
echo $id;
$sql = "DELETE FROM albums WHERE id_alb = $id";

if (mysqli_query($conn, $sql) == TRUE) {
    echo "Se eliminó correctamente";
    echo "<script>notify();</script>";
} else {
    echo "<script>notify();</script>";
}
$conn->close();
?>
