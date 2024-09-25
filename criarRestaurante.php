<?php
include("conexao.php");

$erro = []; // Inicializa $erro como um array vazio

if (isset($_POST["criar"])) {
    
    $nome_Restaurante = $mysqli->escape_string($_POST['nome_Restaurante']);
    $CNPJ = $mysqli->escape_string($_POST['CNPJ']);
    $fone_Restaurante = $mysqli->escape_string($_POST['fone_Restaurante']);
    $resp_Restaurante = $mysqli->escape_string($_POST['resp_Restaurante']);
    $email_Restaurante = $mysqli->escape_string($_POST['email_Restaurante']);
    $endereco_Restaurante = $mysqli->escape_string($_POST['endereco_Restaurante']);
    $tipoCozinha = $mysqli->escape_string($_POST['tipoCozinha']);
    $horarioFuncionamento = $mysqli->escape_string($_POST['horarioFuncionamento']);
    $capacidadeTotal = $mysqli->escape_string($_POST['capacidadeTotal']);
    $numFuncionarios = $mysqli->escape_string($_POST['numFuncionarios']);
    $senha_Restaurante = $mysqli->escape_string($_POST["senha_Restaurante"]);

    // Verifica se algum campo está vazio
    if (empty($resp_Restaurante) || empty($email_Restaurante) || empty($senha_Restaurante)) {
        $erro[] = "Todos os campos são obrigatórios.";
        echo "Erro: Todos os campos são obrigatórios.<br>";
    }
    if (!filter_var($email_Restaurante, FILTER_VALIDATE_EMAIL)) {
        $erro[] = "E-mail inválido";
        echo "Erro: E-mail inválido.<br>";
    }

    // Verifica se o e-mail já está no banco de dados
    $sql = "SELECT * FROM tbl_restaurante WHERE email_Restaurante = '$email_Restaurante'";
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
        $senha_hash = password_hash($senha_Restaurante, PASSWORD_DEFAULT); // Hash da senha

        // Prepara a consulta SQL
        $stmt = $mysqli->prepare("INSERT INTO tbl_restaurante (resp_Restaurante, email_Restaurante, senha_Restaurante) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Erro ao preparar a consulta: " . $mysqli->error);
        }

        // Vincula os parâmetros à consulta preparada
        if ($stmt->bind_param("sss", $resp_Restaurante, $email_Restaurante, $senha_hash) === false) {
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

    <form action="" method="post">
    <div class="container">
        <div class="container">
            <div class="form-wrapper">
                <img src="img/logo.png" alt="Segura Cadeira" class="logo">
                <h2>CADASTRE SEU RESTAURANTE</h2>

                <div class="input-group">
                <label for="nome_Restaurante">Nome do Restaurante</label>
                <input id="nome_Restaurante" placeholder="Nome do Restaurante" name="nome_Restaurante" type="text" required>
                </div>

                <div class="input-group">
                <label for="CNPJ">CNPJ</label>
                <input id="CNPJ" placeholder="CNPJ" name="CNPJ" type="number" required>
             </div>

             <div class="input-group">
                <label for="fone_Restaurante">Telefone</label>
                <input id="fone_Restaurante" placeholder="Telefone" name="fone_Restaurante" type="number" required>
                </div>
                <div class="input-group">
                <label for="resp_Restaurante">Nome do Responsável</label>
                <input id="resp_Restaurante" placeholder="Nome do Responsável" name="resp_Restaurante" type="text" required>
                </div>
                <div class="input-group">
                <label for="email_Restaurante">E-mail</label>
                <input id="email_Restaurante" placeholder="E-mail" name="email_Restaurante" type="email" required>
                </div>
                <div class="input-group">
                <label for="password">Senha</label>
                <input id="senha_Restaurante" placeholder="Senha" name="senha_Restaurante" type="password" required>
                </div>
                <div class="input-group">
                <label for="confirmar-senha">Confirmar Senha</label>
                <input id="confirmar_password" placeholder="Confirme sua senha" name="confirma_senha" type="password" required>
            </div>
        </div>
        <div class="container">
            <div class="form-wrapper">
                <div class="input-group">
                <label for="endereco_Restaurante">Endereço</label>
                <input id="endereco_Restaurante" placeholder="Endereço" name="endereco_Restaurante" type="text" required>
                </div>
                <div class="input-group">
            
                <label for="tipoCozinha">Tipo de Cozinha</label>
                <select name="tipoCozinha" id="tipoCozinha" type="select">
                    <option value="select">Selecione</option>
                    <option value="br">Brasileira</option>
                    <option value="ff">Fast Food</option>
                    <option value="jpn">Japonesa</option>
                    <option value="mx">Mexicana</option>
                    <option value="ita">Italiana</option>
                </select>
                </div>
                <div class="input-group">
                <label for="horarioFuncionamento">Horário de Funcionamento</label>
                <input  id="horarioFuncionamento" placeholder="Horario de funcionamento" name="horarioFuncionamento" type="text">
                </div>
                <div class="input-group">
                <label for="capacidadeTotal">Capacidade Total</label>
                <input id="capacidadeTotal" placeholder="Capacidade Total" name="capacidadeTotal" type="number" required>
                </div>
                <div class="form-group">
                <label for="numFuncionarios">Número de Funcionários</label>
                <input id="numFuncionarios" placeholder="Número de Funcionários" name="numFuncionarios" type="number" required>
                </div>
                <div class="checkbox-group">
                <input type="checkbox" id="termosServico" name="termosServico" required>
                <label for="termosServico">Concordo com os <a href="#">Termos de Serviço</a></label>
                </div>
                <div class="checkbox-group">
                <input type="checkbox" id="termosCompromisso" name="termosCompromisso" required>
                <label for="terms">Concordo com o <a href="#">Termo de Compromisso</a></label>
                </div>
                <div class="checkbox-group">
                <input type="checkbox" id="news" name="news">
                <label for="news">Aceito receber notícias</label>
                </div>
            </div>
        </div>
        <div>
            <input class="button" name="criar" value="Cadastrar Restaurante" type="submit">
        </div>
    </div>
    </form>
</body>
</html>
