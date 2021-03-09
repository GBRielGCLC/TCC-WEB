<?php

header("Content-Type: application/json");
$status = $_POST["status"];

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "test";
$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conn) {
    echo ("Conexão falhou: " . mysqli_connect_error());
}


$sql = "UPDATE `test` SET `status`= '$status' where `id` = 1";
echo $sql;
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    echo json_encode('Deu certo poraaaaaa!');
}
else{
    echo json_encode('n deu certo');
}
$conn->close();

/*-------------------------------------------------------------*//*
<?php
$connect = new PDO("mysql:host=localhost;dbname=tutorial", "root", "");

$data = [
	'nome' => $_POST["nome"],
	'fone' => $_POST["fone"],
	'cidade' => $_POST["cidade"],
];

$stmt = $connect->prepare('INSERT INTO tb_name (nome, telefone, cidade) values (:nome, :fone, :cidade)');

try{
	$connect->beginTransaction();
	$stmt->execute($data);
	$connect->commit();
	echo 'Registro salvo com sucesso';
}catch (Exception $e) {
	$connect->rollback();
	throw $e;
}*/
