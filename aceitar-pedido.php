<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!----------------------------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="css/aceitar-pedido.css">
</head>
<body>
    
<?php include ("php/barra-menu.php"); ?>

<div class="geral">
  <div class="pedido">
      <div class="barra-pedido">
        <div class="itens-barra">
          <label class="id"> id: 019 </label> <label class="nome" > Nome: Paulinho Bastos</label>

         <label class="status" for="despachado"> Despachado
            <input type="radio" name="status" id="status" value="despachado">
          </label>
          
          <label class="status" for="aceito"> Aceito 
            <input type="radio" name="status" id="status" value="aceito">
          </label>
          
          <label class="status" for="recusado"> Recusado 
            <input type="radio" name="status" id="status" value="recusado">
          </label>
        </div>
      </div>
        
        
        <div class="descricao">
<pre> 
  ID do Pedido: 019              Cliente: Paulinho Bastos
  Celular: (79) 9 9634-7743      Horário do Pedido : 19:28
  Endereço:
  Bairro: São Carlos             Rua: São Paulo     N°: 48
  Complemento: Logo Ali aaaaaaaaaaaaaaaaaaaaaaaaa
  -------------------------------------------------------
  Resumo do Pedido: 
  
            30,00 * 1 - Pizza Grande (Calabresa II, Frango Cheddar);
             5,00 * 1 - Guaraná Antartica de 1L
             3,00 * Entrega
  Total: R$ 38,00 reais

</pre>

        
      </div>
  </div>
</div>

    



</body>
</html>