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
    $idIncidencia = $_REQUEST['incidencia'];
    $respuesta = $_REQUEST['respuesta'];

    $respuesta = "UPDATE incidencias SET respuesta='$respuesta', estado='TERMINADA' WHERE id_incidencia=$idIncidencia";
    
    if ($conn->query($respuesta) === TRUE) {
        header("Location: /INCIDENCIAS-APP-DAW/src/adm_historial.php");
    } else {
        header("Location: /INCIDENCIAS-APP-DAW/src/adm_incidencias.php");
    }
    
} catch (\Throwable $th) {
    echo $th;
    //header("Location: /INCIDENCIAS-APP-DAW/src/adm_incidencias.php");
}

?>