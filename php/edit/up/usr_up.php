<?php
require "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usr = $_GET['id'];
    $name_usr = $_POST['name_usr'];
    $ap_p_usr = $_POST['ap_p_usr'];
    $ap_m_usr = $_POST['ap_m_usr'];
    $age = $_POST['age'];
    $gen = $_POST['gen'];
    $street = $_POST['street'];
    $num_house = $_POST['num_house'];
    $code_post = $_POST['code_post'];
    $colony = $_POST['colony'];
    $munic = $_POST['munic'];
    $state = $_POST['state'];
    $phone_n = $_POST['phone_n'];
    $email = $_POST['email'];
    $psswd = $_POST['psswd'];

    // Actualizar los datos en la tabla de usuarios
    $sql = "UPDATE users SET
            name_usr = ?,
            ap_p_usr = ?,
            ap_m_usr = ?,
            age = ?,
            gen = ?,
            street = ?,
            num_house = ?,
            code_post = ?,
            colony = ?,
            munic = ?,
            state = ?,
            phone_n = ?,
            email = ?,
            psswd = ?
            WHERE id_usr = ?";

    $up_user = $conn->prepare($sql);
    $up_user->bind_param("sssissiissssssi", $name_usr, $ap_p_usr, $ap_m_usr, $age, $gen, $street, $num_house, 
                        $code_post, $colony, $munic, $state, $phone_n, $email, $psswd, $id_usr);

    if ($up_user->execute()) {
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

    $up_user->close();
}

// Cerrar la conexión
$conn->close();
?>
