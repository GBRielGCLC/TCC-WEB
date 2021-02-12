<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!------------------------------------------------| css |------------------------------------------------>
    <link rel="stylesheet" href="css/logar.css">

    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!----------------------------------------------------------------------------------------------------------------->

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
                <a id="recu-senha" href="#">Esqueceu a senha ?</a>
                
                <?php
                    if(isset($_SESSION["logou"]) && $_SESSION["logou"]==2){
                        echo"
                        <div class='alert alert-danger alert-dismissible fade show' id='alerta' role='alert'>
                            <strong> Email ou senha incorretos! </strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                    }
                ?>
               
            </form>
            
        </div>
        <!--    Fim do Div Login    -->
        
    
    </div>
        
        
</body>
</html>