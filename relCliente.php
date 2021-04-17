<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>

    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!----------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------------| Data Table |------------------------------------------------>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="js/dataTable.js"></script>
    <!-------------------------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="css/relatorios.css">


    <style>
        th{
            text-align: center;
            background-color: #4caf50;
            color: white;
        }
        td{
            text-align: center;
        }

        th, td{
            padding: 5px;
        }
            
        tr:nth-child(even){
            background-color: #f2f2f2;
        }
        tr:nth-child(odd){
            background-color: white;
        }
         
        tr:hover{
            background-color: #d1cccc;
        }

    </style>
</head>
<body>
    
        <?php include "php/barra-menu.php" ?>

        <div class="principal">
            <div class="cabecalho">
                
                <h1>Relatórios</h1>
                <a href="relVendas.php"> <button class="vendas"> Vendas por mês </button> </a>        
                <a href="relCliente.php"> <button> Pedido por cliente </button> </a>
                <button class="itens"> Itens mais vendidos </button>       
            
            </div>
            
            <div class="corpo">
                <!--<button class="btnPDF"> <a href="Relatórios tcc (1).pdf" target="_blank"> Gerar PDF </a> </button>-->
                
            <div class="conteudo">
                <table border=1px style='width:100%'>
                    <tr>
                        <th>Cliente</th>
                        <th>Valor do Pedido</th>
                        <th>Data último Pedido</th>
                    
                    </tr>

                        <?php
                            include "php\conexaoBD.php";
                            $sql = "SELECT * FROM `cliente`,`pedido` WHERE cliente.`idCliente`= pedido.`idCliente`";
                        
                            $result = $conn->query($sql); 
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $nome = $row["nome"];
                                    $valorTotal = $row["valorTotal"];
                                    $data = date_create($row["dataPedido"]);
                                    $dataPedido = date_format($data, 'd/m/Y');
                                    
                                    $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                                    $brl = $formatter->formatCurrency($valorTotal, 'BRL');
                            ?>      
                                    <tr>
                                    <td> <?= $nome ?> </td>
                                    <td> <?= $brl ?> </td>
                                    <td> <?= $dataPedido ?> </td>
                                    </tr>
                            
                            
                            <?php    }
                            }
                        ?>

                </table>
            </div>
        </div>

</body>
</html>