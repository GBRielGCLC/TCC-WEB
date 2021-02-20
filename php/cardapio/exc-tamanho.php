<?php
$idPizza = $_GET["idPizza"];

include "../conexaoBD.php";

$sql = "DELETE FROM `tamanho` WHERE idPizza=$idPizza";
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["exc"] = "sucesso";
}
$conn->close();

header("Location: ../../gerencia-cardapio.php");
