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

    $usuario = $_REQUEST['usuario'];
    $contrasena = $_REQUEST['contrasena'];
    $sql = "SELECT * FROM profesores where usuario='$usuario' AND pass='$contrasena'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION["nombre"] = $row["nombre"];
            $_SESSION["apellidos"] = $row["apellidos"];
            $_SESSION["id"] = $row["id_profesor"];

            if(1 == $row['id_profesor']){
                $_SESSION["rol"] = "Administrador/a";
            }else{
                $_SESSION["rol"] = "Profesor/a";
            }

            echo "[{\"msg\": \"bien\"}]";
        }
    } else {
        echo "[{\"msg\": \"mal\"}]";
    }
    
    $conn->close();

?>