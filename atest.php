<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testeeeeeeeeee</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!------------------------------------------------| Bootstrap |------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!------------------------------------------------------------------------------------------------------------------>
</head>
<body>
Check me: <input id="test" type="checkbox" />


<script>

$('#test').click(function() {
   // alert("Checkbox state (method 1) = " + $('#test').prop('checked'));
    alert("Checkbox state (method 2) = " + $('#test').is(':checked'));
   
    $.ajax({
				url:'enviar.php',
				method: 'POST',
				data: {nome: nome, fone:fone, cidade:cidade},
				success: function(result) {
					$('form').trigger("reset");
					
			});

});

</script>


</body>
</html>
