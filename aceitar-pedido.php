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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    
<?php include ("php/barra-menu.php"); ?>

<div class="geral">
  
        
        <?php 
        
        include "php\conexaoBD.php";
          //$hoje = date('Y/m/d');
          
          $ano = date('Y');
          $mes = date('m');
          $dia = date('d');

/*

    SELECT * FROM `pedido`,`cliente`,`taxa_entrega` WHERE extract( DAY from `dataPedido`) = $dia
    and extract( MONTH from `dataPedido`) = $mes and extract( YEAR from `dataPedido`) = $ano 
    and pedido.`idCliente` = cliente.`idCliente` and pedido.`idTaxa` = taxa_entrega.`idTaxa` = cliente.`idTaxa`


*/
            $sql = "    SELECT * FROM `pedido`,`cliente`,`taxa_entrega`,`pedido-bebida` WHERE extract( DAY from `dataPedido`) = $dia
            and extract( MONTH from `dataPedido`) = $mes and extract( YEAR from `dataPedido`) = $ano 
            and pedido.`idCliente` = cliente.`idCliente` and pedido.`idTaxa` = taxa_entrega.`idTaxa` = cliente.`idTaxa` and pedido.`idPedido`";
           
           date_default_timezone_set('America/Sao_Paulo');
           $today = date("H:i:s");  
           $result = $conn->query($sql);   
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  //pedido
                  $idPedido = $row["idPedido"];
                  $idCliente = $row["idCliente"];
                  $idTaxa = $row["idTaxa"];
                  $valorTotal = $row["valorTotal"];
                  $local = $row["local"];
                  $status = $row["status"];
                  $formaPagamento = $row["formaPagamento"];

                  if($formaPagamento == "dinheiro"){
                    $formaPagamento = "Dinheiro";
                  }
                  
                  if($formaPagamento == "cartao"){
                    $formaPagamento = "Cartão";
                  }


                  //taxa_entrega
                  $taxa = $row["taxa"];
                  
                  $valorTotalTotal= $valorTotal+$taxa;

                  $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                  $taxa = $formatter->formatCurrency($taxa, 'BRL');
                  //cliente 
                  $nome = $row["nome"];
                  $endereco = $row["endereco"];
                  $telefone = $row["telefone"];

                  $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                  $valorTotal = $formatter->formatCurrency($valorTotal, 'BRL');
                  
                  $formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
                  $valorTotalTotal = $formatter->formatCurrency($valorTotalTotal, 'BRL');
                  
                  
                  $statusAceito = "";
                  if($status == "aceito"){
                    $statusAceito = "checked";
                  }
                  
                  $statusDespachado = "";
                  if($status == "despachado"){
                    $statusDespachado = "checked";
                  }
                  
                  $statusRecusado = "";
                  if($status == "recusado"){
                    $statusRecusado = "checked";
                  }

              ?>
            <div class="pedido">
                  <div class="barra-pedido">
                    <div class="itens-barra">
                      <label class="id"> Id: <?=$idPedido?> </label> <label class="nome" > Nome: <?= $nome ?> </label>

                    <label class="status" for="despachado"> Despachado
                        <input type="radio" name="status" id="<?=$idPedido?>" value="despachado" <?=$statusDespachado?>>
                      </label>
                      
                      <label class="status" for="aceito"> Aceito 
                        <input type="radio" name="status" id="<?=$idPedido?>" value="aceito" <?=$statusAceito?>>
                      </label>
                      
                      <label class="status" for="recusado"> Recusado 
                        <input type="radio" name="status" id="<?=$idPedido?>" value="recusado" <?=$statusRecusado?>>
                      </label>
                    </div>
                  </div>


                  <div class="descricao">
                  <div class="tabela">
                <table>
                  <tr>
                    <td> <b>Nome:</b> <?= $nome ?> </td>
                    <td> <b>Valor Total dos Itens:</b> <?=$valorTotal?>  </td>
                  </tr>
                  
                  <tr>
                    <td> <b>Horário do Pedido:</b> <?= $today ?> </td>
                    <td> <b>Taxa de Entrega:</b> <?= $taxa ?> </td>
                  </tr>

                  <tr>
                    <td> <b>Celular:</b> <?= $telefone ?> </td>
                    <td> <b>Forma de Pagamento:</b> <?= $formaPagamento ?> </td>
                    <!-- <td> <b>Desconto:</b>  </td> -->
                  </tr>

                  <tr> 
                    <td> <b>Endereço:</b> <?= $endereco ?></td>
                    <td> <b>Total:</b> <?= $valorTotalTotal ?> </td>
                  </tr>

                  <tr>
                    <td> <b>Referência:</b>  </td>
                    
                  </tr>
                </table>
                </div>
              <div class="resumo">
                <h6> 1x  - Pizza Grande Tradicional - 2 Sabores </h6>
                <hr>
                  <p> + Sabor - Frango Catupiry - x1 </p>
                  <p> + Sabor - Calabresa Cheddar - x1 </p>
                  
              </div>

              <div class="resumo">
              <h6> 1x  - Fanta laranja 1L  </h6>
              </div>
                

              </div>
          </div>
          <br>

              <?php  }
              }else{

        echo"<div class='descricao'> 
        <h3 style='text-align: center'> Nenhum Pedido </h3> 
        </div>";

              }
        ?>
        
        
</div>

    
<script>
$(document).ready(function(){
  $('input[type=radio][name=status]').change(function() {
    var id = this.id;
    var status;

    
    if (this.value == 'despachado') {
      status = "despachado";
    }
    else if (this.value == 'aceito') {
      status = "aceito";
    }
    else if(this.value == 'recusado'){
      status = "recusado";
    }
    alert("Id:"+id+"|Status:"+status);
    $.ajax({
      type: "POST",
      url: "php/edit-status-pedido.php",
      data: {id:id, status:status},
    })

  });
});
</script>


</body>
</html>