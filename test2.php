<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/barra-menu.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container-fluid">
       
      <a class="navbar-brand">
        <img src="imagens/logo3a.png" width="50">
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"> <a class="nav-link active" href="index.php"> Início </a> </li>
            <li class="nav-item"> <a class="nav-link active" href="pedido.php"> Fazer Pedido </a> </li>
            <li class="nav-item"> <a class="nav-link active" href="cardapio.php">Cardápio</a> </li>
            <?php
                session_start();
                if(isset($_SESSION["logou"]) && isset($_SESSION["nome"])){
                    
                    if($_SESSION["logou"]=="sim"){
                        $nome = $_SESSION["nome"];
                       // echo "<script> alert($_SESSION['adm'])</script>"; 
                        
                        echo "

            <li class='nav-item'> <a class='nav-link active' href='aceitar-pedido.php'> Aceitar Pedido </a>
            </li>
            <li class='nav-item'>
                <div class='dropdown'>
                    <a href='#' role='button' id='cardapio' data-bs-toggle='dropdown' aria-expanded='false'>
                        Gerenciar Cardápio <i class='seta baixo'></i>
                    </a>

                    <ul class='dropdown-menu' aria-labelledby='cardapio' style='background-color: #8B0000;'>
                        <li><a class='nav-link active' href='gerencia-cardapio.php' class='dropdown-item' id='dropdown-item'> Atualizar Cardápio </a></li>
                        <li><a class='nav-link active' href='cadastro-cardapio.php' class='dropdown-item' id='dropdown-item'> Incluir Item </a></li>
                        
                    </ul>
                </div>
                            </li>
                        ";
                    }else{
                        echo "<a class='nav-link active' style='float:right' href='login_area.php'> Iniciar </a>";
                    }
                }
                else{
                    echo "
                    <li class='nav-item'> <a class='nav-link active' style='float:right' href='login_area.php'> Iniciar </a> </li>
                    <li class='nav-item'> <a class='nav-link active' href='index.php#onde_encontrar'>Onde Nos encontrar</a> </li>
                    ";
                }
                
            ?>
         </ul>
      </div>
   </div>
</nav>

    <!--<nav class="navbar navbar-expand-lg navbar-light bg-light" >
        <ul class="links_menu">
            <li> <img src="imagens\logo3a.png" width="50" heigth="50"> </li>
            <li> <a href="index.php"> Início </a> </li>
            <li> <a href="pedido.php"> Fazer Pedido </a> </li>
            <li> <a href="cardapio.php">Cardápio</a> </li>
            
            <?php
                session_start();
                if(isset($_SESSION["logou"]) && isset($_SESSION["nome"])){
                    
                    if($_SESSION["logou"]=="sim"){
                        $nome = $_SESSION["nome"];
                       // echo "<script> alert($_SESSION['adm'])</script>"; 
                        
                        echo "

                            <li> <a href='aceitar-pedido.php'> Aceitar Pedido </a>
                            </li>
                            <li>
                                <div class='dropdown'>
                                    <a href='#' role='button' id='cardapio' data-bs-toggle='dropdown' aria-expanded='false'>
                                        Gerenciar Cardápio <i class='seta baixo'></i>
                                    </a>

                                    <ul class='dropdown-menu' aria-labelledby='cardapio' style='background-color: #8B0000;'>
                                        <li><a href='gerencia-cardapio.php' class='dropdown-item' id='dropdown-item'> Atualizar Cardápio </a></li>
                                        <li><a href='cadastro-cardapio.php' class='dropdown-item' id='dropdown-item'> Incluir Item </a></li>
                                        
                                    </ul>
                                </div>
                            </li>
                        ";
                    }else{
                        echo "<a style='float:right' href='login_area.php'> Iniciar </a>";
                    }
                }
                else{
                    echo "
                    <li> <a style='float:right' href='login_area.php'> Iniciar </a> </li>
                    <li> <a href='index.php#onde_encontrar'>Onde Nos encontrar</a> </li>
                    ";
                }
                
            ?>
            </ul>
    </nav>-->
    
    

</body>
</html>