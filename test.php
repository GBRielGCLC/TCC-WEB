<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <!------------------------------------------------| Bootstrap |------------------------------------------------>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <!------------------------------------------------------------------------------------------------------------------>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<?php
$cardapio = "Exibir";
$check = "checked";
echo "
<div class='form-check form-switch'>
  <label class='form-check-label' for='flexSwitchCheckDefault' id='1'>
    <input class='form-check-input' type='checkbox' id='i1' $check>
    <span id='s1'> $cardapio </span> 
  </label>
</div>

<div class='form-check form-switch'>
  <label class='form-check-label' for='flexSwitchCheckDefault' id='2'>
    <input class='form-check-input' type='checkbox' id='i2' $check>
    <span id='s2'> $cardapio </span> 
  </label>
</div>

<div class='form-check form-switch'>
  <label class='form-check-label' for='flexSwitchCheckDefault' id='3'>
    <input class='form-check-input' type='checkbox' id='i3' $check>
    <span id='s3'> $cardapio </span> 
  </label>
</div>
";
?>
</body>
</html>

<script>
  $(document).ready(function(){

  $(function () {
    $('label').click(function () {
      var id = $(this).attr('id');
      
      $('#'+id).click(function () {
        var checked = $('#i'+id, this).is(':checked');
        var cardapio;
        if(checked==true){
          cardapio = "Exibir";
        }
        else{
          cardapio = "Ocultar"
        }
        $('#s'+id, this).text(cardapio ? cardapio : cardapio);
      });
    });
  });

  });
  </script>
