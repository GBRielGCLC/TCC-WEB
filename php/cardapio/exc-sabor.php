<?php
$idSabor = $_GET["idSabor"];

include "../conexaoBD.php";

$sql = "DELETE FROM `sabor` WHERE idSabor=$idSabor";
$result = $conn->query($sql);

header("Location: ../../gerencia-cardapio.php");
