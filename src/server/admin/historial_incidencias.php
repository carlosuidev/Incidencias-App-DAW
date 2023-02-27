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
    $estado = $_REQUEST['estado'];
    $tipo = $_REQUEST['tipo'];
    $asunto = $_REQUEST['asunto'];

    // TODO CAMBIADO
    if($estado!='-' && $tipo!=0 && $asunto!=''){
        $sql = "SELECT *
        FROM incidencias i
        INNER JOIN tipos t
            on t.id_tipo = i.id_tipo
        INNER JOIN aulas a
            on a.id_aula = i.id_aula
        INNER JOIN grupos g
            on g.id_grupo = i.id_grupo
        INNER JOIN profesores p
            on p.id_profesor = i.id_profesor
        WHERE i.estado='$estado' AND i.id_tipo=$tipo AND estado='$estado' ORDER BY i.id_incidencia DESC";
    
    // SOLO ESTADO
    }else if($estado!='-' && $tipo==0 && $asunto==''){
        $sql = "SELECT *
        FROM incidencias i
        INNER JOIN tipos t
            on t.id_tipo = i.id_tipo
        INNER JOIN aulas a
            on a.id_aula = i.id_aula
        INNER JOIN grupos g
            on g.id_grupo = i.id_grupo
        INNER JOIN profesores p
            on p.id_profesor = i.id_profesor
        WHERE i.estado='$estado'  ORDER BY i.id_incidencia DESC";
    
    // SOLO ASUNTO
    }else if($estado=='-' && $tipo==0 && $asunto!=''){
        $sql = "SELECT *
        FROM incidencias i
        INNER JOIN tipos t
            on t.id_tipo = i.id_tipo
        INNER JOIN aulas a
            on a.id_aula = i.id_aula
        INNER JOIN grupos g
            on g.id_grupo = i.id_grupo
        INNER JOIN profesores p
            on p.id_profesor = i.id_profesor
        WHERE i.asunto LIKE'$asunto%' ORDER BY i.id_incidencia DESC";

    // SOLO TIPO
    }else if($estado=='-' && $tipo!=0 && $asunto==''){
        $sql = "SELECT *
        FROM incidencias i
        INNER JOIN tipos t
            on t.id_tipo = i.id_tipo
        INNER JOIN aulas a
            on a.id_aula = i.id_aula
        INNER JOIN grupos g
            on g.id_grupo = i.id_grupo
        INNER JOIN profesores p
            on p.id_profesor = i.id_profesor
        WHERE i.id_tipo = $tipo ORDER BY i.id_incidencia DESC";

    // ESTADO+ASUNTO
    }else if($estado!='-' && $tipo==0 && $asunto!=''){
        $sql = "SELECT *
        FROM incidencias i
        INNER JOIN tipos t
            on t.id_tipo = i.id_tipo
        INNER JOIN aulas a
            on a.id_aula = i.id_aula
        INNER JOIN grupos g
            on g.id_grupo = i.id_grupo
        INNER JOIN profesores p
            on p.id_profesor = i.id_profesor
        WHERE i.estado='$estado' AND i.asunto LIKE '$asunto%' ORDER BY i.id_incidencia DESC";
    
    // ESTADO+TIPO
    }else if($estado!='-' && $tipo!=0 && $asunto==''){
        $sql = "SELECT *
        FROM incidencias i
        INNER JOIN tipos t
            on t.id_tipo = i.id_tipo
        INNER JOIN aulas a
            on a.id_aula = i.id_aula
        INNER JOIN grupos g
            on g.id_grupo = i.id_grupo
        INNER JOIN profesores p
            on p.id_profesor = i.id_profesor
        WHERE i.estado='$estado' AND i.id_tipo=$tipo ORDER BY i.id_incidencia DESC";

    // TIPO+ASUNTO
    }else if($estado=='-' && $tipo!=0 && $asunto!=''){
        $sql = "SELECT *
        FROM incidencias i
        INNER JOIN tipos t
            on t.id_tipo = i.id_tipo
        INNER JOIN aulas a
            on a.id_aula = i.id_aula
        INNER JOIN grupos g
            on g.id_grupo = i.id_grupo
        INNER JOIN profesores p
            on p.id_profesor = i.id_profesor
        WHERE i.id_tipo=$tipo AND i.asunto LIKE '$asunto%' ORDER BY i.id_incidencia DESC";
    }else{
        $sql = "SELECT *
        FROM incidencias i
        INNER JOIN tipos t
            on t.id_tipo = i.id_tipo
        INNER JOIN aulas a
            on a.id_aula = i.id_aula
        INNER JOIN grupos g
            on g.id_grupo = i.id_grupo
        INNER JOIN profesores p
            on p.id_profesor = i.id_profesor
        ORDER BY i.id_incidencia DESC";
    }
    

    $result = $conn->query($sql);
    $json = "";
    $i = 1;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if($i == $result->num_rows){
                $json = $json." "."{\"id\": \"$row[id_incidencia]\", \"grupo\": \"$row[grupo]\", \"tipo\": \"$row[tipo]\", \"asunto\": \"$row[asunto]\", \"respuesta\": \"$row[respuesta]\", \"descripcion\": \"$row[descripcion]\", \"estado\": \"$row[estado]\", \"fecha\": \"$row[fecha]\", \"aula\": \"$row[aula]\", \"nombre\": \"$row[nombre]\", \"apellidos\": \"$row[apellidos]\"}";
            }else{
                $json = $json." "."{\"id\": \"$row[id_incidencia]\", \"grupo\": \"$row[grupo]\", \"tipo\": \"$row[tipo]\", \"asunto\": \"$row[asunto]\", \"respuesta\": \"$row[respuesta]\", \"descripcion\": \"$row[descripcion]\", \"estado\": \"$row[estado]\", \"fecha\": \"$row[fecha]\", \"aula\": \"$row[aula]\", \"nombre\": \"$row[nombre]\", \"apellidos\": \"$row[apellidos]\"},";
            }
            $i++;
        }

        echo "[$json]";
    } else {
        echo "[{\"id\": \"nada\"}]";
    }
    $conn->close();
} catch (\Throwable $th) {
    echo "$result  (estado: $estado, tipo: $tipo, asunto: $asunto)";
}

?>