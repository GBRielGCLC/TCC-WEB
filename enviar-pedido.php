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
<?php include("php/barra-menu.php");?>
        
        <div class="geral">
        <h1>Finalizar Pedido</h1>
        <hr>
        <div class="campos">

        <label> Nome </label> <input type="text" size="25">     
        <label> Celular  </label> <input type="text">    
        <hr>
        <select class='form-select' id="select"> <option> Selecione o Seu Bairro </option> </select>
        <label> Endereço </label> <input type="text" size="65"> <br>     
        <label> Referência </label> <input type="text" size="65"> 
        
        <hr>
        <p> Valor Total : R$ XX,XX </p>
        <select class='form-select' id="select"> <option> Selecione o Método de Pagamento </option> </select>
        
        <div class="center">
        <center>
        <input type="submit" class="enviar">
        </center>
        
        </div>

        <hr>
        </div>
        </div>

</body>
</html>