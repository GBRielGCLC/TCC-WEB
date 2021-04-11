<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <table>
    <tr>
    <th>Ano 2021</th>
    <th>Faturamento Mensal</th>
    <th>1° Quinzena</th>
    <th>2° Quinzena</th>
    </tr>

<?php
$aux = array(">","<");

    for($i=1; $i <= 12; $i++){
        for($j=0; $j < 2; $j++){
            $sql = "select sum(`valorTotal`) from pedido WHERE extract(MONTH from `dataPedido`) = $i AND extract(DAY from `dataPedido`) $aux[$j] =15";
            }
        }

?>
    <tr>
    
    </tr>

    </table>



</body>
</html>