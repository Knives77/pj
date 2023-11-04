<?php

//Intenta conectarte con el usuario personalizado(server, user, password, basededatos)
$conn = new mysqli("127.0.0.1", "faye", "faye", "pj");
mysqli_set_charset($conn, "utf8");
// Verificar la conexión
if ($conn->connect_error) {
  // Si la conexión con el usuario personalizado falla, intenta con el usuario por defecto
  $conn = new mysqli("localhost", "root", "", "pj");
  mysqli_set_charset($conn, "utf8");
  // Verificar la conexión con el usuario por defecto (server, user, password, basededatos)
  if ($conn->connect_error) {
    die("Error de conexión con usuario por defecto: " . $conn->connect_error);
  }
}
