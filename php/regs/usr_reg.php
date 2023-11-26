<?php
require "../connection.php";
// Obtener los valores del formulario (asegúrate de tener estos valores)
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

// Insertar datos en la tabla
$insert_query = "INSERT INTO users (id_usr, name_usr, ap_p_usr, ap_m_usr, age, gen, street, num_house, code_post, colony, munic, state, phone_n, email, psswd) VALUES (NULL, '$name_usr', '$ap_p_usr', '$ap_m_usr', '$age', '$gen', '$street', '$num_house', '$code_post', '$colony', '$munic', '$state', '$phone_n', '$email', '$psswd')";
if ($conn->query($insert_query) === TRUE) {
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
    echo"Registro insertado con éxito.";
} else {
    echo "<script>notify();</script>";
    echo"Error al insertar el registro: " . $conn->error;
}

$conn->close();
?>