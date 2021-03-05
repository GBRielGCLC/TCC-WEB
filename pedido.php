<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedir</title>



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
            <div class="pedir">
            <h1 class="titulo">Pedir</h1>
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
                            
                            echo "<hr> <div class='tamanho'>

                                <h2> <strong> $pizza[$qtdeTamanhoCad] - </strong> Até $qtdeSabor[$qtdeTamanhoCad] sabores </h2> 
                                <p> Por $brl </p>
                                

                               
                                <br> <button type='button' class='btn1' data-bs-toggle='modal' data-bs-target='#S$idPizza[$qtdeTamanhoCad]' id='btnCarrinho'>
                                    <i class='fa fa-shopping-cart'></i> Pedir
                                </button>
                                </div>
                                
                                
                        <div class='modal fade' id='S$idPizza[$qtdeTamanhoCad]' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='staticBackdropLabel'> Escolha até $qtdeSabor[$qtdeTamanhoCad] Sabores </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>";
                                    for ($j=0; $j < sizeof($disponibilidade); $j++) { 
                                        $dispo = explode(",", $disponibilidade[$j]);  
                                    
                                    for ($i=0; $i < sizeof($dispo); $i++) {   
                                                                            
                                        if($idPizza[$qtdeTamanhoCad] == $dispo[$i]){

                                            echo"$sabor[$j]<br>";
                                        }}}            
                                    echo"
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
        
        <div class="pedir2">
            <h1> Bebidas </h1>
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
                        <hr><h2> <strong> $nome_bebida - </strong> Por $brl </h2> 
                        
                                
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
<div class="modal fade" id="carrinho" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"> Carrinho</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Fechar </button>
                <button type="button" class="btn btn-success"> Finalizar </button>
            </div>
        </div>
    </div>
</div>
<!-----------------------------------------------------------------------------> 



<?php include "rodape.html"; ?>
</body>
</html>