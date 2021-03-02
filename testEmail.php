<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email</title>
</head>
<body>

  <!--  
    
    $destinatario = "gabriel.gclc@gmail.com";
    $assunto = "teste";
    $mensagem = " <h1> teste </h1>
                <p> ainda testando </p>";
    $cabecalho = "
                  MIME-Version: 1.0\r\n
                  Content-type: text/html; charset=iso-8859-1\r\n";
    mail ($destinatario, $assunto, $mensagem, $cabecalho);
    echo "e-mail enviado com sucesso";
    
-->

        <?php
        // the message
        $msg = "First line of text\nSecond line of text";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        mail("lucas1.stoly@gmail.com","My subject",$msg);
        ?> 
    
</body>
</html>