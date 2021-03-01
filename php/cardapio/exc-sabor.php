<?php
$idSabor = $_GET["idSabor"];

include "../conexaoBD.php";

$sql = "UPDATE `sabor` SET `status`='off' WHERE `idSabor`=$idSabor";
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["exc"] = "sucesso";
}
$conn->close();

header("Location: ../../gerencia-cardapio.php#sabor");
