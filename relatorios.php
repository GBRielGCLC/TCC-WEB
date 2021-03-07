fas fa-bars<!DOCTYPE html>
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

</head>
<body>
    
        <?php include "php/barra-menu.php" ?>

        <div class="cabecalho">
            
            <h1>Relatórios</h1>
            <button class="vendas"> Vendas </button>        
            <button> Clientes </button>        
            <button class="itens"> Itens </button>        
        
        </div>
        
        <div class="corpo">

            <select class='form-select' style="width:15%;" name="" id="">
                <option value="">Nenhum</option>
            </select>
        <div class="conteudo">
        Nenhum Dado Encontrado
        </div>
        </div>


</body>
</html>