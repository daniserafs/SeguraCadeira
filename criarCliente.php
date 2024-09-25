
<?php
include("conexao.php");

$erro = []; // Inicializa $erro como um array vazio

if (isset($_POST["criar"])) {

    $nome = $mysqli->escape_string($_POST["nome"]);
    $email = $mysqli->escape_string($_POST["email"]);
    $senha = $mysqli->escape_string($_POST["senha"]);

    // Verifica se algum campo está vazio
    if (empty($nome) || empty($email) || empty($senha)) {
        $erro[] = "Todos os campos são obrigatórios.";
        echo "Erro: Todos os campos são obrigatórios.<br>";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro[] = "E-mail inválido";
        echo "Erro: E-mail inválido.<br>";
    }

    // Verifica se o e-mail já está no banco de dados
    $sql = "SELECT * FROM tbl_cliente WHERE email_Cliente = '$email'";
    $result = $mysqli->query($sql);
    if ($result === false) {
        die("Erro na consulta: " . $mysqli->error);
    }

    if ($result->num_rows > 0) {
        $erro[] = "E-mail já cadastrado";
        echo "Erro: E-mail já cadastrado.<br>";
    }

    // Se não houver erros, insere o novo usuário no banco de dados
    if (count($erro) == 0) {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT); // Hash da senha

        // Prepara a consulta SQL
        $stmt = $mysqli->prepare("INSERT INTO tbl_cliente (nome_Cliente, email_Cliente, senha_Cliente) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Erro ao preparar a consulta: " . $mysqli->error);
        }

        // Vincula os parâmetros à consulta preparada
        if ($stmt->bind_param("sss", $nome, $email, $senha_hash) === false) {
            die("Erro ao vincular os parâmetros: " . $stmt->error);
        }

        // Executa a consulta preparada
        if ($stmt->execute() === false) {
            die("Erro ao executar a consulta: " . $stmt->error);
        }

        echo "Sua conta foi criada com sucesso!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Segura Cadeira</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <img src="img/logo.png" alt="Segura Cadeira" class="logo">
            <h2>CADASTRE-SE</h2>
            <form action="" method="post">
                <div class="input-group">
                    <label for="name">Nome</label>
                    <input placeholder="Seu nome" type="text" id="name" name="nome" required>
                </div>
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input placeholder="Seu e-mail" type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Senha</label>
                    <input placeholder=" Sua senha" type="password" id="password" name="senha" required>
                </div>
                <div class="input-group">
                    <label for="confirm_password">Confirmar Senha</label>
                    <input placeholder=" Confirme sua senha " type="password" id="confirm_password" name="confirma_senha" required>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Concordo com os <a href="#">Termos de Serviço</a></label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="news" name="news">
                    <label for="news">Aceito receber notícias</label>
                </div>
                <input class="btn" name="criar" type="submit" value="Criar conta">
            </form>
            <p>Já tem uma conta? <a href="login.php">Faça Login</a></p>
        </div>
        <div class="right-gradient"></div> <!-- Gradiente à direita -->
    </div>
</body>

</html>