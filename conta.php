    <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Perfil Atendente</title>

    <link rel="stylesheet" href="css/atendente/gerencia-atendente.css">

       <!------------------------------------------------| Sweet Alert |------------------------------------------------>
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!---------------------------------------------------------------------------------------------------------------->
        
        <!------------------------------------------------| Bootstrap |------------------------------------------------>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!----------------------------------------------------------------------------------------------------------------->

</head>
<body>
    
    <?php include "php/barra-menu.php"; ?> 
    
    

    <div class="geral">
    
            <div class="login">
            <h1 style="margin-top:30px;"> Atualizar Conta </h1><br>  
            
               <form method="post" action="php/atendente/atualizar-conta-atendente.php">

                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" value="<?=$_SESSION['nome']; ?>" placeholder name="nome">
                    <label for="floatingInput">Nome</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="<?=$_SESSION['e-mail']; ?>" placeholder="name@example.com" name="email">
                    <label for="floatingInput">Email</label>
                </div>

                <input type="submit" value="Atualizar" id="btn"><br>
                

                
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

                        if($_SESSION["cad-atendente"] == "sucesso"){
                            echo"
                            <script>
                            Swal.fire(
                                'Atualizado !', 
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
    </div>

</body>
</html>