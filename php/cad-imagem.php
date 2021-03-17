<?php

if(isset($_FILES["img1"])){
    $extensao = strtolower(substr($_FILES['img1']['name'], -4)); //Pega extensão do arquivo
    $nome = "img1".$extensao;
    $diretorio = "../imagens/"; //Define o diretorio para onde enviaremos o arquivo

    move_uploaded_file($_FILES['img1']['tmp_name'], $diretorio.$nome); //Efetua o upload
}
if(isset($_FILES["img2"])){
    $extensao = strtolower(substr($_FILES['img2']['name'], -4)); //Pega extensão do arquivo
    $nome = "img2".$extensao;
    $diretorio = "../imagens/"; //Define o diretorio para onde enviaremos o arquivo

    move_uploaded_file($_FILES['img2']['tmp_name'], $diretorio.$nome); //Efetua o upload
}
if(isset($_FILES["img3"])){
    $extensao = strtolower(substr($_FILES['img3']['name'], -4)); //Pega extensão do arquivo
    $nome = "img3".$extensao;
    $diretorio = "../imagens/"; //Define o diretorio para onde enviaremos o arquivo

    move_uploaded_file($_FILES['img3']['tmp_name'], $diretorio.$nome); //Efetua o upload
}

header("location: ../index.php")



?>