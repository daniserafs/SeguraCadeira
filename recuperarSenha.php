<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recuperação de Senha</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=NATS:wght@400&display=swap"
      rel="stylesheet"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "NATS", sans-serif;
        background-color: #f8f8f8;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .container {
        display: flex;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 900px;
        height: 600px;
      }

      .image-side {
        flex: 1;
        background-image: url("img/flour.png");
        background-size: cover;
        background-position: center;
      }

      .form-side {
        flex: 1;
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background-color: white;
      }

      .form-side img {
        width: 200px;
        align-self: flex-start; /* Coloca a logo no topo */
        margin-bottom: 20px;
      }

      .form-side h2 {
        font-size: 18px;
        text-align: left; /* Centraliza o texto abaixo da logo */
        font-weight: normal;
        line-height: 1.5;
        margin-bottom: 30px;
      }

      .form-side input {
        width: 100%;
        padding: 10px;
        border: none;
        border-bottom: 2px solid black;
        margin-bottom: 40px;
        font-size: 16px;
        outline: none;
      }

      .form-side button {
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 25px;
        background-color: #ff6ec7;
        color: black;
        font-size: 18px;
        cursor: pointer;
        margin-bottom: 40px;
        font-family: "NATS", sans-serif;
      }

      .form-side button:hover {
        background-color: #e55eb0;
      }

      .footer {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        font-size: 14px;
      }

      .footer span {
        color: black;
        font-weight: bold;
        margin-right: 10px;
      }

      .footer .separator {
        width: 1px;
        height: 20px;
        background-color: black;
        margin: 0 10px;
      }

      .footer i {
        font-size: 24px;
        color: black;
        margin-left: 15px;
      }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="image-side"></div>

      <div class="form-side">
        <img src="img/logo.png" alt="Logo Segura a Cadeira" />
        <h2>Esqueceu sua senha?<br />Recupere agora mesmo!</h2>
        <form action="recuperarSenha.php" method="POST">
          <input
            type="email"
            name="email"
            placeholder="Digite seu e-mail"
            required
          />
          <button type="submit">Recuperar senha</button>
        </form>

        <div class="footer">
          <span>Siga-nos!</span>
          <div class="separator"></div>
          <a href="https://www.instagram.com" target="_blank">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="https://wa.me/seunumero" target="_blank">
            <i class="fab fa-whatsapp"></i>
          </a>
          <a href="https://www.facebook.com" target="_blank">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
// Incluir o arquivo de conexão
include('conexao.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Preparar a consulta para verificar se o email existe no banco de dados
    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Se o email existir no banco de dados
    if ($result->num_rows > 0) {
        // Gerar um token de recuperação de senha
        $token = bin2hex(random_bytes(50));

        // Atualizar o token de recuperação no banco de dados
        $stmt = $mysqli->prepare("UPDATE usuarios SET token_recuperacao = ? WHERE email = ?");
        $stmt->bind_param('ss', $token, $email);
        $stmt->execute();

        // Criar o link de recuperação de senha
        $link_recuperacao = "https://seusite.com/redefinirSenha.php?token=" . $token;

        // Enviar e-mail com o link de recuperação (ajuste a função mail conforme necessário)
        mail($email, "Recuperação de Senha", "Clique no link para redefinir sua senha: " . $link_recuperacao);

        echo "Um link de recuperação de senha foi enviado para o seu e-mail.";
    } else {
        echo "Este e-mail não está registrado.";
    }
}
?>