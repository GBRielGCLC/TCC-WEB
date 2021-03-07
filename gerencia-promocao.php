<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
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
    <link rel="stylesheet" href="css/gerencia-promocao.css">
</head>
<?php include "php/barra-menu.php" ?>
<body>
    <div class="geral">
        <h1> Promoções Cadastradas</h1>
        <div id="tabela">
            <table class="tabela">
                <thead>
                    <tr>
                        <th> Nome da promoção </th>
                        <th> Tamanho </th>
                        <th> Sabor </th>
                        <th> Bebida </th>
                        <th> Valor do Desconto</th>
                        <th>  </th>
                    </tr>
                </thead>

                <tbody>
                    <tr> 
                        <td> Pizza Grande + refrigerante </td>
                        <td> Grande </td>
                        <td> Calabresa, Frango Catupiry </td>
                        <td> coca cola 1l </td>
                        <td> R$ 10,00 </td>
                        <td>
                            <button class='btn btn-warning btr-sm'> Alterar </button>
                            <button class="btn btn-danger btr-sm"> Excluir </button> 
                        </td> 
                    </tr>

                    <tr>
                        <td> Pizza 1 sabor + refrigerante </td>
                        <td> Pequena, Média </td>
                        <td> Calabresa, Frango Catupiry, Marguerita</td>
                        <td> Nenhuma </td>
                        <td> R$ 5,00 </td>
                        <td>
                            <button class='btn btn-warning btr-sm'> Alterar </button>
                            <button class="btn btn-danger btr-sm"> Excluir </button> 
                        </td> 
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <footer> <?php include "rodape.html"; ?> </footer>
</body>
</html>