<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Ativar/Inativa Produto</title>
    <!------------------------------------------------| Sweet Alert |------------------------------------------------>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!---------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------------| Campo monetário |------------------------------------------------>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script src="js/money.js"></script>
    <!------------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!------------------------------------------------------------------------------------------------------------------>
    <link rel="stylesheet" href="css/gerencia-cardapio.css">
</head>
<body>
    
    <?php include "php/barra-menu.php"; ?>

    <div class="geral">
        
        <h1> Tamanhos </h1>
        <table class="table">
        <thead>
            <tr>
                <th> Nome</th>
                <th> Valor</th>
                <th> Quantidade de Sabores</th>
                <th> Status</th>
                <th>  </th>
            </tr>
        </thead>
        <tbody>
        <?php
            

            include "php\conexaoBD.php";

            $sql = "SELECT * FROM `tamanho` ORDER BY preco ASC";
            $result = $conn->query($sql);   
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $nome_tamanho = $row["nome"];
                    $preco = str_replace(".",",",$row["preco"]);
                    $idPizza = $row["idPizza"];
                    $statusBD = $row["status"];
                    $qtdeSabor = $row["qtdeSabor"];

                    if($statusBD=="on"){
                        $check = "checked";
                        $status = "Ativo";
                    }
                    else{
                        $check = "";
                        $status = "Inativo";
                    }
                    
                    // |------------------------------------------| Mostrar a tabela com as informações |------------------------------------------------|
                    echo "

                        <tr>
                            <td> $nome_tamanho </td>
                            <td> R$ $preco </td>
                            <td> $qtdeSabor </td>
                            <td>
                                <div class='form-check form-switch'>
                                    <input class='form-check-input' type='checkbox' id='flexSwitchCheckDefault' $check>
                                    <label class='form-check-label' for='flexSwitchCheckDefault'> $status </label>
                                </div>
                            </td>
                            <td style='width:20%'>
                                <button type='button' class='btn btn-warning btr-sm' data-bs-toggle='modal' data-bs-target='#$nome_tamanho'> Editar </button>
                                <button type='submit' class='btn btn-danger btr-sm' onclick='exc_tamanho(this.id)' id='$idPizza'> Excluir </button>
                            </td>
                        </tr>
                    ";
                    // |--------------------------------------------------------------------------------------------------------------------------------|
                    // |-------------------------------| Criar o modal com as repequitivas informações |---------------------------|
                    echo "
                    <div class='modal fade' id='$nome_tamanho' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'> Alterar o tamanho $nome_tamanho </h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>  
                                <form action='alt-tamanho'>
                                    <div class='modal-body'>
                                        <center>
                                            <label> Tamanho </label> <input type='text' name='tamanho' value='$nome_tamanho'> <br>
                                            <label> Valor </label> <input class='money' id='input' size='9' type='text' name='preco' value='$preco'>
                                        </center>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'> Cancelar </button>
                                        <button type='submit' class='btn btn-success'> Confirmar </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    ";
                    // |-----------------------------------------------------------------------------------------------------------|


                }
                echo "<label></label>";
            }

        ?>

        
        </tbody>
        </table>
            <h1>Sabores</h1>    
        <table class="table">
            <thead>
                <tr>
                    <th> Nome</th>
                    <th> Adicional </th>
                    <th> Status</th>
                    <th>  </th>
                </tr>
            </thead>
        <tbody>
        <?php
            

            include "php\conexaoBD.php";

            $sql = "SELECT * FROM `sabor` ORDER BY nome ASC";
            $result = $conn->query($sql);   
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $nome_sabor = $row["nome"];
                    $descricao = $row["descricao"];
                    $disponibilidade = $row["disponibilidade"];
                    $idSabor = $row["idSabor"];
                    $statusBD = $row["status"];
                    $add = $row["precoAdd"];

                    if($statusBD=="on"){
                        $check = "checked";
                        $status = "Ativo";
                    }
                    else{
                        $check = "";
                        $status = "Inativo";
                    }
                    
                    // ----------------------| Mostrar a tabela com as informações |----------------------------
                    echo "

                        <tr>
                            <td> $nome_sabor </td>
                            <td> R$ $add </td>
                            <td>
                                <div class='form-check form-switch'>
                                    <input class='form-check-input' type='checkbox' id='flexSwitchCheckDefault' $check>
                                    <label class='form-check-label' for='flexSwitchCheckDefault'> $status </label>
                                </div>
                            </td>
                            <td style='width:20%'>
                                <button type='button' class='btn btn-warning btr-sm' data-bs-toggle='modal' data-bs-target='#$nome_sabor'> Editar </button>
                                <button type='submit' class='btn btn-danger btr-sm' onclick='exc_sabor(this.id)' id='$idSabor'> Excluir </button>
                            </td>
                        </tr>
                    ";
                    // |-------------------------------| Criar o modal com as repequitivas informações |---------------------------|
                    echo "
                    <div class='modal fade' id='$nome_sabor' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'> Alterar o sabor $nome_sabor </h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>  
                                <form action='alt-sabor'>
                                    <div class='modal-body'>
                                        <center>
                                            <label> Tamanho </label> <input type='text' name='tamanho' value='$nome_sabor'> <br>
                                            <label> Descrição </label> <input type='text' name='tamanho' value='$descricao'> <br>
                                            <label> Disponibilidade </label> <input type='text' name='tamanho' value=''> <br>
                                            <label> Adicional </label> <input class='money' id='input' size='9' type='text' name='preco' value='$add'>
                                        </center>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'> Cancelar </button>
                                        <button type='submit' class='btn btn-success'> Confirmar </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    ";
                    // |-----------------------------------------------------------------------------------------------------------|


                }
                echo "<label></label>";
            }

        ?>

        
        </tbody>
        </table>
    </div>
</body>
</html>

<script src="js/sweet-alert.js"></script>
