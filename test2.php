<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/barra-menu.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<style>
    .custom{
        background-color:#8B0000;
        color:white;
    }
    .custom li a{
        color:white;
    }
    .custom li a:hover{
        background-color: #e20000;
        color: white;
    }
    #btn{
        border-color:white;
    }
    #linkstop{
        height: 100%;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg custom" >
   <div class="container-fluid">
       
      <a class="navbar-brand">
        <img src="imagens/marcacareca.png" width="50">
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="btn">
        <span class="fas fa-bars" style="color:white;"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="linkstop">
            <li class="nav-item"> <a class="nav-link active" href="index.php"> Início </a> </li>
            <li class="nav-item"> <a class="nav-link active" href="pedido.php"> Fazer Pedido </a> </li>
            <li class="nav-item"> <a class="nav-link active" href="cardapio.php">Cardápio</a> </li>
            <?php
                session_start();
                if(isset($_SESSION["logou"]) && isset($_SESSION["nome"])){
                    
                    if($_SESSION["logou"]=="sim"){
                        $nome = $_SESSION["nome"];

                        if($_SESSION["adm"]==true){
                            echo"
            <li class='nav-item dropdown'>
                <a class='nav-link active' href='#' role='button' id='cardapio' data-bs-toggle='dropdown' aria-expanded='false'>
                    Gerenciar Atendente <i class='seta baixo'></i>
                </a>

                <ul class='dropdown-menu' aria-labelledby='cardapio' style='background-color: #8B0000;'>
                    <li><a class='nav-link active' href='atendente.php' class='dropdown-item' id='dropdown-item'> Incluir Atendente </a></li>
                    <li><a class='nav-link active' href='excluir-atendente.php' class='dropdown-item' id='dropdown-item'> Excluir Atendente </a></li>
                </ul>
            </li>

            ";

            echo "<li class='nav-item'> <a class='nav-link active' href='relatorios.php'> Relatórios </a></li>";
                        }
                        
                        echo "

            <li class='nav-item dropdown'>
                <a class='nav-link active' role='button' id='cardapio' data-bs-toggle='dropdown' aria-expanded='false'>
                    Gerenciar Promoções <i class='seta baixo'></i>
                </a>

                <ul class='dropdown-menu' aria-labelledby='cardapio' style='background-color: #8B0000;'>
                    <li><a class='nav-link active' href='incluir-promocao.php' class='dropdown-item' id='dropdown-item'> Incluir Promoções </a></li>
                    <li><a class='nav-link active' href='gerencia-promocao.php' class='dropdown-item' id='dropdown-item'> Atualizar Promoções </a></li>
                </ul>
            </li>
            <li class='nav-item'> <a class='nav-link active' href='aceitar-pedido.php'> Aceitar Pedido </a> </li>

            <li class='nav-item dropdown'>
                <a class='nav-link active' role='button' id='cardapio' data-bs-toggle='dropdown' aria-expanded='false'>
                    Gerenciar Cardápio <i class='seta baixo'></i>
                </a>

                <ul class='dropdown-menu' aria-labelledby='cardapio' style='background-color: #8B0000;'>
                    <li><a class='nav-link active' href='gerencia-cardapio.php' class='dropdown-item' id='dropdown-item'> Atualizar Cardápio </a></li>
                    <li><a class='nav-link active' href='cadastro-cardapio.php' class='dropdown-item' id='dropdown-item'> Incluir Item </a></li>
                    
                </ul>
            </li>
        </ul>
        
            <li class='nav-item dropdown'> 
                <a class='nav-link active' style='float:right;' href='#' role='button' id='perfil' data-bs-toggle='dropdown' aria-expanded='false'>
                    $nome <i class='fas fa-user-alt' style='font-size:18px; margin-left:5px; color:white;'></i> </i>
                </a>

                <ul class='dropdown-menu' aria-labelledby='perfil' style='background-color: #8B0000; min-width:0px; padding:0;'>
                    <li><a class='nav-link active' href='atualizar-senha.php' class='dropdown-item' id='dropdown-item' style='text-align: right;'> Atualizar Senha </a>
                    <li><a class='nav-link active' href='conta.php' class='dropdown-item' id='dropdown-item' style='text-align: right;'> Minha Conta </a>
                    <li><a class='nav-link active' href='/tcc-web/php/logout.php' class='dropdown-item' id='dropdown-item' style='text-align: right;'> Sair </a>
                    
                </ul>
            </li>
                        ";
                    }else{
                        echo "<a class='nav-link active' style='float:right' href='login_area.php'> Iniciar </a>";
                    }
                }
                else{
                    echo "
                    <li class='nav-item'> <a class='nav-link active' href='index.php#onde_encontrar'>Onde Nos encontrar</a> </li>
                    <li class='nav-item'> <a class='nav-link active' style='float:right' href='login_area.php'> Iniciar </a> </li>
                    ";
                }
                
            ?>
         
      </div>
   </div>
</nav>
<!--
<nav class = "menu">
<ul class="links_menu">
    
    <li> <a href="index.php"> Início </a> <li>
    <li> <a href="pedido.php"> Fazer Pedido </a> <li>
    <li> <a href="cardapio.php">Cardápio</a> <li>
    
    <?php
        session_start();
        if(isset($_SESSION["logou"]) && isset($_SESSION["nome"])){
            
            if($_SESSION["logou"]=="sim"){
                $nome = $_SESSION["nome"];
                // echo "<script> alert($_SESSION['adm'])</script>"; 
                
                
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
</nav>
    -->
    

</body>
</html>