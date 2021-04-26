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
    <link rel="stylesheet" type="text/css" href="css/fazer-pedido.css">
    <!--------------------------------------------------------->

</head>
<body>
    
    <?php include ("php/barra-menu.php"); ?>

    
    <div class="geral">
    <hr>
    <h1>Fazer Pedido</h1>
    <hr>
           
        
            <div class="pizza">
                
                    
                
                    <?php

                /* CHAMAR TABELA DE SABORES */
                include "php\conexaoBD.php";

                $sql = "SELECT * FROM `sabor` WHERE status='on' and cardapio='on' order by nome";
                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                $qtdeSaborCad=0;
                
                while($row = $result->fetch_assoc()) {

                    $sabor[$qtdeSaborCad] = $row["nome"];
                    $idSabor[$qtdeSaborCad] = $row["idSabor"];
                    $desc[$qtdeSaborCad] = $row["descricao"];
                    $disponibilidade[$qtdeSaborCad] = $row["disponibilidade"]; 
                    
                    $qtdeSaborCad++;
                    
                }
                
            }
            /*-----------------------------------------------------------------------------------------------------------*/
            ?>

            <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" style="height: 75px; width: 250px;" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h1 class="titulo" style="font-size: 35px;">Pizzas</h1>
                <hr>
                </button>
              </h2>
              <div style="width: 250px;" id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">


            <?php

            
            
            include "php\conexaoBD.php";
            $sql = "SELECT * FROM `tamanho` WHERE status='on' and `cardapio`='on' order by preco ASC";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $qtdeTamanhoCad=-1;
                    while($row = $result->fetch_assoc()) {
                        $qtdeTamanhoCad++;
                        $pizza[$qtdeTamanhoCad] = $row["nome"];
                        $idPizza[$qtdeTamanhoCad] = $row["idPizza"];
                        $qtdeSabor[$qtdeTamanhoCad] = $row["qtdeSabor"];
                        $preco_pizza[$qtdeTamanhoCad] = $row["preco"];
                        
                        $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                        $brl = $formatter->formatCurrency($preco_pizza[$qtdeTamanhoCad], 'BRL');
                        
                      echo"
                        <!------------------------------------------------------------------------------------------------->
                        <!-- Button trigger modal -->
                      <button type='button' class='opcoes' data-bs-toggle='modal' data-bs-target='#e$idPizza[$qtdeTamanhoCad]'>
                      $pizza[$qtdeTamanhoCad]
                      </button>
                      <br>
                      <!-- Modal -->

                      <form method='post'>

                      <div class='modal fade' id='e$idPizza[$qtdeTamanhoCad]' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
                            <select name='opcao$numSabor' class='form-select'>
                            <option selected disabled hidden>Clique aqui para escolher um sabor</option>
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
                        <input type='hidden' name='aux_pizza' value='$qtdeTamanhoCad'>
                            <div class='modal-footer'>
                              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                              <button type='submit' name='pizza' class='btn btn-primary'>Adicionar $brl</button>
                            </div>
                          </div>
                        </div>
                      </div>  
                    <!------------------------------------------------------------------------------------------------->
                    </form>
                      ";

                    
                    }

                    if(isset($_POST['aux_pizza'])){
                      if(isset($_SESSION["carrinho_pizza"][$_POST['aux_pizza']])){
                        $_SESSION["carrinho_pizza"][$_POST['aux_pizza']] += 1;
                      }else{
                        $_SESSION["carrinho_pizza"][$_POST['aux_pizza']] = 1;
                        
                      }
                    }
                    
                  }
                  echo"    
                  </div>
                  </div>
                </div>
                
                ";
                         
                            ?>
                            </div> <!-- Fim da div pizza -->

                  </div>
                           
<!----------------------------------------------------------------------------------------------------------->              
            <div class="bebida">

            <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" id="botao" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" style="height: 75px; width: 250px;" aria-expanded="true" aria-controls="collapseTwo">
                <h1 class="titulo" style="font-size: 35px;">Bebidas</h1>
                <hr>
                </button>
              </h2>
              <div style="width: 250px;" id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">


            <?php

                include "php\conexaoBD.php";
                
                $sql = "SELECT * FROM `bebida` Where `status`='on' and `cardapio`='on' ORDER BY nome ASC";
                $result = $conn->query($sql);   
                if ($result->num_rows > 0) {
                  $aux_bebida=-1;
                    while($row = $result->fetch_assoc()) {
                        $aux_bebida++;
                        $nome_bebida[$aux_bebida] = $row["nome"];
                        $preco[$aux_bebida] = $row["preco"];
                        $idBebida[$aux_bebida] = $row["idBebida"];
                        $cardapioBD[$aux_bebida] = $row["cardapio"];
                        $status[$aux_bebida] = $row["status"];

                        $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                        $brl = $formatter->formatCurrency($preco[$aux_bebida], 'BRL');

                      ?>

                      <!-- Button trigger modal -->
                      <button type='button' class='opcoes' data-bs-toggle='modal' data-bs-target='#e<?=$idBebida[$aux_bebida]?>'>
                      <?=$nome_bebida[$aux_bebida]?>
                    </button>
                      <br>
                        <!-- Modal -->

                        <form method='post'>

                        <div class='modal fade' id='e<?=$idBebida[$aux_bebida]?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'><?= $nome_bebida[$aux_bebida] ?></h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                              </div>
                              <div class='modal-body'>
                              
                                <?=$nome_bebida[$aux_bebida]?> <input type='text' min="0" size='1' name='qtde'>
                                <input type='hidden' name='aux_bebida' value='<?=$aux_bebida?>'>
                               
                               
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'> Fechar</button>
                                <input type='submit' value='Adicionar <?=$brl?>' class='btn btn-primary'>
                              </div>
                            </div>
                          </div>
                        </div>

                        </form>
                        
                        <?php
                       
                        

                    }
                    
                    if(isset($_POST['aux_bebida']) && isset($_POST['qtde'])){
                    if(isset($_SESSION["carrinho"][$_POST['aux_bebida']])){
                      $_SESSION["carrinho"][$_POST['aux_bebida']] += $_POST['qtde'];
                    }else{
                      $_SESSION["carrinho"][$_POST['aux_bebida']] = $_POST['qtde'];
                      
                    }
                  }
                  
?>
  
                    </div>
                    </div>
                    </div>
                    </div>
                  </div>
                <?php  } ?>


                <div class='card'>
                      <div class='card-header'>
                        Sacola
                      </div>
                      <div class='card-body'>
                        <h5 class='card-title'></h5>
                        <p class='card-text'>
                         

                      <?php   
                        if(isset($_SESSION["carrinho_pizza"])){ 
                          $totalPizza = 0;
                          foreach ($_SESSION["carrinho_pizza"] as $key => $value) { 
                          $totalPizza += $preco_pizza[$key]*$value;

                            ?>

                            <form action="php/unset-pizza.php" method="post">
                            <?=$value?> * <?= $pizza[$key] ?>  
                              <input type='hidden' name='chave' value='<?=$key?>'>
                                <button type="submit" class="lixeira"> <i style='font-size:24px' class='fas'>&#xf2ed;</i> </button> <hr>
                            </form>

                        
                         
                          <?php
                          for ($i=0; $i < $qtdeSabor[$key]; $i++) { 
                          if(isset($_POST['opcao'.($i+1)])){
                           echo" <p class='saboresCarrinho'>+1 - Sabor -", $_POST['opcao'.($i+1)]  ,"</p>";
                           $_SESSION["sabores"] = ",". $_POST['opcao'.($i+1)];
                           }
                        }
                      ?>
                        <hr>

                        <?php
                          } // FIM DO FOREACH
                        } 

                      
                     if(isset($_SESSION["carrinho"])){
                       $totalBebida = 0;
                        foreach ($_SESSION["carrinho"] as $key => $value) {                   
                          if(isset($nome_bebida[$key])){    ?>
                            <form action="php/unset-bebida.php" method="post">
                              <?=$value?> * <?= $nome_bebida[$key] ?> 
                              <input type='hidden' name='chave' value='<?=$key?>'> <br>
                                <button type="submit" class="lixeira" style=" "> <i style='font-size:24px;' class='fas'>&#xf2ed;</i> </button> <br> <hr>
                            </form>
                              <?php 

                     $totalBebida += $preco[$key]*$value;
                            
                          
                        } // FIM DO ISSET NOME_BEBIDA
                        
                        
                        
                        
                      } // FIM DO FOREACH
                      if( empty($totalPizza)){
                        $totalPizza =0;
                      }
                      if(empty($totalBebida)){
                        $totalBebida =0;
                      }
                      $TOTAL = $totalBebida+$totalPizza;
                      $_SESSION["ValorTotalItens"] = $TOTAL; 
                      //Transformando em REAL BRASILEIRO
                      $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                      $TOTAL = $formatter->formatCurrency($TOTAL, 'BRL');

                    echo "Valor total dos itens : <b>", $TOTAL,"</b>";
                    } 
                      
                       ?>
                  
                         </p>
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                           Fechar Pedido
                         </button>
                         
                         <!-- Modal -->
                         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Complemente os dados do Pedido</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <div class="modal-body">
                                
                               <form action="php\verificar-login.php" method="post">
                                <label style="width:100px;"> Nome </label> <input type="text" name="nome"> <br><br>
                                <label style="width:100px;"> Telefone </label> <input type="text" name="telefone"> <br>
                           
                               </div>
                               <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                 <button type="submit" class="btn btn-primary">Continuar</button>
                               </div>
                             </div>
                           </div>
                         </div>
                      </div>
                    </div>
                    </form>
                   
                    
</div> <!-- Fim da div geral -->

</body>
</html>