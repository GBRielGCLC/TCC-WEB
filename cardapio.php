<html lang="pt-br">
<head>
    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!------------------------------------------------------------  ------------------------------------------------------>
    <!-------------------------------------------------------- Fonte --------------------------------------------------------------->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@1,300&display=swap" rel="stylesheet">
    <!------------------------------------------------------------------------------------------------------------------------------>
    <link rel="stylesheet" type="text/css" href="css/cardapio.css">
</head>
<body>
              <?php include "php/barra-menu.php"; ?>    
              
        
           <div class="container">
              <h1>Sabores</h1>
                <?php
                    
                    include "php\conexaoBD.php";

                    $sql = "SELECT * FROM `sabor` WHERE status='on'";
                    
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $nome = $row["nome"];
                            $desc = $row["descricao"];/*
                            $qtdeSabor = $row["qtdeSabor"];
                            $idPizza = $row["idPizza"];
                            $statusBD = $row["status"];*/
                


                            echo"
                            
                          <div class='card' style='width: 18rem; margin-left: 3%; margin-top: 3%; float: left;'>
                            <img src='imagens/pizza' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title'>$nome</h5>
                              <hr>
                              <p class='card-text'>$desc</p>
                              <a href='#' class='btn btn-primary'>Go somewhere</a>
                            </div>
                          </div>";
                        
                     /* ------------------ FIM DO Sabpres ---------------------*/ 


                    }
                }  
                ?>
             </div>   
                    
</body>
</html>