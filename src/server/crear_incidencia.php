<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "incidencias_iespb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    $asunto = $_REQUEST['nombre'];
    $aula = $_REQUEST['aula'];
    $grupo = $_REQUEST['grupo'];
    $descripcion = $_REQUEST['descripcion'];
    $profesor = $_REQUEST['profesor'];
    $fecha = "";
    $respuesta = "";

    $sql = "INSERT INTO incidencias (nombre, apellidos, usuario, correo, pass, id_departamento) values('$nombre', '$apellidos', '$usuario', '$correo', '$contrasena', $departamento)";
    if ($conn->query($sql) === TRUE) {
        echo "[{\"msg\": \"guardado\"}]";
    } else {
        echo "[{\"msg\": \"no_guardado\"}]";
    }
    $conn->close();
} catch (\Throwable $th) {
    echo "[{\"msg\": \"$sql\"}]";
    $conn->close();
}

?>