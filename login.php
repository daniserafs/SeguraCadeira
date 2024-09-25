<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Segura Cadeira</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div>
        <img src="img/login3.png" alt="Filé de Peixe" class="login-img">
        </div>
        <div class="form-wrapper">
            <img src="img/logo.png" alt="Segura Cadeira" class="logo">
            <h2>Entre e reserve com facilidade nos melhores restaurantes da cidade.</h2>
            <form action="" method="get">
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input placeholder="Seu e-mail" type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Senha</label>
                    <input placeholder=" Sua senha" type="password" id="password" name="password" required>
                </div>

                <div class="input-group">
                    <input class="button" name="logar" value="Login" type="submit">
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="conectado" name="conectado">
                    <label for="conectado">Manter conectado</label>
                </div>
            </form>
        </div>
    </div>
</body>
<html>