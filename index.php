<html>
    <head>
        <title> Pizzaria do Careca</title>
        <meta charset="UTF-8">

        <!-------------------------| CSS |------------------------->
        <link rel="stylesheet" type="text/css" href="css\index.css">
        <!--------------------------------------------------------->


        <!------------------------------------------------| Bootstrap |------------------------------------------------>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!----------------------------------------------------------------------------------------------------------------->

    <head>
    <body>
    
    <div id="geral">
        
        <?php
            include ("php/barra-menu.php");
        ?>

        <div id = "conteudo" style="margin-top:3%;">

            <div id="conteudo_principal">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="imagens\Pizzaria do Careca (1).png" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="imagens\Pizzaria do Careca (1).png" style="width:100%;">
                        </div>
                        
                        <div class="item">
                            <img src="imagens\Pizzaria do Careca (1).png" style="width:100%;">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
                
            

            <div id="conteudo_Onde">
                <a name="onde_encontrar"></a>
                <h1 class="titulo_onde"> Onde Nos Encontrar</h1>
                <iframe id="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3917.81812555735!2d-37.102369985198074!3d-10.901422792236762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71ab35ae0944521%3A0x59cc70c675335bbe!2sPizzaria%20do%20Careca!5e0!3m2!1spt-BR!2sbr!4v1592503562638!5m2!1spt-BR!2sbr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>

    </div><!--Fim da DIV geral -->
    
    <?php include("footer-with-button-logo.html"); ?>

</body>
</html>