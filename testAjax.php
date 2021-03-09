<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testeeeeeeeeee</title>
<!------------------------------------------------| Bootstrap |------------------------------------------------>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!------------------------------------------------------------------------------------------------------------------>
    <script src="jquer"></script>

</head>
<body>
<div class='form-check form-switch'>
    <label class='form-check-label'>
        <input class='form-check-input' type='checkbox' id='escolha' onclick='atualizarSwitch()'>
        <span></span>
    </label>
</div>

<script>


function atualizarSwitch(){
    var escolha = document.getElementById('escolha');   
    var status;
    if (document.getElementById('escolha').checked) {
        status = "on";
    }
    else{
        status = "off";
    }
    //window.location.href = 'testAjaxBD.php?status='+status;
    $.ajax({
        url:'testAjax.php',
        method: 'POST',
        data: {escolha:status},
        dataType: 'json'
    }).done(function(result){
        console.log(result);
    });
    
}
</script>

    
</body>
</html>