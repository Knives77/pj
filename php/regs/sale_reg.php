<script>
    //notificacón
    var notify = () => {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl)
        })
        toastList.forEach(toast => toast.hide());
        toastList.forEach(toast => toast.show());
    }
    //notify();
</script>
<?php
require_once "../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_sales = "SELECT MAX(id_sale) AS max FROM sales";
    $sales = mysqli_query($conn, $num_sales)->fetch_object()->max;
    $id_usr = $_POST["id_usr"];
    $keyword = $_POST["keyword"];
    $date_sale = $_POST["date_sale"];
    $mode_sale = $_POST["mode_sale"];
    $ttl_sale = $_POST["ttl_sale"];
    $payment_type = $_POST["payment_type"];
    $warranty_months = $_POST["warranty_months"];
    if (isset($_POST["deshabilitar"])) {
        $test = $_POST["deshabilitar"];
        //echo $test;
        if ($test == "on") {
            $various_prdct = 0;

            $query = "INSERT INTO `sales` (`id_sale`, `id_usr`, `keyword`, `date_sale`, `mode_sale`, `ttl_sale`, `payment_type`, `warranty_months`, `various_prdct`)
            VALUES (NULL, " . $id_usr . ", '" . $keyword . "', '" . $date_sale . "', '" . $mode_sale . "', '" . $ttl_sale . "', '" . $payment_type . "', '" . $warranty_months . "', '" . $various_prdct . "')";
            // echo $query;
            // Ejecutar la consulta
            if ($conn->query($query) === TRUE) {
                echo "<script>notify();</script>";
                echo "Registro insertado correctamente.";
            } else {
                echo "<script>notify();</script>";
                echo "Error al insertar el registro: " . $conn->error;
            }

        }
    } else {
        if (isset($_POST["option"])) {
            $option = $_POST["option"];
            $various_prdct = 1;
            $query = "INSERT INTO `sales` (`id_sale`, `id_usr`, `keyword`, `date_sale`, `mode_sale`, `ttl_sale`, `payment_type`, `warranty_months`, `various_prdct`)
            VALUES (NULL, " . $id_usr . ", '" . $keyword . "', '" . $date_sale . "', '" . $mode_sale . "', '" . $ttl_sale . "', '" . $payment_type . "', '" . $warranty_months . "', '" . $various_prdct . "')";
            //echo $query;
            //echo $option;
            if ($option == "albums") {
                // echo "albums";
                if (isset($_POST["alb_sa"])) {
                    $el_alb = $_POST["alb_sa"];
                    $el_alb_t = $_POST["alb_sa_t"];
                    $i = 0;
                    $various_prdct = 1;
                    // Procesar los el$el_alb

                    //Ejecutar la consulta
                    if ($conn->query($query) === TRUE) {
                        echo "<script>notify();</script>";
                        echo "Registro insertado en 'sales' correctamente. </br>";
                    } else {
                        echo "<script>notify();</script>";
                        echo "Error al insertar el registro: " . $conn->error;
                    }
                    foreach ($el_alb as $el) {
                        for ($j = 0; $j < $el_alb_t[$i]; $j++) {
                            $sql_alb = "INSERT INTO album_sales VALUES (NULL, $sales, " . $el_alb[$i] . ")";
                            //Ejecutar la consulta
                            if ($conn->query($sql_alb) === TRUE) {
                                echo "Registro insertado en 'album_sales' correctamente. </br>";
                            } else {
                                echo "Error al insertar el registro: " . $conn->error;
                            }
                        }
                        // echo $sql_alb;
                        // echo $el . "</br>";
                        $i++;
                    }
                } else {
                    echo "<script>notify();</script>";
                    echo "Error, selecciona un valor del select...";
                }
            } else if ($option == "songs") {
                if (isset($_POST["sgn_sa"])) {
                    $el_sgn = $_POST["sgn_sa"];
                    $el_sgn_t = $_POST["sgn_sa_t"];
                    $i = 0;
                    $various_prdct = 1;
                    // Procesar los el$el_alb

                    //Ejecutar la consulta
                    if ($conn->query($query) === TRUE) {
                        echo "<script>
                         notify();
                         </script>";
                        echo "Registro insertado en 'sales' correctamente. </br>";
                    } else {
                        echo "<script>notify();</script>";
                        echo "Error al insertar el registro: " . $conn->error;
                    }
                    foreach ($el_sgn as $el) {
                        for ($j = 0; $j < $el_sgn_t[$i]; $j++) {
                            $sql_sgn = "INSERT INTO song_sales VALUES (NULL, $sales, " . $el_sgn[$i] . ")";
                            //Ejecutar la consulta
                            if ($conn->query($sql_sgn) === TRUE) {
                                echo "Registro insertado en 'song_sales' correctamente. </br>";
                            } else {
                                echo "Error al insertar el registro: " . $conn->error;
                            }
                        }
                        // echo $sql_alb;
                        // echo $el . "</br>";
                        $i++;
                    }
                } else {
                    echo "<script>notify();</script>";
                    echo "Error, selecciona un valor del select...";
                }
            } else if ($option == "ambos") {
                if (isset($_POST["alb_sa"]) && isset($_POST["sgn_sa"])) {
                    $el_alb = $_POST["alb_sa"];
                    $el_alb_t = $_POST["alb_sa_t"];
                    $el_sgn = $_POST["sgn_sa"];
                    $el_sgn_t = $_POST["sgn_sa_t"];
                    $i = 0;
                    $various_prdct = 1;

                    //Ejecutar la consulta
                    if ($conn->query($query) === TRUE) {
                        echo "<script>
                         notify();
                         </script>";
                        echo "Registro insertado en 'sales' correctamente. </br>";
                    } else {
                        echo "<script>notify();</script>";
                        echo "Error al insertar el registro: " . $conn->error;
                    }

                    foreach ($el_alb as $el) {
                        for ($j = 0; $j < $el_alb_t[$i]; $j++) {
                            $sql_alb = "INSERT INTO album_sales VALUES (NULL, $sales, " . $el_alb[$i] . ")";
                            //Ejecutar la consulta
                            if ($conn->query($sql_alb) === TRUE) {
                                echo "Registro insertado en 'album_sales' correctamente. </br>";
                            } else {
                                echo "Error al insertar el registro: " . $conn->error;
                            }
                        }
                        // echo $sql_alb;
                        // echo $el . "</br>";
                        $i++;
                    }
                    $i = 0;
                    foreach ($el_sgn as $el) {
                        for ($j = 0; $j < $el_sgn_t[$i]; $j++) {
                            $sql_sgn = "INSERT INTO song_sales VALUES (NULL, $sales, " . $el_sgn[$i] . ")";
                            //Ejecutar la consulta
                            if ($conn->query($sql_sgn) === TRUE) {
                                echo "Registro insertado en 'song_sales' correctamente. </br>";
                            } else {
                                echo "Error al insertar el registro: " . $conn->error;
                            }
                        }
                        // echo $sql_alb;
                        // echo $el . "</br>";
                        $i++;
                    }
                } else {
                    echo "<script>notify();</script>";
                    echo "Error, selecciona un valor para los select...";
                }
            }
        }
    }
}
// Cerrar la conexión
$conn->close();
?>