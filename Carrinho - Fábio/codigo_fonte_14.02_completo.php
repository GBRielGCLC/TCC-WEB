<?php
  
  // Conecta ao banco de dados
  if(isset($_REQUEST["action"]) == "" || isset($_REQUEST["action"]) == "visualizar")
  {
    # Dados para a conex�o com o banco de dados
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'test';
    
    $link = mysqli_connect($servidor, $usuario, $senha, $banco);
    
  }
  
  if(isset($_REQUEST["action"]) == "adicionar")
  {
    /* C�DIGO DE ADICIONAR PRODUTO AO CARRINHO - SESS�O */
    session_start();
    $productId = $_REQUEST["id"];
  
    // Cria o carrinho, caso n�o tenha sido criado ainda
    if(!isset($_SESSION["CARRINHO"]))
    {
      $_SESSION["CARRINHO"] = array();
    }
    
    // Verifica se j� existe alguma unidade do produto no carrinho
    if(isset($_SESSION["CARRINHO"][$productId]))
    {
      // Se j� existe, incrementa sua quantidade
      $_SESSION["CARRINHO"][$productId]++;
    }
    else
    {
      // Se n�o existe, adiciona a primeira unidade ao carrinho
      $_SESSION["CARRINHO"][$productId] = 1;
    }
    
    header("location: ?action=visualizar");
  }
  else if(isset($_REQUEST["action"]) == "remover")
  {
    /* C�DIGO DE REMOVER PRODUTO DO CARRINHO - SESS�O  */
    session_start();
    $productId = $_REQUEST["id"];
  
    // Verifica se o carrinho existe
    if(isset($_SESSION["CARRINHO"]))
    {
      // Verifica se h� alguma unidade do produto no carrinho
      if(isset($_SESSION["CARRINHO"][$productId]))
      {
        // Se existir, remove uma unidade
        $_SESSION["CARRINHO"][$productId]--;
        
        // Remove as refer�ncias do produto se n�o tiver mais nenhum
        if($_SESSION["CARRINHO"][$productId] == 0)
          unset($_SESSION["CARRINHO"][$productId]);
          
        // Reseta o carrinho se estiver vazio
        if(sizeof($_SESSION["CARRINHO"]) == 0)
          unset($_SESSION["CARRINHO"]);
      }
    }
    header("location: ?action=visualizar");
  }
  else if(isset($_REQUEST["action"]) == "visualizar")
  {
    /* C�DIGO DE VISUALIZAR O CARRINHO - SESS�O  */
    session_start();
    
    echo "<B>Conte�do do carrinho de compras</B><BR>";
    
    // Verifica se o carrinho n�o est� vazio
    if(isset($_SESSION["CARRINHO"]))
    {
      $total = 0.00;
      $products = array_keys($_SESSION["CARRINHO"]);
      foreach($products as $productId)
      {
      	$sql = "SELECT * FROM PRODUTOS WHERE ID = ".$productId;
      	$result = mysqli_query($link,$sql);
      	if($tbl = mysql_fetch_array($result))
      	{
      	 $qtd = $_SESSION["CARRINHO"][$productId];
      	 $value = $qtd * $tbl["VALOR"];
      	 $total += $value;
      	 echo $qtd."x ".$tbl["PRODUTO"]." (Unit�rio R$ ".$tbl["VALOR"].
              ") (Total R$ ".$value.") <A href='?action=remover&id=".
              $productId."'>Remover</A><BR>";
      	}
      }
      echo "Valor total da compra: R$ ".$total;
    }
    else
      echo "N�o h� produtos no carrinho.";
      
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
