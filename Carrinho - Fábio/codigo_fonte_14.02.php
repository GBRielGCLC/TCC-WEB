<?php
  
  // Conecta ao banco de dados
  if($_REQUEST["action"] == "" || $_REQUEST["action"] == "visualizar")
  {
    # Dados para a conex�o com o banco de dados
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'test';
    
    $link = mysqli_connect($servidor, $usuario, $senha, $banco);
    
  }
  
  if($_REQUEST["action"] == "adicionar")
  {
    /* C�DIGO DE ADICIONAR PRODUTO AO CARRINHO */
    
    header("location: ?action=visualizar");
  }
  else if($_REQUEST["action"] == "remover")
  {
    /* C�DIGO DE REMOVER PRODUTO DO CARRINHO */
    
    header("location: ?action=visualizar");
  }
  else if($_REQUEST["action"] == "visualizar")
  {
    /* C�DIGO DE VISUALIZAR O CARRINHO */
    
    echo "<BR><A href='?'>Retornar � lista de produtos</A>";
  }
  else 
  {
  	$sql = "SELECT * FROM PRODUTOS";
  	$result = mysqli_query($link,$sql);
  	while ($tbl = mysqli_fetch_array($result)) 
  	{
  		$ID = $tbl["ID"];
  		$PRODUTO = $tbl["PRODUTO"];
  		$VALOR = $tbl["VALOR"];
  		$QUANTIDADE = $tbl["QUANTIDADE"];
  
  		echo "<LI>".$PRODUTO." (R$ ".$VALOR.") (".$QUANTIDADE." em estoque) ";
  		echo "<A href='?action=adicionar&id=".$ID."'>COMPRAR</A>";
  	}
  	echo "<BR><A href='?action=visualizar'>Visualizar carrinho</A>";
  } 
  
?>
