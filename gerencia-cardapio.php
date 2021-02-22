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
        
        <h1>Sabores</h1>    
        <!--------------------------------------------------| Início da table sabor |-------------------------------------------------->
        <table class="table">
            <a id="sabor"></a>
            <thead>
                <tr>
                    <th> Nome</th>
                    <th> Adicional </th>
                    <th> Descrição </th>
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

                        
                        $dispo = explode(",", $disponibilidade);
                        
                        
                        // ----------------------| Mostrar a tabela com as informações |----------------------------
                        echo "

                            <tr>
                                <td> $nome_sabor </td>
                                <td> R$ $add </td>
                                <td> $descricao </td>
                                <td>
                                    <div class='form-check form-switch'>
                                        <input class='form-check-input' type='checkbox' id='flexSwitchCheckDefault' $check>
                                        <label class='form-check-label' for='flexSwitchCheckDefault'> $status </label>
                                    </div>
                                </td>
                                <td style='width:20%'>
                                    <button type='button' class='btn btn-warning btr-sm' data-bs-toggle='modal' data-bs-target='#s$idSabor'> Editar </button>
                                    <button type='submit' class='btn btn-danger btr-sm' onclick='exc_sabor(this.id)' id='$idSabor'> Excluir </button>
                                </td>
                            </tr>
                        ";
                        echo "
                        <div class='modal fade' id='s$idSabor' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'> Editar o sabor $nome_sabor </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>  
                                    <form action='php/cardapio/edit-sabor?idSabor=$idSabor' method='POST'>
                                        <div class='modal-body'>
                                            <center>
                                                <label> Tamanho </label> <br> <input type='text' name='nome' value='$nome_sabor'> <br>
                                                <label> Descrição </label> <br> <input type='text' name='descricao' size='45' value='$descricao'> <br>
                                                <label> Adicional </label> <br> <input class='money' id='input' size='5' type='text' name='add' value='$add'> <br>
                                                
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
                }

            ?>
            
            </tbody>
        </table>
        <!----------------------------------------------------| Fim da table sabor |---------------------------------------------------->
                
        <h1> Tamanhos </h1>
        <!------------------------------------------------| Início da table tamanho |------------------------------------------------>
        <table class="table">
            <a id="tamanho"></a>
            <thead>
                <tr>
                    <th class="col"> Nome</th>
                    <th class="col"> Valor</th>
                    <th class="col"> Quantidade de Sabores</th>
                    <th class="col"> Status</th>
                    <th class="col">  </th>
                </tr>
            </thead>
            <tbody>
            <?php

                include "php\conexaoBD.php";

                $sql = "SELECT * FROM `tamanho` ORDER BY preco ASC";
                $result = $conn->query($sql);   
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $tamanho = $row["nome"];
                        $preco = str_replace(".",",",$row["preco"]);
                        $idPizza = $row["idPizza"];
                        $statusBD = $row["status"];
                        $qtdeSabor = $row["qtdeSabor"];
                        /* ajeitar
                        if(isset($tamanho)){
                            $tamanho[$i] = $tamanho;
                            $Pizza[$i] = $idPizza;
                            
                        }*/
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
                                <td> $tamanho </td>
                                <td> R$ $preco </td>
                                <td> $qtdeSabor </td>
                                <td>
                                    <div class='form-check form-switch'>
                                        <input class='form-check-input' type='checkbox' id='flexSwitchCheckDefault' $check>
                                        <label class='form-check-label' for='flexSwitchCheckDefault'> $status </label>
                                    </div>
                                </td>
                                <td style='width:20%'>
                                    <button type='button' class='btn btn-warning btr-sm' data-bs-toggle='modal' data-bs-target='#t$idPizza'> Editar </button>
                                    <button type='submit' class='btn btn-danger btr-sm' onclick='exc_tamanho(this.id)' id='$idPizza'> Excluir </button>
                                </td>
                            </tr>
                        ";
                        // |--------------------------------------------------------------------------------------------------------------------------------|
                        // |-------------------------------| Criar o modal com as repequitivas informações |---------------------------|
                        echo "
                        <div class='modal fade' id='t$idPizza' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'> Editar o tamanho $tamanho </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>  
                                    <form action='php/cardapio/edit-tamanho?idPizza=$idPizza' method='POST'>
                                        <div class='modal-body'>

                                            <label> Tamanho </label> <br> <input type='text' name='tamanho' value='$tamanho'> <br>
                                            <label> Valor </label> <br> <input class='money' id='input' size='9' type='text' name='preco' value='$preco'> <br>
                                            <label> Quantidade de sabores </label> <br> <input type='number' name='qtdeSabor' value='$qtdeSabor' min='1' max='6'> <br>

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
                }
            ?>
            
            </tbody>
        </table>
        <!--------------------------------------------------| Fim da table tamanho |-------------------------------------------------->
            
        <h1> Bebidas </h1>
        <!--------------------------------------------------| Início da table bebida |-------------------------------------------------->
        <table class="table">
            <a id="bebida"></a>
            <thead>
                <tr>
                    <th> Nome</th>
                    <th> Valor </th>
                    <th> Status</th>
                    <th>  </th>
                </tr>
            </thead>
            <tbody>
            <?php
                

                include "php\conexaoBD.php";

                $sql = "SELECT * FROM `bebida` ORDER BY nome ASC";
                $result = $conn->query($sql);   
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $nome_bebida = $row["nome"];
                        $preco = $row["preco"];
                        $idBebida = $row["idBebida"];
                        $statusBD = $row["status"];

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
                                <td> $nome_bebida </td>
                                <td> R$ $preco </td>
                                <td>
                                    <div class='form-check form-switch'>
                                        <input class='form-check-input' type='checkbox' id='flexSwitchCheckDefault' $check>
                                        <label class='form-check-label' for='flexSwitchCheckDefault'> $status </label>
                                    </div>
                                </td>
                                <td style='width:20%'>
                                    <button type='button' class='btn btn-warning btr-sm' data-bs-toggle='modal' data-bs-target='#b$idBebida'> Editar </button>
                                    <button type='submit' class='btn btn-danger btr-sm' onclick='exc_bebida(this.id)' id='$idBebida'> Excluir </button>
                                </td>
                            </tr>
                        ";
                        // |-------------------------------| Criar o modal com as repequitivas informações |---------------------------|
                        echo "
                        <div class='modal fade' id='b$idBebida' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'> Editar a bebida $nome_bebida </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>  
                                    <form action='php/cardapio/edit-bebida?idBebida=$idBebida' method='POST'>   
                                        <div class='modal-body'>
                                            <center>
                                                <label> Nome </label> <br> <input type='text' name='nome_bebida' value='$nome_bebida'> <br>
                                                <label> Valor </label> <br> <input class='money' id='input' size='9' type='text' name='preco' value='$preco'><br>
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
                }

            ?>
            
            </tbody>
        </table>
        <!----------------------------------------------------| Fim da table bebida |---------------------------------------------------->

        <?php
            if(isset($_SESSION["edit"])){
                if($_SESSION["edit"]=="sucesso"){
                    echo"
                    <script>
                    Swal.fire(
                        'Alterado com sucesso',
                        '',
                        'success'
                    )
                    </script>
                    ";
                    
                }
                unset($_SESSION["edit"]);
            }
            if (isset($_SESSION["exc"])) {
                if ($_SESSION["exc"]=="sucesso") {
                    echo"
                    <script>
                    Swal.fire(
                        'Excluido!', 
                        '',
                        'success',
                    )
                    </script>
                    ";
                }
                unset($_SESSION["exc"]);
            }
        ?>
    </div>
</body>
</html>

<script src="js/sweet-alert.js"></script>
