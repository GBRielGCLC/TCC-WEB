<html>
    

    <head>
        <meta charset="UTF-8">
        <title>Incluir Cardápio</title>
        <!------------------------------------------------| Campo monetário |------------------------------------------------>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>´
        <script src="js/money.js"></script>
        <!------------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------------| Bootstrap |------------------------------------------------>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!----------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------------| Sweet Alert |------------------------------------------------>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!---------------------------------------------------------------------------------------------------------------->
        <link rel="stylesheet" type="text/css" href="css/cadastro-cardapio.css">
    </head>

            <?php include ('php/barra-menu.php') ?>
    <body>
        <div class="principal">  
            <!--Para Cadastrar -->
            <a id="cad-sabor"></a>
            <div class="cadastro_sabor">
                <h1>Cadastro de Sabores</h1>
                    <form method="POST" class=campos_cadastro action="php\cardapio\cadastro-sabor.php">

                        <label> Sabor </label> <input type="text" name="sabor" size="51"> <br>
                        <label> Descrição </label> <input type="text" name="desc" size="51"> <br>
                        <label> Valor Adicional </label> <input class="money" id="input" size="6" type="text" name="add"> 
                        
                        <hr>
                        <h2 class="texto-tamanho"> Tamanho que o sabor está disponível </h2> 
                    
                        <div class="lista_tamanhos">

                            <?php

                                include "php\conexaoBD.php";

                                $sql = "SELECT nome,idPizza FROM `tamanho` Where `status` ='on' ORDER BY preco ASC";
                                $result = $conn->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    echo "<label style='margin-bottom: 2%'> <input type='checkbox' id='select-all'> Todas as Opções </label> <br>";
                                    while($row = $result->fetch_assoc()) {
                                        $nome_tamanho = $row["nome"];
                                        $idPizza = $row["idPizza"];
                                        
                                        echo "<label> <input type='checkbox' name='tamanho[]' value='$idPizza'> $nome_tamanho </label>";
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
                                    <script>
                                    Swal.fire(
                                        'Preencha Todos os Campos',
                                        '',
                                        'warning'
                                    )
                                    </script>
                                    ";
                                }
                                if($_SESSION["cad-sabor"]=="sucesso"){
                                    echo"
                                    <script>
                                    Swal.fire(
                                        'Cadastrado Com Sucesso',
                                        '',
                                        'success'
                                    )
                                    </script>
                                    ";
                                }
                                if($_SESSION["cad-sabor"]=="duplicado"){
                                    echo"
                                    <script>
                                    Swal.fire(
                                        'Já está cadastrado',
                                        '',
                                        'error'
                                    )
                                    </script>
                                    ";
                                }
                                unset($_SESSION["cad-sabor"]);
                            }
                            
                        ?>

                        <input type="submit" value="Cadastrar" class="btn_cadastrar">
                    </form>
            </div>

            <!--------------------------------------------------------------------------------  Tamanho  -------------------------------------------------------------------------------->
            <a id="cad-tamanho"><!-- Trazer de volta para aqui --></a>
            <div class="cadastro_sabor">
                <h1>Cadastro de Tamanho</h1>
                
                <form method="POST" class=campos_cadastro action="php\cardapio\cadastro-tamanho.php">

                    <label class="labelTam"> Tamanho </label> <input type="text" size="51" name="tamanho"> <br>
                    <label class="labelTam"> Preço </label> <input type="text" name="preco" class="money" size="6"> <br>
                    <label class="labelTam"> Quantidade de Sabores </label> <input type="number" name="qtdeSabor" min="1" max='6'> <br> <br>
                    
                    <?php

                        if(isset($_SESSION["cad-tamanho"])){
                            if($_SESSION["cad-tamanho"]=="vazio"){
                                echo"
                                <script>
                                Swal.fire(
                                    'Preencha Todos os Campos',
                                    '',
                                    'warning'
                                )
                                </script>
                                ";
                            }
                            if($_SESSION["cad-tamanho"]=="sucesso"){
                                echo"
                                <script>
                                Swal.fire(
                                    'Cadastrado Com Sucesso',
                                    '',
                                    'success'
                                )
                                </script>
                                ";
                            }
                            // ajeitar para verificar se já existe cadastraddo
                            if($_SESSION["cad-tamanho"]=="duplicado"){
                                echo"
                                    <script>
                                    Swal.fire(
                                        'Ja está cadastrado',
                                        '',
                                        'error'
                                    )
                                    </script>
                                ";
                            }
                            unset($_SESSION["cad-tamanho"]);
                        }
                    ?>

                    <input type="submit" value="Cadastrar" class="btn_cadastrar">
                </form>
            </div>

            <a id="cad-bebida"><!-- Trazer de volta para aqui --></a>
            <div class="cadastro_sabor">
                <h1>Cadastro de Bebida</h1>
                
                <form method="POST" class=campos_cadastro action="php\cardapio\cadastro-bebida.php">

                    <label> Nome </label> <input type="text" size="51" name="nomeBebida"> <br>
                    <label> Preço </label> <input type="text" name="preco" class="money" size="6">
                    
                    <?php
                        //alterar
                        if(isset($_SESSION["cad-bebida"])){
                            if($_SESSION["cad-bebida"]=="vazio"){
                                echo"
                                <script>
                                Swal.fire(
                                    'Preencha Todos os Campos',
                                    '',
                                    'warning'
                                )
                                </script>
                                ";
                            }
                            if($_SESSION["cad-bebida"]=="sucesso"){
                                echo"
                                <script>
                                Swal.fire(
                                    'Cadastrado Com Sucesso',
                                    '',
                                    'success'
                                )
                                </script>
                                ";
                            }
                            if($_SESSION["cad-bebida"]=="duplicado"){
                                echo"
                                    <script>
                                    Swal.fire(
                                        'Ja está cadastrado',
                                        '',
                                        'error'
                                    )
                                    </script>
                                ";
                            }
                            
                            // ajeitar
                            unset($_SESSION["cad-bebida"]);
                        }
                    ?>

                    <input type="submit" value="Cadastrar" class="btn_cadastrar">
                </form>
            </div>

        </div> <!-- div GERAL -->

        <?php include "rodape.html"; ?>      
    </body>

</html>
<script>
    // Checar todas as checkbox
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    //Deschecar select all quando alguma for descelecionada
    $("input[type=checkbox]").click(function() {
        if (!$(this).prop("checked")) {
            $("#select-all").prop("checked", false);
        }
    });
    
</script>

