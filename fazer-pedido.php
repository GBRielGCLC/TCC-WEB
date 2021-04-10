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
            echo"

            <div class='accordion' id='accordionExample'>
            <div class='accordion-item'>
              <h2 class='accordion-header' id='headingOne'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' style='height: 75px; width: 250px;' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                <h1 class='titulo' style='font-size: 35px;'>Pizzas</h1>
                <hr>
                </button>
              </h2>
              <div style='width: 250px;' id='collapseOne' class='accordion-collapse collapse' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
                <div class='accordion-body'>


            ";

            
            
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
                        $preco[$qtdeTamanhoCad] = $row["preco"];
                        
                        $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                        $brl = $formatter->formatCurrency($preco[$qtdeTamanhoCad], 'BRL');
                        
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
                    
                  }
                  echo"    
                  </div>
                  </div>
                </div>
                
                ";
                         
                            ?>
                            </div> <!-- Fim da div pizza -->

                  </div>
                           
              
            <div class="bebida">
            
            
            <?php

            echo"

            <div class='accordion' id='accordionExample'>
            <div class='accordion-item'>
              <h2 class='accordion-header' id='headingOne'>
                <button class='accordion-button collapsed' id='botao' type='button' data-bs-toggle='collapse' data-bs-target='#collapseTwo' style='height: 75px; width: 250px;' aria-expanded='true' aria-controls='collapseTwo'>
                <h1 class='titulo' style='font-size: 35px;'>Bebidas</h1>
                <hr>
                </button>
              </h2>
              <div style='width: 250px;' id='collapseTwo' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#accordionExample'>
                <div class='accordion-body'>


            ";

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
                              <?=$nome_bebida[$aux_bebida]?> <input type='text' size='1' name='qtde'>
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
                        Carrinho
                      </div>
                      <div class='card-body'>
                        <h5 class='card-title'></h5>
                        <p class='card-text'>
                         

                      <?php   if(isset($_POST["aux_pizza"]) && isset($_POST["opcao1"]) && isset($_POST["opcao2"])){ ?>

                        <input type='number' value='1' class='qtde'> * <?= $pizza[$_POST['aux_pizza']] ?>  
                        <p class='saboresCarrinho'>+1 - Sabor - <?= $_POST['opcao1'] ?> </p>
                        <p class='saboresCarrinho'>+1 - Sabor - <?= $_POST['opcao2'] ?> </p>
                        <hr>

                         <?php } 

                      
                      foreach ($_SESSION["carrinho"] as $key => $value) {
                        if(isset($nome_bebida[$key])){
                        ?>
                        
                        <input type="number" value="<?=$value?>" class="qtde"> <?= $nome_bebida[$key] ?>  <hr>
                        
                       <?php 

                       $total = 0;
                       if(isset($preco[$key])){
                        
                        $total += $preco[$key];
                          $_SESSION["total"] = $total;
                            }
                          }
                        } 
                        
                        ?>
                      <?= $_SESSION["total"] ?>
                  
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
                                 <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <div class="modal-body">
                                
                               <form action="php\verificar-login.php" method="post">
                               nome <input type="text" name="nome"> <br>
                               telefone <input type="text" name="telefone"> <br>
                           
                              
                           
                               


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