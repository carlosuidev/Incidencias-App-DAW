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
    $idProfesor = $_REQUEST['id'];
    $contrasenaActual = hash('sha256', $_REQUEST['contrasenaActual']);
    $contrasenaNueva = hash('sha256', $_REQUEST['contrasenaNueva']);

    $sql = "SELECT * FROM profesores where pass='$contrasenaActual' and id_profesor=$idProfesor";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $upd = "UPDATE profesores SET pass='$contrasenaNueva' WHERE id_profesor=$idProfesor";
        
        if ($conn->query($upd) === TRUE) {
            echo "[{\"msg\": \"guardado\"}]";
        } else {
            echo "[{\"msg\": \"error\"}]";
        }
    } else {
        echo "[{\"msg\": \"mal\"}]";
    }
    
} catch (\Throwable $th) {
    echo $th;
}

?>