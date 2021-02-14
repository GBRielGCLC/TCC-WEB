<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Ativar/Inativa Produto</title>

    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!----------------------------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="css/status.css">
</head>
<body>
    <?php include "php/barra-menu.php"; ?>

    <div class="geral">
        
        <table class="table">
        <thead>
            <tr>
                <th> Nome</th>
                <th> Valor R$</th>
                <th> Status</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include "php\conexaoBD.php";

            $sql = "SELECT nome,preco,idPizza,status FROM `tamanho` ORDER BY preco ASC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $nome_tamanho = $row["nome"];
                    $preco = str_replace(".",",",$row["preco"]);
                    $idPizza = $row["idPizza"];
                    $status = $row["status"];

                    if($status=="on"){
                        $check = "checked";
                    }
                    else{
                        $check = "";
                    }
            
                    echo "
                        <tr>
                            <td> $nome_tamanho </td>
                            <td> R$ $preco </td>
                            <td>
                                <div class='form-check form-switch'>
                                    <input class='form-check-input' type='checkbox' id='flexSwitchCheckDefault' $check>
                                    <label class='form-check-label' for='flexSwitchCheckDefault'> Ativo ou inativo </label>
                                </div>
                            </td>
                        </tr>
                    ";
                }
                echo "<label></label>";
            }

        ?>

        </tbody>
        </table>

    
        
        
        



    </div>

</body>
</html>