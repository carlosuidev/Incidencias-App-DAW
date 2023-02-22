<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "incidencias_iespb";

date_default_timezone_set('UTC');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    $asunto = $_REQUEST['asunto'];
    $aula = $_REQUEST['aula'];
    $grupo = $_REQUEST['grupo'];
    $descripcion = $_REQUEST['descripcion'];
    $profesor = $_REQUEST['profesor'];
    $tipo = $_REQUEST['tipo'];
    $fecha = date("j/n/Y"); ;
    $respuesta = "";
    $estado = "EN PROCESO";

    $sql = "INSERT INTO incidencias (id_profesor, id_grupo, asunto, descripcion, respuesta, estado, id_tipo, fecha, id_aula) 
    values($profesor, $grupo, '$asunto', '$descripcion', '$respuesta', '$estado', $tipo, '$fecha', $aula)";
    if ($conn->query($sql) === TRUE) {
        echo "[{\"msg\": \"guardado\"}]";
    } else {
        echo "[{\"msg\": \"no_guardado\"}]";
    }
    $conn->close();
} catch (\Throwable $th) {
    echo "[{\"msg\": \"$conn->error\"}]";
    $conn->close();
}

?>