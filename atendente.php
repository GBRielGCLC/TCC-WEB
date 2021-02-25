<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!------------------------------------------------| Sweet Alert |------------------------------------------------>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!---------------------------------------------------------------------------------------------------------------->
        
        <!------------------------------------------------| Bootstrap |------------------------------------------------>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!----------------------------------------------------------------------------------------------------------------->
        <link rel="stylesheet" href="css/logar.css">
    <title>Criar Perfil Atendente</title>
</head>
<body>

<?php
        include("php/barra-menu.php");
    ?>
<body>
    <div class=geral>

    
        <div class="login">
        <h1 style="margin-top:30px;">Cadastrar</h1>
            
            <form method="post" action="php/atendente/cadastro-atendente.php">
    
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="João Adalberto" name="nome">
                    <label for="floatingInput">Nome</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                    <label for="floatingInput">Email</label>
                </div>

                <div class="form-floating">
                    <input type="password" id="senha" class="form-control" id="floatingPassword" placeholder="Password" name="senha">
                    <label for="floatingPassword">Senha</label>
                </div>
                <div class="form-floating">
                    <input type="password" id="senha" class="form-control" id="floatingPassword" placeholder="Password" name="repeteSenha">
                    <label for="floatingPassword">Repita a Senha</label>
                </div>



                <input type="submit" value="Cadastrar" id="btn"><br>
                
                <?php
                    if (isset($_SESSION["cad-atendente"])) {
                        if($_SESSION["cad-atendente"] == "vazio"){
                            echo"
                            <script>
                            Swal.fire(
                                'Preencha Todos os Campos !',
                                '',
                                'warning'
                            )
                            </script>
                            ";
                        }
                        if($_SESSION["cad-atendente"] == "diferente"){
                            echo"
                            <script>
                            Swal.fire(
                                'As Senhas Estão Diferentes!',
                                '',
                                'danger'
                            )
                            </script>
                            ";
                        }
                        if($_SESSION["cad-atendente"] == "sucesso"){
                            echo"
                            <script>
                            Swal.fire(
                                'Cadastrado !', 
                                '',
                                'success',
                            )
                            </script>
                            ";
                        }
    
                    }
                    unset($_SESSION["cad-atendente"]);
                ?>
               
            </form>
            
        </div>
        <!--    Fim do Div Login    -->
        
    
    </div>
        
       
</body>
</html>
<script src="js/sweet-alert.js"></script>