<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title> Excluir Atendente </title>

    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!----------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------------| Data Table |------------------------------------------------>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="js/dataTable.js"></script>
    <!-------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------------| Sweet Alert |------------------------------------------------>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweet-alert.js"></script>
    <!---------------------------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="css/atendente/excluir-atendente.css">
</head>

    <?php include "php/barra-menu.php" ?>

<body>
    
    <div class="geral">
        <h1>Excluir Atendente</h1>

        <div id="tabela">
            <table class="tabela">
                <thead>
                    <tr>
                        <th> Nome </th>
                        <th> Email </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "php/conexaoBD.php";
                        
                        $sql = "SELECT * FROM `perfil` where `adm`='0' ORDER BY nome ASC";
                        $result = $conn->query($sql);   
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $nome = $row["nome"];
                                $email = $row["e-mail"];
                                $idPerfil = $row["idPerfil"];
                                
                                echo"
                                <tr>
                                    <td> $nome </td>
                                    <td> $email </td>
                                    <td style='text-align:right;'> <button type='button' class='btn btn-danger btr-sm' onclick='exc_atendente(this.id)' id='$idPerfil'> Excluir </button> </td>
                                </tr>
                                ";
                            }
                        }

                        if (isset($_SESSION["exc"])) {
                            if ($_SESSION["exc"]=="sucesso") {
                                echo"
                                <script>
                                Swal.fire(
                                    'Excluído!', 
                                    '',
                                    'success',
                                )
                                </script>
                                ";
                            }
                            unset($_SESSION["exc"]);
                        }

                        
                    ?>
                </tbody>
                
            </table>
        </div>

    </div>
    
    <?php include "rodape.html"; ?>
</body>
</html>