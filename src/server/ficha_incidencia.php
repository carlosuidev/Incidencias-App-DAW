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
    $id= $_REQUEST['id'];

    $sql = "SELECT *
        FROM incidencias i
        INNER JOIN tipos t
            on t.id_tipo = i.id_tipo
        INNER JOIN aulas a
            on a.id_aula = i.id_aula
        INNER JOIN grupos g
            on g.id_grupo = i.id_grupo
        WHERE i.id_incidencia = $id";
        
    

    $result = $conn->query($sql);
    $json = "";
    $i = 1;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if($i == $result->num_rows){
                $json = $json." "."{\"id\": \"$row[id_incidencia]\", \"grupo\": \"$row[grupo]\", \"tipo\": \"$row[tipo]\", \"asunto\": \"$row[asunto]\", \"respuesta\": \"$row[respuesta]\", \"descripcion\": \"$row[descripcion]\", \"estado\": \"$row[estado]\", \"fecha\": \"$row[fecha]\", \"aula\": \"$row[aula]\"}";
            }else{
                $json = $json." "."{\"id\": \"$row[id_incidencia]\", \"grupo\": \"$row[grupo]\", \"tipo\": \"$row[tipo]\", \"asunto\": \"$row[asunto]\", \"respuesta\": \"$row[respuesta]\", \"descripcion\": \"$row[descripcion]\", \"estado\": \"$row[estado]\", \"fecha\": \"$row[fecha]\", \"aula\": \"$row[aula]\"},";
            }
            $i++;
        }

        echo "[$json]";
    } else {
        echo "[{\"id\": \"nada\"}]";
    }
    $conn->close();
} catch (\Throwable $th) {
    echo "$result  (id: $idProfesor, estado: $estado, tipo: $tipo, asunto: $asunto)";
}

?>