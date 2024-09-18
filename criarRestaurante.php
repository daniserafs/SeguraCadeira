<?php
include("conexao.php");

$erro = []; // Inicializa $erro como um array vazio

if (isset($_POST["criar"])) {
    
    $nome_Restaurante = $_POST['nome_Restaurante'];
    $CNPJ = $_POST['CNPJ'];
    $fone_Restaurante = $_POST['fone_Restaurante'];
    $resp_Restaurante = $_POST['resp_Restaurante'];
    $email_Restaurante = $_POST['email_Restaurante'];
    $endereco_Restaurante = $_POST['endereco_Restaurante'];
    $tipoCozinha = $_POST['tipoCozinha'];
    $horarioFuncionamento = $_POST['horarioFuncionamento'];
    $capacidadeTotal = $_POST['capacidadeTotal'];
    $numFuncionarios = $_POST['numFuncionarios'];

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
    <h1>Cadastro de Restaurante</h1>

    <form action="" method="post">

    <div class="form-group">
        <label for="nome_Restaurante">Nome do Restaurante</label>
        <input id="nome_Restaurante" class="form-control" placeholder="Nome do Restaurante" name="nome_Restaurante" type="text" required>
    </div>

    <div class="form-group">
        <label for="CNPJ">CNPJ</label>
        <input id="CNPJ" class="form-control" placeholder="CNPJ" name="CNPJ" type="text" required>
    </div>

    <div class="form-group">
        <label for="fone_Restaurante">Telefone</label>
        <input id="fone_Restaurante" class="form-control" placeholder="Telefone" name="fone_Restaurante" type="text" required>
    </div>

    <div class="form-group">
        <label for="resp_Restaurante">Nome do Responsável</label>
        <input id="resp_Restaurante" class="form-control" placeholder="Nome do Responsável" name="resp_Restaurante" type="text" required>
    </div>

    <div class="form-group">
        <label for="email_Restaurante">E-mail</label>
        <input id="email_Restaurante" class="form-control" placeholder="E-mail" name="email_Restaurante" type="email" required>
    </div>

    <div class="form-group">
        <form action="#">
            <label for="lang">Tipo de Cozinha</label>
            <select name="Cozinha" id="Cozinha">
                <option value="select">Selecione</option>
                <option value="br">Brasileira</option>
                <option value="ff">Fast Food</option>
                <option value="jpn">Japonesa</option>
                <option value="mx">Mexicana</option>
                <option value="ita">Italiana</option>
            </select>
        </form>
    </div>

    <div class="form-group">
        <form action="#">
            <label for="lang">Horário de Funcionamento</label>
            <select name="Funcionamento" id="fun">
                <option value="select">Selecione</option>
                <option value="cafe">08:00 - 12:00</option>
                <option value="almoco">11:30 - 15:00</option>
                <option value="jantar">18:00 - 22:00</option>
            </select>
        </form>
    </div>

    
    <div class="form-group">
        <label for="endereco_Restaurante">Endereço</label>
        <input id="endereco_Restaurante" class="form-control" placeholder="Endereço" name="endereco_Restaurante" type="text" required>
    </div>

    <div class="form-group">
        <label for="capacidadeTotal">Capacidade Total</label>
        <input id="capacidadeTotal" placeholder="Capacidade Total" name="capacidadeTotal" type="number" required>
    </div>

    <div class="form-group">
        <label for="numFuncionarios">Número de Funcionários</label>
        <input id="numFuncionarios" placeholder="Número de Funcionários" name="numFuncionarios" type="number" required>
    </div>

        <input name="criar" value="Cadastrar Restaurante" type="submit">
    </form>
</body>
</html>