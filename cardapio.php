<html lang="pt-br">
<head>
    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!------------------------------------------------------------  ------------------------------------------------------>
    <!-------------------------------------------------------- Fonte --------------------------------------------------------------->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@1,300&display=swap" rel="stylesheet">
    <!------------------------------------------------------------------------------------------------------------------------------>
    <link rel="stylesheet" type="text/css" href="css/cardapio.css">
</head>
<body>
              <?php include "php/barra-menu.php"; ?>    
              
        
           <div class="container">
              <h1>Tamanhos</h1>
                <?php
                    
                    include "php\conexaoBD.php";

                    $sql = "SELECT * FROM `tamanho` WHERE status='on'";
                    
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $nome_tamanho = $row["nome"];
                            $preco = str_replace(".",",",$row["preco"]);
                            $qtdeSabor = $row["qtdeSabor"];
                            $idPizza = $row["idPizza"];
                            $statusBD = $row["status"];

                            echo"
                            <div class='tamanhos'><img class='img' src='imagens/logo2.png' >
                            
                                <h3>$nome_tamanho</h3>

                                <table>
                                    <thead>
                                        <tr>
                                            <th class='col-2'> Valor</th>
                                            <th class='col-3'> Quantidade de Fatias </th>
                                            <th class='col-3'> Quantidade de Sabores </th>
                                        </tr>
                                        </thead>           
                                        
                                        <tbody>
                                        <tr>
                                            <td>$preco</td>
                                            <td>0</td>
                                            <td>$qtdeSabor</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            ";  
                        }
                    } /* ------------------ FIM DO TAMANHO ---------------------*/


                    
                ?>
                
            <div>   

</body>
</html>

