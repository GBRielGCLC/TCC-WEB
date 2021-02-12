<html>
    <head>
        <meta charset="UTF-8">
        <script src="js\cardapio.js"></script>

        <!------------------------------------------------| Campo monetário |------------------------------------------------>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
        <!------------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------------| Bootstrap |------------------------------------------------>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!----------------------------------------------------------------------------------------------------------------->
        <link rel="stylesheet" type="text/css" href="css/cardapio.css">
    </head>

    
    <body>
        <div class="principal">  
            <?php
                include ('php/barra-menu.php')
            ?>
            <!--Para Cadastrar -->
            <div class="cadastro_sabor">
                <h1>Cadastro de Sabores</h1>
                    <form method="POST" class=campos_cadastro>
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
//|-------------------------------------| ESTÁ APARECENDO O ERRO ASSIM Q CARREGA A PAGINA |-------------------------------------|//          
                            echo"<br><br>";
                            if(empty($_POST["sabor"])){// Verificar se o campo está vazio
                                echo"
                                    <div class='alert alert-warning alert-dismissible fade show' role='alert' style=' background-color: #8B000;'>
                                        <strong>Preencha todos os campos!</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                ";
                            }
                            else{
                                unset($nome,$desc,$preco);
                                $nome = $_POST["sabor"];
                                $desc = $_POST["desc"];
                                $preco = str_replace(",",".",$_POST["preco"]);
                                
                                include "php\conexaoBD.php";    

                                $sql = "INSERT INTO sabor(nome,descricao,status,disponibilidade) VALUES('$nome','$desc','0','')";
                                
                                
                                if (mysqli_query($conn, $sql)) {
                                    echo  "
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong> Cadastro Realizado com Sucesso!!</strong>.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                    ";
                                } else {
                                    $teste = explode(" ",mysqli_error($conn));
                                    
                                    if($teste[0]=="Duplicate"){// Testar se ja estar duplicado
                                        echo"
                                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                            <strong>Já está cadastrado !</strong>
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
                                    }
                                }
                                $conn->close();
                            }
                            
                        ?>

                        <input type="submit" value="Cadastrar" class="btn_cadastrar">
                    </form>
            </div>

            <!----------------------------------------  Tamanho  ---------------------------------------->
            <div class="cadastro_sabor">
                <h1>Cadastro de Tamanho</h1>
                
                <form method="POST" class=campos_cadastro>
                    <label> Tamanho </label> <input type="text" name="tamanho">
                    <label> Preço </label> <input class="money" id="input" size="9" type="text" name="preco"> <br><br> 
                    
                    <?php
                        
                        if(empty($_POST["tamanho"])){// Verificar se o campo está vazio
                            echo"
                                <div class='alert alert-warning alert-dismissible fade show' role='alert' style=' background-color: #8B000;'>
                                    <strong>Preencha todos os campos!</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                            ";
                        }
                        
                        else{
                            $tamanho = $_POST["tamanho"];
                            $preco = str_replace(",",".",$_POST["preco"]);

                            include "php\conexaoBD.php"; 

                            $sql = "INSERT INTO `tamanho`(`nome`, `preco`) VALUES ('$tamanho',$preco)";

                            if (mysqli_query($conn, $sql)) {
                                echo  "
                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong> Cadastro Realizado com Sucesso!!</strong>.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                                ";
                            } else {
                                $teste = explode(" ",mysqli_error($conn));
                                
                                if($teste[0]=="Duplicate"){// Testar se ja estar duplicado
                                    echo"
                                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                        <strong>Já está cadastrado !</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                    ";
                             }
                            }
                            
                            $conn->close();
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



