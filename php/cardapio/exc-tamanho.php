<?php
$idPizza = $_GET["idPizza"];

include "../conexaoBD.php";

$sql = "UPDATE `tamanho` SET `status`='off' WHERE `idPizza`=$idPizza";
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["exc"] = "sucesso";
}
$conn->close();

header("Location: ../../gerencia-cardapio.php#tamanho");
