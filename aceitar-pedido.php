<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title> Aceitar Pedido </title>
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
          <label class="id"> Id: 019 </label> <label class="nome" > Nome: Paulinho Bastos</label>

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
          <div class="tabela">
        <table>
          <tr>
            <td> <b>Nome:</b> Paulinho Bastos </td>
            <td> <b>Valor Total dos Itens:</b> R$ 30,00  </td>
          </tr>
          
          <tr>
            <td> <b>Horário do Pedido:</b>19:28 </td>
            <td> <b>Taxa de Entrega:</b>$ 3,00 </td>
          </tr>

          <tr>
            <td> <b>Celular:</b> (79) 9 9634-7743 </td>
            <td> <b>Desconto:</b> R$ 0,00 </td>
          </tr>

          <tr> 
            <td> <b>Endereço:</b> Rua São Paulo, N° 48 </td>
            <td> <b>Total:</b> R$ 33,00 </td>
          </tr>

          <tr>
            <td> <b>Referência:</b> Mercearia do Popular Dede </td>
            <td> <b>Forma de Pagamento:</b> Dinheiro </td>
          </tr>
        </table>
        </div>
      <div class="resumo">
        <h6> 1x  - Pizza Grande Tradicional - 2 Sabores </h6>
        <hr>
          <p> + Sabor - Frango Catupiry - x1 </p>
          <p> + Sabor - Calabresa Cheddar - x1 </p>
          
      </div>
        
      </div>
  </div>
</div>

    



</body>
</html>