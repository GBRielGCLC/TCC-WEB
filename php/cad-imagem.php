<?php


    $extensao_carteiravac = strtolower(substr($_FILES['img1']['name'], -4)); //Pega extensão do arquivo
    $nova_carteiravac = md5(time()) . $extensao_carteiravac; //Define o nome do arquivo
    $diretorio = "imagens/"; //Define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['img1']['tmp_name'], $diretorio.$nova_carteiravac); //Efetua o upload
    $nova_carteiravac = "'" . $nova_carteiravac . "'";
    echo "aaaaaaaaaaaaa";


?>