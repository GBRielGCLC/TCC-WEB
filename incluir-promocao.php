<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> Incluir Promoção</title>
    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!----------------------------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="css/incluir-promocao.css">
</head>
<?php include "php/barra-menu.php" ?>
<body>
    <div class="geral">

        <div class="pizza">
            <h4> Tamanhos </h4>
            <label> <input type="checkbox">  Grande</label><br>
            <label> <input type="checkbox">  Família</label><br>
        </div>

        <div class="sabor">
            <h4> Sabor </h4>
            <label> <input type="checkbox">  Portuguesa </label><br>
            <label> <input type="checkbox">  Baiana </label><br>

        </div>

        <div class="bebida">
            <h4> Bebidas </h4>
            <label> <input type="checkbox">  Guaraná Antartica 1L </label><br>
            <label> <input type="checkbox">  Fanta Laranja 1L</label><br>
        </div>

        <div class="valor">
            <center>
                <h4> Promoção</h4>
                <form>
                    <label> Nome : <input type="text"> </label>
                    <label>Valor : <input type="text"><br> </label>
                    <input type="submit" class="btn" value="Salvar">
                </form>
            </center>
        </div>
    </div>

    <?php include "rodape.html";?>
</body>
</html>