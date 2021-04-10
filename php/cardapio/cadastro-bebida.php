<?php
    session_start();
    if(empty($_POST["nomeBebida"]) || empty($_POST["preco"])){// Verificar se o campo está vazio
        $_SESSION["cad-bebida"] = "vazio";
    }
    else{
        $nome = $_POST["nomeBebida"];
        $preco = str_replace(".","",$_POST["preco"]);
        $preco = str_replace(",",".",$preco);

        include "../conexaoBD.php"; 

        $sql="SELECT * FROM `bebida` WHERE `nome` = '$nome'";
        $result = $conn->query($sql);   
        if ($result->num_rows > 0) {
            $_SESSION["cad-bebida"] = "duplicado";
            
        } else {

        $sql = "INSERT INTO `bebida`(`nome`, `preco`,`status`) VALUES ('$nome',$preco,'on')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION["cad-bebida"] = "sucesso";
            
        }
    
        
        $conn->close();
    }}

   header("Location: ../../cadastro-cardapio.php#cad-bebida");
?>