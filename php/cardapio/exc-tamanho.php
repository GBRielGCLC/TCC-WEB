<?php
$idPizza = $_GET["idPizza"];
echo $idPizza;

include "../conexaoBD.php";

$sql = "DELETE FROM `tamanho` WHERE idPizza=$idPizza";
$result = $conn->query($sql);

header("Location: ../../gerencia-cardapio.php");
