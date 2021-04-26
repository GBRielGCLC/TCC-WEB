<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title> Cardápio </title>

  <!------------------------------------------------| Bootstrap |------------------------------------------------>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <!----------------------------------------------------------------------------------------------------------------->
  <link rel="stylesheet" href="css/cardapio.css">
</head>
<?php include "php/barra-menu.php"; ?>    
<body>

<div class="geral">
    <div class="pizzas">
    <?php
          
          include "php\conexaoBD.php";

          $sql = "SELECT * FROM `tamanho` WHERE status='on'  and `cardapio`='on' order by preco ASC";
          
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            $qtdeTamanhoCad=0;
            while($row = $result->fetch_assoc()) {
                $pizza[$qtdeTamanhoCad] = $row["nome"];
                $idPizza[$qtdeTamanhoCad] = $row["idPizza"];
                $qtdeSabor[$qtdeTamanhoCad] = $row["qtdeSabor"];
                $preco[$qtdeTamanhoCad] = $row["preco"];

                $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                $brl[$qtdeTamanhoCad] = $formatter->formatCurrency($preco[$qtdeTamanhoCad], 'BRL');
                $qtdeTamanhoCad++; 
              }
          } 
          
         
          
    echo " <h1>Pizzas</h1> 
      <div class='accordion' id='accordionExample'>";
          for ($auxTamanho=0; $auxTamanho < $qtdeTamanhoCad; $auxTamanho++) { 

            echo"
            <div class='accordion-item'>
              <h2 class='accordion-header' id='headingOne'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#a$auxTamanho' aria-expanded='true' aria-controls='a$auxTamanho'>
                  ";
                  $es="";
                  if($qtdeSabor[$auxTamanho]>1){
                    $es="es";
                  }
                  ?>

                  <?= $pizza[$auxTamanho] ?> - Até <?= $qtdeSabor[$auxTamanho] ?> sabor<?php$es?> - Por <?= $brl[$auxTamanho] ?> reais.
                </button>
              </h2>
              <?php
              echo"
              <div id='a$auxTamanho' class='accordion-collapse collapse' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
                <div class='accordion-body'>";


                $sql = "SELECT * FROM `sabor`,`sabor_pizza` WHERE `sabor`.`idSabor` = `sabor_pizza`.`idSabor` and `idPizza` = $idPizza[$auxTamanho]";
  
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  $qtdeSaborCad=0;
                  
                  while($row = $result->fetch_assoc()) {

                      $sabor[$qtdeSaborCad] = $row["nome"];
                      $idSabor[$qtdeSaborCad] = $row["idSabor"];
                      $desc[$qtdeSaborCad] = $row["descricao"];
                     ?>
                       <strong> <?= $sabor[$qtdeSaborCad] ?> </strong> - <?= $desc[$qtdeSaborCad] ?> <br> <hr>
                          
                          <?php
                      $qtdeSaborCad++;
                  }
                  
                }
              ?>
                
                </div>
              </div>
            </div>
            
           
            
         <?php } ?>

     </div>
      </div><!--div da class pizzas-->
      
<?php
      /*======================================================================================================================*/
      /*======================================================================================================================*/
      /*=====================================================   Bebidas   ====================================================*/
      /*======================================================================================================================*/
      /*======================================================================================================================*/
   ?>
   
    <div class="bebidas">
      <h1> Bebidas </h1>
      <?php
        $sql = "SELECT * FROM `bebida` WHERE status='on' and `cardapio`='on' order by nome";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $idBebida = $row["idBebida"];
            $nome = $row["nome"];
            $preco = $row["preco"];

            $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                $brl = $formatter->formatCurrency($preco, 'BRL');

            echo"
              <hr>
              <p>$nome - Por $brl reais.</p>
            ";
          }
          echo"<hr>";
        }
      ?>
    </div>
</div>

<footer> <?php include "rodape.html"; ?> </footer>

</body>
</html>
