<?php

session_start();
if($_POST["login"]=="a@gmail.com" && $_POST["senha"]=="0"){
    $_SESSION["logou"] = 1;
    header("Location: ../index.php");
}
else{
    $_SESSION["logou"] = 2;
    header("Location: ../login_area.php");
}
