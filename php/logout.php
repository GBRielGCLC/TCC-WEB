<?php
    session_start();
    unset($_SESSION["logou"]);
    header("Location: ../index.php");
?>