<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
    <H1>Contato realizado pelo Site.</H1>
    <br>  
    <p><strong>Nome = {{{ $nome }}}</strong></p>
    <p><strong>E-mail = {{{ $email }}}</strong></p>
    <br>
    <H3>{{{ $assunto }}}</H3>
    <hr>
    <p><strong>{{{ $mensagem }}}</strong></p>
    <br>
    <br>
</body>
</html>