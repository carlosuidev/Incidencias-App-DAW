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
    $sql = "SELECT id_grupo,grupo FROM grupos";
    $result = $conn->query($sql);
    $json = "";
    $i = 1;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if($i == $result->num_rows){
                $json = $json." "."{\"id\": \"$row[id_grupo]\", \"grupo\": \"$row[grupo]\"}";
            }else{
                $json = $json." "."{\"id\": \"$row[id_grupo]\", \"grupo\": \"$row[grupo]\"},";
            }
            $i++;
        }

        echo "[$json]";
    } else {
        echo "0 results";
    }
    $conn->close();
} catch (\Throwable $th) {
    // error
}

?>