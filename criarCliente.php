<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Segura Cadeira</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <img src="img/logo.png" alt="Segura Cadeira" class="logo">
            <h2>CADASTRE-SE</h2>
            <form action="register.php" method="POST">
                <div class="input-group">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <label for="confirm_password">Confirmar Senha</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Concordo com os <a href="#">Termos de Serviço</a></label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="news" name="news">
                    <label for="news">Aceito receber notícias</label>
                </div>
                <button type="submit" class="btn">Criar Conta</button>
            </form>
            <p>Já tem uma conta? <a href="login.php">Faça Login</a></p>
        </div>
        <div class="right-gradient"></div> <!-- Gradiente à direita -->
    </div>
</body>
</html>