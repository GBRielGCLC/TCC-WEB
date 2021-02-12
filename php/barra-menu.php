<link rel="stylesheet" href="css/barra-menu.css">

<nav class = "menu">
    <ul class="links_menu">
        <li> <a href="index.php">Home</a> <li>
        <li> <button type="button" id="pedir" data-bs-toggle="modal" data-bs-target="#exampleModal"> Peça Online </button> <li>
        <li> <a href="index.php">Promoções</a> <li>
        <li> <a href="#">Cardápio</a> <li>
        <li> <a href="#onde_encontrar">Onde Nos encontrar</a> <li> 
        
        <?php
            session_start();
            if(isset($_SESSION["logou"])){
                if($_SESSION["logou"]==1){
                    echo "<li><a href=''> Relatorios </a></li>";
                    echo "<li>
                        <div class='dropdown'>
                        <a href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                            Gerenciar Cardápio <i class='seta-baixo'></i>
                        </a>

                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink' style='background-color: #8B0000;'>
                            <li><a href='Cardapio.php' class='dropdown-item' style='color:white;' >Cardápio</a></li>
                            <li><a href='#' class='dropdown-item' style='color: white;'>Ativar/Inativar Produto</a></li>
                            
                        </ul>
                        </div>
                        <li>
                        
                        <li><a style='float:right' href='php/logout.php'> Sair </a></li>
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