<?php
$idPerfil = $_GET["idPerfil"];

include "../conexaoBD.php";

$sql = "DELETE FROM `perfil` WHERE `idPerfil` = $idPerfil";
echo $sql;
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["exc"] = "sucesso";
}
$conn->close();

header("Location: ../../excluir-atendente.php");
