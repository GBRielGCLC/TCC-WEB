<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title> Gerenciar Cardápio </title>
    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!------------------------------------------------------------------------------------------------------------------>
    <!------------------------------------------------| Data Table |------------------------------------------------>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="js/dataTable.js"></script>
    <!-------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------------| Sweet Alert |------------------------------------------------>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweet-alert.js"></script>
    <!---------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------------| Campo monetário |------------------------------------------------>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script src="js/money.js"></script>
    <!------------------------------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="css/gerencia-cardapio.css">
</head>
<body>
    
    <?php include "php/barra-menu.php"; ?>
    
    <div class="geral">
        <div class="tabelas">

            <h1> Tamanhos de Pizzas</h1>
            <!------------------------------------------------| Início da table tamanho |------------------------------------------------>
            <table class="tabela">
                <a id="tamanho"></a>
                <thead>
                    <tr>
                        <th class="col-3"> Descrição </th>
                        <th class="col-1"> Valor</th>
                        <th class="col-2"> Quantidade de Sabores</th>
                        <th class="col-2"> Cardápio </th>
                        <th class="col-3">  </th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    include "php\conexaoBD.php";

                    $sql = "SELECT * FROM `tamanho` WHERE `status` = 'on' ORDER BY preco ASC";
                    $result = $conn->query($sql);   
                    $i=0;
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $tamanho = $row["nome"];
                            //$preco = str_replace(".",",",$row["preco"]);
                            $preco = $row["preco"];
                            $idPizza = $row["idPizza"];
                            $cardapioBD = $row["cardapio"];
                            $qtdeSabor = $row["qtdeSabor"];
                            $status = $row["status"];
                            
                            if(isset($tamanho)){
                                $tamanhos[$i] = $tamanho;
                                $Pizzas[$i] = $idPizza;
                                $i++;
                                $auxi=$i;       
                            }
                            if($cardapioBD=="on"){
                                $check = "checked";
                                $cardapio = "Visível";
                            }
                            else{
                                $check = "";
                                $cardapio = "Oculto";
                            }

                            //////////////// testte para verificar se foi excluido /////////////////
                            
                            //Transformando em REAL BRASILEIRO
                            $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                            $brl = $formatter->formatCurrency($preco, 'BRL');
                            
                            // |------------------------------------------| Mostrar a tabela com as informações |------------------------------------------------|
                            echo "

                                <tr>
                                    <td style='text-align: left';> $tamanho </td>
                                    <td class='preco'> $brl </td>
                                    <td> $qtdeSabor </td>
                                    <td>
                                        <div class='form-check form-switch'>
                                            <label class='form-check-label'>
                                                <input class='form-check-input' type='checkbox' id='tamanho|$idPizza' $check>
                                                <span> $cardapio  </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td style='width:20%'>
                                        <button type='button' class='btn btn-warning btr-sm' data-bs-toggle='modal' data-bs-target='#m$idPizza'> Alterar </button>
                                        <button type='submit' class='btn btn-danger btr-sm' onclick='exc_tamanho(this.id)' id='$idPizza'> Desativar </button>
                                    </td>
                                </tr>
                            ";
                            // |--------------------------------------------------------------------------------------------------------------------------------|
                            // |-------------------------------| Criar o modal com as repequitivas informações |---------------------------|
                            echo "
                            <div class='modal fade' id='m$idPizza' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabel'> Alterar o tamanho $tamanho </h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>  
                                        <form action='php/cardapio/edit-tamanho?idPizza=$idPizza' method='POST'>
                                            <div class='modal-body'>

                                                <label> Descrição </label> <br> <input type='text' name='tamanho' value='$tamanho'> <br>
                                                <label> Valor </label> <br> <input class='money' id='input' size='9' type='text' name='preco' value='$brl'> <br>
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


                        
                    }}
                ?>
                
                </tbody>
            </table>
            <!--------------------------------------------------| Fim da table tamanho |-------------------------------------------------->
        </div>
    </div>
    <div class="geral" style="margin-top:2%">
        <div class="tabelas">
            <!----------------------------------->
            <h1>Sabores de Pizzas</h1>    
            <!--------------------------------------------------| Início da table sabor |-------------------------------------------------->
            <a id="sabor"></a>
            <table class="tabela">
                <thead>
                    <tr>
                        <th> Nome</th>
                        <th> Adicional </th>
                        <th> Descrição </th>
                        <th> Cardápio </th>
                        <th>  </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        

                        include "php\conexaoBD.php";

                        $sql = "SELECT * FROM `sabor` WHERE `status` = 'on' ORDER BY nome ASC";
                        $result = $conn->query($sql);   
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $nome_sabor = $row["nome"];
                                $descricao = $row["descricao"];
                                $disponibilidade = $row["disponibilidade"];
                                $idSabor = $row["idSabor"];
                                $cardapioBD = $row["cardapio"];
                                $add = $row["precoAdd"];
                                $status = $row["status"];
                                
                                if($cardapioBD=="on"){
                                    $check = "checked";
                                    $cardapio = "Visível";
                                }
                                else{
                                    $check = "";
                                    $cardapio = "Oculto";
                                }

                                
                                $dispo = explode(",", $disponibilidade);
                                //Transformando em REAL BRASILEIRO
                                
                                $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                                $brl = $formatter->formatCurrency($add, 'BRL');

                                
                                // ----------------------| Mostrar a tabela com as informações |----------------------------
                                echo "

                                    <tr>
                                        <td style='text-align: left';> $nome_sabor </td>
                                        <td class3='preco'> $brl </td>
                                        <td> $descricao </td>
                                        <td>
                                            <div class='form-check form-switch'>
                                                <label class='form-check-label'>    
                                                    <input class='form-check-input' type='checkbox' id='sabor|$idSabor' $check>
                                                    <span> $cardapio </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td style='width:20%'>
                                            <button type='button' class='btn btn-warning btr-sm' data-bs-toggle='modal' data-bs-target='#m$idSabor'> Alterar </button>
                                            <button type='submit' class='btn btn-danger btr-sm' onclick='exc_sabor(this.id)' id='$idSabor'> Desativar </button>
                                        </td>
                                    </tr>
                                ";
                                echo "
                                <div class='modal fade' id='m$idSabor' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'> Alterar o sabor $nome_sabor </h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>  
                                            <form action='php/cardapio/edit-sabor?idSabor=$idSabor' method='POST'>
                                                <div class='modal-body'>
                                                    <center>
                                                        <label> Nome </label> <br> <input type='text' name='nome' value='$nome_sabor'> <br>
                                                        <label> Descrição </label> <br> <input type='text' name='descricao' size='45' value='$descricao'> <br>
                                                        <label> Adicional </label> <br> <input class='money' id='input' size='5' type='text' name='add' value='$brl'> <br>";

                                                    /*   
                                                    
                                                        for ($i=0; $i < $auxi; $i++){
                                                        
                                                            
                                                            for ($j=0; $j < $auxi; $j++) { 
                                                            
                                                                if($dispo[$i]==$idPizza[$j]){
                                                                    $check = "checked";
                                                                    break;
                                                                }else{
                                                                    $check = "";
                                                                    
                                                                }
                                                            }
                                                            echo "<label> $tamanhos[$i] </label> <input type='checkbox' name='tamanho[]' $check value='$Pizzas[$i]'>";
                                                        }   
                                                        

                                                        */
                                                        echo" 
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
        </div>
    </div>
    <div class="geral" style="margin-top:2%;">
        <div class="tabelas">
            <h1> Bebidas </h1>
            <!--------------------------------------------------| Início da table bebida |-------------------------------------------------->
            <table class="tabela">
                <a id="bebida"></a>
                <thead>
                    <tr>
                        <th class="col-2"> Descrição </th>
                        <th class="col-1"> Valor </th>
                        <th class="col-2"> Cardápio </th>
                        <th class="col-3">  </th>
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
                            $cardapioBD = $row["cardapio"];
                            $status = $row["status"];

                            if($cardapioBD=="on"){
                                $check = "checked";
                                $cardapio = "Visível";
                            }
                            else{
                                $check = "";
                                $cardapio = "Oculto";
                            }
                            if($status=="on"){
                            //Transformando em REAL BRASILEIRO
                            $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                            $brl = $formatter->formatCurrency($preco, 'BRL');
                            
                            
                            // ----------------------| Mostrar a tabela com as informações |----------------------------
                            echo "  
                                <tr>
                                    <td style='text-align: left;'> $nome_bebida </td>
                                    <td class='preco'> $brl </td>
                                    <td>
                                        <div style='align-items: center;' class='form-check form-switch'>
                                            <label class='form-check-label'>    
                                                <input class='form-check-input' type='checkbox' id='bebida|$idBebida' $check>
                                                <span> $cardapio </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td style='width:20%'>
                                        <button type='button' class='btn btn-warning btr-sm' data-bs-toggle='modal' data-bs-target='#m$idBebida'> Alterar </button>
                                        <button type='submit' class='btn btn-danger btr-sm' onclick='exc_bebida(this.id)' id='$idBebida'> Desativar </button>
                                    </td>
                                </tr>
                            ";
                            // |-------------------------------| Criar o modal com as repequitivas informações |---------------------------|
                            echo "
                            <div class='modal fade' id='m$idBebida' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabel'> Alterar a bebida $nome_bebida </h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>  
                                        <form action='php/cardapio/edit-bebida?idBebida=$idBebida' method='POST'>   
                                            <div class='modal-body'>
                                                <center>
                                                    <label> Descrição </label> <br> <input type='text' name='nome_bebida' value='$nome_bebida'> <br>
                                                    <label> Valor </label> <br> <input class='money' id='input' size='9' type='text' name='preco' value='$brl'><br>
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
                    }}

                ?>
                
                </tbody>
            </table>
            <!----------------------------------------------------| Fim da table bebida |---------------------------------------------------->
            
        </div>
    </div>
     <?php
        if(isset($_SESSION["edit"])){
            if($_SESSION["edit"]=="sucesso"){
                echo"
                <script>
                Swal.fire(
                    'Alterado com sucesso!',
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
                    'Desativado com sucesso!', 
                    '',
                    'success',
                )
                </script>
                ";
            }
            unset($_SESSION["exc"]);
        }
    ?>   

    <footer> <?php include "rodape.html"; ?> </footer>
</body>
</html>

<script>
$(document).ready(function(){
    $('table').on('change', ':checkbox', function() {
        var id = this.id;
        var status;
        if(this.checked==true){
            $(this).next('span').text("Visível");
            status = "on";
        }
        else{
            $(this).next('span').text("Oculto");
            status = "off";
        }
        $.ajax({
            type: "POST",
            url: "php/cardapio/edit-status.php",
            data: {id:id, status:status},
        })
    });

});
</script>