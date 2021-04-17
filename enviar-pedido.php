<!DOCTYPE html>
<html lang="Pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Pedido</title>
     <!------------------------------------------------| Bootstrap |------------------------------------------------>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!----------------------------------------------------------------------------------------------------------------->
    <!-------------------------| CSS |------------------------->
    <link rel="stylesheet" href="css/enviar-pedido.css">
    <!--------------------------------------------------------->
</head>
<body>
<?php include("php/barra-menu.php"); ?>
        
        <div class="geral">
        <h1>Finalizar Pedido</h1>
        <hr>
        <div class="campos">

      <form action="php/cad-pedido.php" method="post">

        <label> Nome </label> <input type="text" required value="<?= $_SESSION['nome-cliente'] ?>" size="25" disabled>     
        <label> Celular  </label> <input type="text" required value="<?= $_SESSION['telefone-cliente'] ?>" disabled>    
        <hr>
        <select class='form-select' id="select" required name="bairro"> 
        <option selected disabled hidden> Selecione o seu bairro </option> 
        
        <?php 
        
        include "php\conexaoBD.php";
        $sql = "SELECT * FROM `taxa_entrega` order by bairro ASC";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $taxa = $row["taxa"]; //valor
                  $bairro = $row["bairro"]; //nome
                  $id = $row["idTaxa"]; //id
                
                  if($_SESSION["idTaxa"] == $id){
                    $selected = "selected";
                    
                    $_SESSION["idBairro"] = $id;
                  }else{
                    $selected = "";
                    echo"AAAAAAAAA";
                  }
            ?> 
            
            <option <?= $selected ?> value="<?=$id?>" > <?=  $bairro?> </option>
            
              <?php  }
            }
        ?>

        </select>

        


        <label> Endereço </label> <input value=" <?= $_SESSION["endereco-cliente"] ?>" required name="endereco" type="text" size="65"> <br>     
        <label> Referência </label> <input type="text" size="65"> 
        
        <hr>
        <p> 
        <?php if(isset($_SESSION["ValorTotalItens"])){ 
        $total = $_SESSION["ValorTotalItens"]; 
        
        $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
        $total = $formatter->formatCurrency($total, 'BRL');
        
        ?>
         Valor Total : <?= $total ?> 
        <?php } else{
          echo "Valor Total : R$ 0,00";
        }?>
        </p>
        <select required class='form-select' id="select"> 
        
          <option selected disabled hidden> Selecione o método de pagamento </option> 

          <option value="Dinheiro"> Dinheiro </option>
          <option value="Cartao"> Cartão </option>

        </select>
        
        <div class="center">
        <center>
        <input type="submit" class="enviar">
        </center>
        
        </div>
        </form>

        <hr>
        </div>
        </div>

</body>
</html>