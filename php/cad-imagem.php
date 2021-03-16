<?php
//$_FILES["img1"] = $_FILES["img1"]["tmp_name"];

if(isset($_FILES["img1"]["tmp_name"])){

$img1 = $_FILES["img1"]["tmp_name"];

if(isset($img1)){
    include("conexaoBD.php");

    $sql = "INSERT INTO `imagem`(`imagens`) VALUES (LOAD_FILE('imagens/marcacareca.png'))";
    $result = $conn->query($sql);   
    if ($result->num_rows > 0) {
  
        echo"aaaaaaaaaaaaaaaaaaaaa";

    }
}
}
/*
*/
?>