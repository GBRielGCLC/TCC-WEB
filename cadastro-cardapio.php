<html>
    

    <head>
        <meta charset="UTF-8">
        <script src="js\cardapio.js"></script>
        <title>Cardápio</title>

        <!------------------------------------------------| Campo monetário |------------------------------------------------>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
        <!------------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------------| Bootstrap |------------------------------------------------>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!----------------------------------------------------------------------------------------------------------------->
        <link rel="stylesheet" type="text/css" href="css/cadastro-cardapio.css">
    </head>

    <body>
        <div class="principal">  
            <?php
                include ('php/barra-menu.php')
            ?>
            <!--Para Cadastrar -->
            <div class="cadastro_sabor">
                <h1>Cadastro de Sabores</h1>
                    <form method="POST" class=campos_cadastro action="php\cardapio\cadastro-sabor.php">
                        <a id="cad-sabor"></a>

                        <label> Sabor </label> <input type="text" name="sabor">
                        <label> Valor Adicional </label> <input class="money" id="input" size="9" type="text" name="preco"><br>
                        <label> Descrição </label> <input type="text" name="desc" size="51"> 
                        <hr>
                        <h2 class="texto-tamanho"> Tamanho que o sabor está disponível </h2> 

                        <div class="lista_tamanhos">

                            <?php

                                include "php\conexaoBD.php";

                                $sql = "SELECT nome,idPizza FROM `tamanho` ORDER BY preco ASC";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $nome_tamanho = $row["nome"];
                                        $idPizza = $row["idPizza"];
                                        
                                        
                                        echo "<label> $nome_tamanho </label> <input type='checkbox' name='idPizza[]' value='$idPizza'>";
                                    }
                                    echo "<label></label>";

                                }
                                
                            ?>

                        </div>
      
                        <?php     
                            echo"<br><br>";
                            if(isset($_SESSION["cad-sabor"])){
                                if($_SESSION["cad-sabor"]=="vazio"){
                                    echo"
                                        <div class='alert alert-warning alert-dismissible fade show' role='alert' style=' background-color: #8B000;'>
                                            <strong>Preencha todos os campos!</strong>
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
                                }
                                if($_SESSION["cad-sabor"]=="sucesso"){
                                    echo"
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            <strong> Cadastro Realizado com Sucesso!!</strong>.
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
                                }
                                if($_SESSION["cad-sabor"]=="duplicado"){
                                    echo"
                                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                            <strong>Já está cadastrado !</strong>
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
                                }
                                session_destroy();
                            }
                            
                        ?>

                        <input type="submit" value="Cadastrar" class="btn_cadastrar">
                    </form>
            </div>

            <!--------------------------------------------------------------------------------  Tamanho  -------------------------------------------------------------------------------->
            <div class="cadastro_sabor">
                <h1>Cadastro de Tamanho</h1>
                
                <form method="POST" class=campos_cadastro action="php\cardapio\cadastro-tamanho.php">
                    <a id="tamanho"><!-- Trazer de volta para aqui --></a>

                    <label> Tamanho </label> <input type="text" name="tamanho">
                    <label> Preço </label> <input class="money" id="input" size="9" type="text" name="preco"> <br><br> 
                    
                    <?php

                        if(isset($_SESSION["cad-tamanho"])){
                            if($_SESSION["cad-tamanho"]=="vazio"){
                                echo"
                                    <div class='alert alert-warning alert-dismissible fade show' role='alert' style=' background-color: #8B000;'>
                                        <strong>Preencha todos os campos!</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                ";
                            }
                            if($_SESSION["cad-tamanho"]=="sucesso"){
                                echo"
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong> Cadastro Realizado com Sucesso!!</strong>.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                ";
                            }
                            if($_SESSION["cad-tamanho"]=="duplicado"){
                                echo"
                                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                        <strong>Já está cadastrado !</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                ";
                            }
                            session_destroy();
                        }
                    ?>

                    <input type="submit" value="Cadastrar" class="btn_cadastrar">
                </form>
            </div>

            <div class="cadastro_sabor">
                <h1>Bebida</h1>
                <a href=""></a>
                <form method="POST" class=campos_cadastro action="php\cardapio\cadastro-bebida.php">
                    <a id="cad-bebida"><!-- Trazer de volta para aqui --></a>

                    <label> Nome </label> <input type="text" name="nomeBebida">
                    <label> Preço </label> <input class="money" id="input" size="9" type="text" name="preco"> <br><br> 
                    
                    <?php
                        //alterar
                        if(isset($_SESSION["cad-bebida"])){
                            if($_SESSION["cad-bebida"]=="vazio"){
                                echo"
                                    <div class='alert alert-warning alert-dismissible fade show' role='alert' style=' background-color: #8B000;'>
                                        <strong>Preencha todos os campos!</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                ";
                            }
                            if($_SESSION["cad-bebida"]=="sucesso"){
                                echo"
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong> Cadastro Realizado com Sucesso!!</strong>.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                ";
                            }
                            if($_SESSION["cad-bebida"]=="duplicado"){
                                echo"
                                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                        <strong>Já está cadastrado !</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                ";
                            }
                            session_destroy();
                        }
                    ?>

                    <input type="submit" value="Cadastrar" class="btn_cadastrar">
                </form>
            </div>

        </div> <!-- div GERAL -->
    </body>

    <script>
        $(document).ready(function(){
            $('.money').mask('000.000.000.000.000,00', {reverse: true});
        
        $(".money").change(function(){
            $("#value").html($(this).val().replace(/\D/g,''))
        })
        
        });
    </script>

</html>



