<?php
$idBebida = $_GET["idBebida"];

include "../conexaoBD.php";

$sql = "UPDATE `bebida` SET `status`='off' WHERE `idBebida` = $idBebida";

$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["exc"] = "sucesso";
}
$conn->close();

header("Location: ../../gerencia-cardapio.php#bebida");

