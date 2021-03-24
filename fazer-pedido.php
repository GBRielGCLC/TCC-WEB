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
        <form method="post">    
        
        
            <div class="pizza">
                
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
            echo"

            <div class='accordion' id='accordionExample'>
            <div class='accordion-item'>
              <h2 class='accordion-header' id='headingOne'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                <h1 class='titulo'>Pizzas</h1>
                <hr>
                </button>
              </h2>
              <div id='collapseOne' class='accordion-collapse collapse' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
                <div class='accordion-body'>


            ";

            
            
            include "php\conexaoBD.php";
            $sql = "SELECT * FROM `tamanho` WHERE status='on' and `cardapio`='on' order by preco ASC";
            
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
                        
                      echo"
                        <!------------------------------------------------------------------------------------------------->
                        <!-- Button trigger modal -->
                      <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#e$idPizza[$qtdeTamanhoCad]'>
                      $pizza[$qtdeTamanhoCad]
                      </button>
                      <br>
                      <!-- Modal -->
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
                              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                              <button type='button' class='btn btn-primary'>Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>  
                    <!------------------------------------------------------------------------------------------------->

                      ";

                    }
                  }
                  echo"    </div>
                  </div>
                </div>";
                         
                            ?>
                            </div> <!-- Fim da div pizza -->

                  </div>
                           
              
            <div class="bebida">
            
            <!--<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#finalizar"> Finalizar Pedido </button>-->
            <?php

            echo"

            <div class='accordion' id='accordionExample'>
            <div class='accordion-item'>
              <h2 class='accordion-header' id='headingOne'>
                <button class='accordion-button collapsed' id='botao' type='button' data-bs-toggle='collapse' data-bs-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
                <h1 class='titulo'>Bebidas</h1>
                <hr>
                </button>
              </h2>
              <div id='collapseTwo' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#accordionExample'>
                <div class='accordion-body'>


            ";

                include "php\conexaoBD.php";

                $sql = "SELECT * FROM `bebida` Where `status`='on' and `cardapio`='on' ORDER BY nome ASC";
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

                      <!-- Button trigger modal -->
                      <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#e$idBebida'>
                      $nome_bebida
                    </button>
                      <br>
                        <!-- Modal -->
                        <div class='modal fade' id='e$idBebida' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                              </div>
                              <div class='modal-body'>
                              $nome_bebida
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                <button type='button' class='btn btn-primary'>Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>  
                        
                        ";



                    }
                    echo"
                    </div>
                    </div>
                    </div>
                  </div>";
                  }

                  
                  ?>



</div> <!-- Fim da div geral -->


</form>


<button class="confirmar">Adicionar</button>
                            
<hr>
<h1>Itens Adicionados</h1>
<hr>
                  


</body>
</html>