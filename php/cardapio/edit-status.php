<?php
    $aux1 = $_POST["id"];
    $aux = explode("|",$aux1);
    $tabela = $aux[0];
    $id = $aux[1];
    $status = $_POST["status"];

    if($tabela=="tamanho"){
        $idTabela = "idPizza";
    }
    if($tabela=="sabor"){
        $idTabela = "idSabor";
    }
    if($tabela=="bebida"){
        $idTabela = "idBebida";
    }

    

    include "../conexaoBD.php"; 

    $sql = "UPDATE `$tabela` SET `cardapio`= '$status' where `$idTabela` = $id";
    
    $conn->query($sql);
?>