<!DOCTYPE html>
<html lang="Pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/formato.css">

    <title>Pedido Online</title>
</head>
<body>

    <form method="POST">
        <input type="text" name="nome">
        <input type="text" name="fone">
        <button onClick=" "> Entrega </button>
        <input type="submit" value="Retirada">
                

    </form>

    <?php

        if(isset($_POST["nome"]) && isset($_POST["fone"])){
            $nome = $_POST["nome"];
            $fone = $_POST["fone"];
        }
        
    ?>

    <script>
        var entrega = document.querySelector("Entrega");

        btnEntrega.addEventListener("click", function() {
        <a href="Entrega.php"></a>
        })

    </script>
</body>
</html>