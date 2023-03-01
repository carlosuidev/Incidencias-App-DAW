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
    $imgTamanyo = $_FILES["imgperfil"]['size'];
    $imgSubir = fopen($_FILES["imgperfil"]['tmp_name'], 'r');
    $image = $_FILES['imgperfil']['tmp_name']; 
    $imgContent = addslashes(file_get_contents($image)); 
    
    if($imgTamanyo <= 10485760){
        $upd = "UPDATE profesores SET img_perfil='$imgContent' WHERE id_profesor=$idProfesor";
        if ($conn->query($upd) === TRUE) {
            header('Location: ../perfil.php');
        }else{
            header('Location: ../index.php');
        }
    }else{
        header('Location: ../index.php');
    }
    
} catch (\Throwable $th) {
    echo $th;
}

?>
