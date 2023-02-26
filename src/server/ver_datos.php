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

    $sql = "SELECT *
        FROM profesores p
        INNER JOIN departamentos d
        on p.id_departamento = d.id_departamento
        WHERE p.id_profesor = $idProfesor";
    

    $result = $conn->query($sql);
    $json = "";
    $i = 1;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if($i == $result->num_rows){
                $json = $json." "."{\"id\": \"$row[id_profesor]\", \"usuario\": \"$row[usuario]\", \"nombre\": \"$row[nombre]\", \"apellidos\": \"$row[apellidos]\", \"correo\": \"$row[correo]\", \"departamento\": \"$row[departamento]\"}";
            }else{
                $json = $json." "."{\"id\": \"$row[id_profesor]\", \"usuario\": \"$row[usuario]\", \"nombre\": \"$row[nombre]\", \"apellidos\": \"$row[apellidos]\", \"correo\": \"$row[correo]\", \"departamento\": \"$row[departamento]\"},";
            }
            $i++;
        }

        echo "[$json]";
    } else {
        echo "[{\"id\": \"nada\"}]";
    }
    $conn->close();
} catch (\Throwable $th) {
    echo "$result";
}

?>