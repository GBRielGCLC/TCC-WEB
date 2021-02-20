<?php
$idBebida = $_GET["idBebida"];

include "../conexaoBD.php";

$sql = "DELETE FROM `bebida` WHERE idBebida=$idBebida";
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["exc"] = "sucesso";
}
$conn->close();

header("Location: ../../gerencia-cardapio.php");

