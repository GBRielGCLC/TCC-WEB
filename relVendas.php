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

<?php/*
$aux = array(">","<");
    include "php\conexaoBD.php";
    ?>
    
    <?php
    $var1=0;
        for($i=1; $i <= 12; $i++){
        for($j=0; $j < 2; $j++){
            $var1++;
            $sql = "select sum(`valorTotal`) from pedido WHERE extract(MONTH from `dataPedido`) = $i AND extract(DAY from `dataPedido`) $aux[$j]=15";
        
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   
                    $quizena = $row["sum(`valorTotal`)"];
                
                    if($var1%3==0){
                        echo"<tr>"; 
                    }

                    if($quizena == NULL){
                        echo" <td> 0 </td>";    
                    }else{
                    echo" <td> $quizena </td>";
                }

                if($var1%3==0){
                    echo"</tr>"; 
                }
          
                        }
                    }
                }
            }

*/?>

    </table>

    

</body>
</html>