<?php
//$conn = new mysqli("127.0.0.1", "faye", "faye", "pj");
//$conn = new mysqli("localhost", "root", "faye", "pj");
// Verificar la conexión
$conn = new mysqli("127.0.0.1", "admin_test", "admin_test_psswd", "pj");
mysqli_set_charset($conn, "utf8");
if ($conn->connect_errno) {
  echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
