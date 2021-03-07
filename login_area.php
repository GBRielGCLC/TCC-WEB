<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>

    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!----------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------------| Sweet Alert |------------------------------------------------>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!---------------------------------------------------------------------------------------------------------------->
    
    <link rel="stylesheet" href="css/atendente/logar.css">

    <title>Login Aréa Registra</title>
</head>
    <?php
        include("php/barra-menu.php");
    ?>
<body>
    <div class=geral>

    
        <div class="login">
        <h1 style="margin-top:30px;">Entrar</h1>
            
            <form method="post" action="php/checar_login.php">

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="login">
                    <label for="floatingInput">Email</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="senha">
                    <label for="floatingPassword">Senha</label>
                </div>

                <input type="submit" value="Logar" id="btn"><br>
                <a id="recu-senha" href="recusenha.php">Esqueceu a senha ?</a>
                
                <?php
                    if(isset($_SESSION["check"])){
                        if($_SESSION["check"]=="vazio"){
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
                        if($_SESSION["check"]=="nao"){
                            echo"
                                <script>
                                Swal.fire(
                                    'Email ou senha incorretos!',
                                    '',
                                    'error'
                                )
                                </script>
                            ";
                        }
                    }
                    unset($_SESSION["check"]);
                ?>
               
            </form>
            
        </div>
        <!--    Fim do Div Login    -->
        
    
    </div>
        
        
</body>
</html>