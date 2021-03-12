<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Fazer Pedido </title>
    
    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!----------------------------------------------------------------------------------------------------------------->
    <!-------------------------| CSS |------------------------->
    <link rel="stylesheet" type="text/css" href="css/pedido.css">
    <!--------------------------------------------------------->

</head>
<body>
    
    <?php include ("php/barra-menu.php"); ?>

    <div class="geral">
        <form method="post">    
            <div class="pizza">
                <h1 class="titulo">Pizzas</h1>
                <hr>
                    <!--<h4>Pizzas</h4>-->
                
                    <?php

                /* CHAMAR TABELA DE SABORES */
                include "php\conexaoBD.php";

                $sql = "SELECT * FROM `sabor` WHERE status='on' order by nome";
                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                $qtdeSaborCad=0;
                
                while($row = $result->fetch_assoc()) {

                    $sabor[$qtdeSaborCad] = $row["nome"];
                    $idSabor[$qtdeSaborCad] = $row["idSabor"];
                    $desc[$qtdeSaborCad] = $row["descricao"];
                    $disponibilidade[$qtdeSaborCad] = $row["disponibilidade"]; 
                    //$dispo = explode(",", $disponibilidade[$qtdeSaborCad]);
                    $qtdeSaborCad++;
                    
                }
                
                }
                /*-----------------------------------------------------------------------------------------------------------*/
                include "php\conexaoBD.php";
                    $sql = "SELECT * FROM `tamanho` WHERE status='on' order by preco ASC";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    $qtdeTamanhoCad=0;
                    while($row = $result->fetch_assoc()) {
                        $pizza[$qtdeTamanhoCad] = $row["nome"];
                        $idPizza[$qtdeTamanhoCad] = $row["idPizza"];
                        $qtdeSabor[$qtdeTamanhoCad] = $row["qtdeSabor"];
                        $preco[$qtdeTamanhoCad] = $row["preco"];
                        
                        $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                        $brl = $formatter->formatCurrency($preco[$qtdeTamanhoCad], 'BRL');
                        
                        echo " <div class='tamanho'>

                            <h2> <strong> $pizza[$qtdeTamanhoCad] - </strong> Até $qtdeSabor[$qtdeTamanhoCad] sabores </h2> 
                            <p> Por $brl </p>
                            </div>
                            

                        
                            <br> <button type='button' class='btn1' data-bs-toggle='modal' data-bs-target='#S$idPizza[$qtdeTamanhoCad]'>
                                <i class='fa fa-shopping-cart'></i> Pedir
                            </button>
                            <hr>
                            
                            
                    <div class='modal fade' id='S$idPizza[$qtdeTamanhoCad]' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='staticBackdropLabel'> Escolha até $qtdeSabor[$qtdeTamanhoCad] Sabores </h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>";
                                for ($e=0; $e < $qtdeSabor[$qtdeTamanhoCad]; $e++) { 
                                    $numSabor = $e+1;
                                    echo" Sabor $numSabor:
                                    <select class='form-select'>
                                    <option selected disabled hidden>Clique Aqui Para Escolher Um Sabor</option>
                                    <option>Nenhum</option>";
                                    for ($j=0; $j < sizeof($disponibilidade); $j++) { 
                                        $dispo = explode(",", $disponibilidade[$j]);  
                                    
                                    for ($i=0; $i < sizeof($dispo); $i++) {   
                                                                            
                                        if($idPizza[$qtdeTamanhoCad] == $dispo[$i]){

                                            echo"<option> $sabor[$j] </option>";
                                        }}}            
                                    echo"
                                    </select><br>";
                                }
                                
                                echo"<p class='saboresCarrinho'>*caso não queria a mesma quantidade de sabores do máximo, escolhar a opção nenhum </p>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'> Fechar </button>
                                    <button type='button' class='btn btn-success'> Adicionar ao Carrinho </button>
                                </div>
                            </div>
                        </div>
                    </div>";
                            
                        $qtdeTamanhoCad++; 
                        
                        }
                    } 
                ?>
            </div>
        </form>
        
        <div class="bebida">
            <h1 class="titulo">Bebidas</h1>
            <hr>
            <!--<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#finalizar"> Finalizar Pedido </button>-->
            <?php
                include "php\conexaoBD.php";

                $sql = "SELECT * FROM `bebida` Where `status`='on' ORDER BY nome ASC";
                $result = $conn->query($sql);   
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $nome_bebida = $row["nome"];
                        $preco = $row["preco"];
                        $idBebida = $row["idBebida"];
                        $cardapioBD = $row["cardapio"];
                        $status = $row["status"];

                        $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                        $brl = $formatter->formatCurrency($preco, 'BRL');
                        
                        
                        echo"
                        <div class='tamanho'> <h2> <strong> $nome_bebida </strong></h2>
                        <p>Por $brl</p> 
                        </div> 
                        <button type='button' class='btn1' data-bs-toggle='modal' data-bs-target='#S'>
                                    <i class='fa fa-shopping-cart'></i> Pedir
                                </button>
                                <hr>
                        ";
                    

                        
                    }
                    
                }
                
            ?>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#carrinho" id="btnCarrinho">
            <i class="fa fa-shopping-cart"></i>  Carrinho
            <!------------------------------------------------------------------------>
        </button>
</div>



    <!-- Modal -->
<div class="modal fade" id="carrinho" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"> Carrinho</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <hr>
            <input type="number" value="1" class="qtde"> * Pizza Pequena  
            <p class="saboresCarrinho">+1 - Sabor - Frango Catupiry</p>
            <p class="saboresCarrinho">+1 - Sabor - Calabresa Catupiry</p>
                
            <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Fechar </button>
                <button type="button" class="btn btn-success"> Próximo </button>
            </div>
        </div>
    </div>
</div>


    <!-- Modal -->
<div class="modal fade" id="finalizar" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"> Finalizar Pedido </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Nome:  <input type="text"><br>
                Telefone: <input type="text">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Fechar </button>
                <button type="button" class="btn btn-success" > Finalizar Pedido </button>
            </div>
        </div>
    </div>
</div>


<?php include "rodape.html"; ?>
</body>
</html>