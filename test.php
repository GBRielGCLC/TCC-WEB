<html>
    

    <head>
        <meta charset="UTF-8">
        <title>Cardápio</title>
        <!------------------------------------------------| Campo monetário |------------------------------------------------>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
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

        <td class="p-0 d-xl-table-cell d-none">
        <ul class="p-0 m-0">
            <li *ngFor='let item of product.items' class="def-number-input number-input d-flex justify-content-center">
                <input type="number" [(ngModel)]="item.quantity" (change)="this.updateCart(item)" style="height: 45px; line-height: 45px" min="0"> 
            </li>
        </ul>
    </td>
         
    </body>

</html>
<script>

</script>

