<?php
    session_start();
    if(empty($_POST["sabor"]) || empty($_POST["desc"])){// Verificar se o campo está vazio
        $_SESSION["cad-sabor"] = "vazio";

    }
    else{
        $nome = $_POST["sabor"];
        $desc = $_POST["desc"];
        if(empty($_POST["add"])){
            $add=0;  
        }
        else{
            $add = str_replace(",",".",$_POST["add"]);
        }
        if(isset($_POST["tamanho"])){
        foreach ($_POST["tamanho"] as $tamanho) {
            $tam = $tam.",".$tamanho;
        }}

        include "../conexaoBD.php";
        $sql = "SELECT * FROM `sabor` WHERE `nome` = '$nome'";
        echo$sql;
        if (mysqli_query($conn, $sql)) {
            $_SESSION["cad-sabor"] = "duplicado";

        } else {

        $sql = "INSERT INTO sabor(nome,descricao,status,disponibilidade,precoAdd) VALUES('$nome','$desc','on','$tam','$add')";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION["cad-sabor"] = "sucesso";

        }
        $conn->close();
        
    }}
    header("Location: ../../cadastro-cardapio.php#cad-sabor");
?>