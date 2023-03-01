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
    $idProfesor = $_REQUEST['idProfesor'];
    $img = file_get_contents($_FILES["imgperfil"]["name"]);
    
    $upd = "UPDATE profesores SET img_perfil='$img' WHERE id_profesor=$idProfesor";
    if ($conn->query($upd) === TRUE) {
        echo "bien";
    } else {
        echo "mal";
    }
} catch (\Throwable $th) {
    echo $th;
}
