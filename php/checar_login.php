<?php

session_start();

    include("conexaoBD.php");
    $login=$_POST["login"];
    $senha=$_POST["senha"];
    $sql = "SELECT `idPerfil`, `nome`, `e-mail`, `senha`, `adm` FROM `perfil` WHERE `e-mail`='$login' and `senha`='$senha'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $email = $row["e-mail"];
        $senha = $row["senha"];
        $adm = $row["adm"];

        $_SESSION["logou"] = 1;
        header("Location: ../index.php");

    }else{
        $_SESSION["logou"] = 2;
        header("Location: ../login_area.php");
    }

/*
    if($_POST["login"]==$email && $_POST["senha"]==$senha){
        $_SESSION["logou"] = 1;
        header("Location: ../index.php");
    }
    else{
        $_SESSION["logou"] = 2;
        //header("Location: ../login_area.php");
    }
*/