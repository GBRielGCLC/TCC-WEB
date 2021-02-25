<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/barra-menu.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>

    <nav class = "menu">
        <ul class="links_menu">
            <li> <a href="index.php">Home</a> <li>
            <li> <button type="button" id="pedir" data-bs-toggle="modal" data-bs-target="#pedido"> Peça Online </button> <li>
            <li> <a href="cardapio.php">Cardápio</a> <li>
            <li> <a href="index.php#onde_encontrar">Onde Nos encontrar</a> <li>

            <?php
                session_start();
                if(isset($_SESSION["logou"]) && isset($_SESSION["nome"])){
                    if($_SESSION["logou"]=="sim"){

                       // echo "<script> alert($_SESSION['adm'])</script>"; 
                        
                        if($_SESSION["adm"]==true){
                        
                            $nome = $_SESSION["nome"];
                        
                            echo "<li><a href=''> Relatorios </a></li>";
                            echo "<li><a href='atendente.php'> Incluir Atendente </a></li>";
                        }
                        echo "
                            <li>
                                <div class='dropdown'>
                                    <a href='#' role='button' id='cardapio' data-bs-toggle='dropdown' aria-expanded='false'>
                                        Gerenciar Cardápio <i class='seta baixo'></i>
                                    </a>

                                    <ul class='dropdown-menu' aria-labelledby='cardapio' style='background-color: #8B0000;'>
                                        <li><a href='gerencia-cardapio.php' class='dropdown-item' style='color: white;'> Atualizar Cardápio </a></li>
                                        <li><a href='cadastro-cardapio.php' class='dropdown-item' style='color:white;'> Incluir Item </a></li>
                                        
                                    </ul>
                                </div>
                            </li>
                            
                            
                            <li> 
                                <div class='dropdown'>
                                    <a style='float:right;' href='#' role='button' id='perfil' data-bs-toggle='dropdown' aria-expanded='false'>
                                        $nome <i class='fas fa-user-alt' style='font-size:18px; margin-left:5px; color:white;'></i> </i>
                                    </a>

                                    <ul class='dropdown-menu' aria-labelledby='perfil' style='background-color: #8B0000; min-width:0px; padding:0;'>
                                        <li><a href='/tcc-web/php/logout.php' class='dropdown-item' style='color: white; text-align: right;'> Sair </a>
                                        
                                    </ul>
                                </div>
                            </li>
                        ";
                    }else{
                        echo "<a style='float:right' href='login_area.php'> Iniciar </a>";
                    }
                }
                else{
                    echo "<a style='float:right' href='login_area.php'> Iniciar </a>";
                }
                
            ?>
            </ul>
    </nav>
    
    <!--------------------------------------------------------------------------| Modal |-------------------------------------------------------------------------->
    <div class="modal fade" id="pedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Escolha o destino</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>  
                <div class="modal-body">
                    <center>
                        <a href="" class="btn btn-primary"> Entrega </a>
                        <a href="" class="btn btn-primary"> Retirada </a>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------->

</body>
</html>