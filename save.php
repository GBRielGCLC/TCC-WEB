<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!------------------------------------------------| Bootstrap |------------------------------------------------>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <!----------------------------------------------------------------------------------------------------------------->
</head>
<style>
 .principal {
   margin-top: 50px;
   margin-left:auto;
   margin-right:auto;
   width: 80%;
   background-color:white;
 }
 body{
  background-color: #78B678;
 }
</style>
<?php include "php/barra-menu.php"; ?>    
<body>

<div class="principal">
  <?php
      
      include "php\conexaoBD.php";

      $sql = "SELECT * FROM `tamanho` WHERE status='on'";
      
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $qtdeTamanhoCad=0;
        while($row = $result->fetch_assoc()) {
            $pizza[$qtdeTamanhoCad] = $row["nome"];
            $idPizza[$qtdeTamanhoCad] = $row["idPizza"];
            $qtdeSabor[$qtdeTamanhoCad] = $row["qtdeSabor"];
            /*$desc = $row["descricao"];
            $idPizza = $row["idPizza"];
            $statusBD = $row["status"];*/
            $qtdeTamanhoCad++; 
          }
      } 

      include "php\conexaoBD.php";

      $sql = "SELECT * FROM `sabor` WHERE status='on'";
      
      
echo "<div class='accordion' id='accordionExample'>";
      for ($auxTamanho=0; $auxTamanho < $qtdeTamanhoCad; $auxTamanho++) { 

        echo"
        <div class='accordion-item'>
          <h2 class='accordion-header' id='headingOne'>
            <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#a$auxTamanho' aria-expanded='true' aria-controls='a$auxTamanho'>
              $pizza[$auxTamanho] - Até $qtdeSabor[$auxTamanho] sabores.
            </button>
          </h2>
          <div id='a$auxTamanho' class='accordion-collapse collapse show' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
            <div class='accordion-body'>";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $qtdeSaborCad=0;
              
              while($row = $result->fetch_assoc()) {
                  $sabor[$qtdeSaborCad] = $row["nome"];
                  $idSabor[$qtdeSaborCad] = $row["idSabor"];
                  $desc[$qtdeSaborCad] = $row["descricao"];
                  /*$qtdeSabor = $row["qtdeSabor"];
                  $idPizza = $row["idPizza"];
                  $statusBD = $row["status"];*/
                  $disponibilidade[$qtdeSaborCad] = $row["disponibilidade"];
                  
                  $dispo = explode(",", $disponibilidade[$qtdeSaborCad]);
                  //$dispo = explode(",", $disponibilidade);
                  for ($i=0; $i < sizeof($dispo); $i++) { 
                    if($idPizza[$auxTamanho]==$dispo[$i]){
                      echo"$sabor[$qtdeSaborCad] <br>";
                    }
                  }
                  $qtdeSaborCad++;
                  
              }
              
            }
          
            echo "
            </div>
          </div>
        </div>
        ";
      }
      
echo "</div>";
  ?>
</div>
</body>
</html>