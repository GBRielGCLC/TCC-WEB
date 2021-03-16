<?php

if(isset($_FILES["img1"])){
    $extensao = strtolower(substr($_FILES['img1']['name'], -4)); //Pega extensão do arquivo
    $img1 = "img1".$extensao;
    echo $img1;
    $diretorio = "../imagens/"; //Define o diretorio para onde enviaremos o arquivo

    move_uploaded_file($_FILES['img1']['tmp_name'], $diretorio.$img1); //Efetua o upload
    //$img1 = "'" . $img1 . "'";
} else {
    $img1= null;
}



?>