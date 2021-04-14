<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table class="table table-bordered">
    <tr>
    <th>Cliente</th>
    <th>Valor do Pedido</th>
    <th>Ultimo Pedido</th>
    
    </tr>

        <?php
            include "php\conexaoBD.php";
            $sql = "SELECT * FROM `cliente`,`pedido` WHERE cliente.`idCliente`= pedido.`idCliente`";
        
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>      
              <tr>
              <td> <?= $row["nome"] ?> </td>
              <td> <?= $row["valorTotal"] ?> </td>
              <td> <?= $row["dataPedido"] ?> </td>
              </tr>
            
            
            <?php    }
            }
        ?>


</table>

</body>
</html>