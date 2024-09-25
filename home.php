<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reserva de Restaurante</title>
    <link href="https://fonts.googleapis.com/css2?family=NATS&display=swap" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: 'NATS', sans-serif;
        background-color: #f8f8f8;
        color: #000; /* Texto em preto */
      }

      header {
        background-color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      }

      header img {
        width: 120px;
      }

      .location {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .location img {
        width: 24px;
      }

      .greeting {
        font-weight: 600;
        color: #000; /* Texto em preto */
      }

      .search-section {
  background: linear-gradient(90deg, #cb0000 0%, #ff5ea9 100%);
  padding: 20px;
  text-align: center;
  color: white;
}
.auth-buttons {
  display: flex;
  gap: 10px; /* Espaço entre os botões */
  align-items: center;
}

.auth-buttons a {
  background-color: #0238ed;
  color: white;
  padding: 10px 15px;
  border-radius: 5px;
  text-decoration: none;
  font-weight: bold;
  cursor: pointer;
}

.auth-buttons a:hover {
  background-color: #002bb5; /* Cor ao passar o mouse */
}


.search-section h1 {
  font-size: 28px;
  margin-bottom: 20px;
  color: black;
}

.aleatorio {
 font-family: 'NATS', sans-serif;
  display: flex;
  justify-content: space-between; /* Espaçamento entre os inputs */
  gap: 0px; /* Espaçamento horizontal entre os inputs */
  input[type="date"]::-webkit-calendar-picker-indicator {
  display: none;
  input[type="date"], input[type="time"] {
  font-family: 'NATS', sans-serif; /* Aplica a fonte NATS */
  font-size: 16px; /* Ajusta o tamanho da fonte */
  color: black; /* Cor do texto */
}

}

input[type="time"]::-webkit-calendar-picker-indicator {
  display: none;
}
}

.search-bar {
  display: flex;
  justify-content: center;
  gap: 10px;
  align-items: center;
}

.input-wrapper{
    gap: 0px;
}

.input-wrapper, .input-wrapper-search {
  display: flex;
  align-items: center;
  background-color: white;
  border: 2px solid black;
  border-radius: 5px;
  padding: 10px;
  max-width: 250px;
}

.input-wrapper-search {
  width: 100%;
}

.input-wrapper i, .input-wrapper-search i {
  margin-right: 8px;
  color: black;
}

.input-wrapper input, .input-wrapper-search input {
  border: none;
  outline: none;
  font-size: 16px;
  color: black;
  width: 100%;
}

.input-wrapper input::placeholder, .input-wrapper-search input::placeholder {
  color: black;
}

.reserve-button {
  background-color: #cb0000;
  color: white;
  font-weight: 600;
  padding: 12px 20px;
  border: 1px black solid;
  border-radius: 5px;
  cursor: pointer;
}

.reserve-button:hover {
  background-color: #a50000;
}



      .search-bar button:hover {
        background-color: #a50000;
      }

      .restaurant-list {
        display: flex;
        justify-content: space-around;
        margin: 40px auto;
        width: 90%;
        max-width: 1200px;
      }

      .restaurant-card {
        background-color: white;
        width: 220px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 15px;
        color: #000; /* Texto em preto */
      }

      .restaurant-card img {
        width: 100%;
        height: 140px;
        object-fit: cover;
        border-radius: 8px;
      }

      .restaurant-card h3 {
        margin: 10px 0;
        font-size: 18px;
        color: #333;
      }

      .restaurant-card p {
        color: grey;
        font-size: 14px;
      }

      .restaurant-card .mesas {
        color: red;
        font-weight: 600;
      }

      .stars {
        display: flex;
        justify-content: center;
        margin: 10px 0;
      }

      .stars i {
        color: #f0c14b; /* Estrelas douradas */
        margin-right: 4px;
      }

      .highlight {
        background-color: #ffe3e8;
        padding: 40px 20px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
      }

      .highlight img {
        width: 220px;
        border-radius: 20px;
        text-align: center;
        padding: 15px;
        color: #000; /* Texto em preto */
}



      .highlight h2 {
        margin-top: 15px;
        font-size: 24px;
        color: #000; /* Texto em preto */
      }

      .highlight h2 {
    text-align: center; /* Centraliza o texto */
    font-size: 24px; /* Ajusta o tamanho da fonte, se necessário */
    margin-bottom: 10px; /* Espaçamento entre o texto e a imagem */
    color: #000; /* Deixa o texto preto */
}

      .highlight p {
        margin: 15px 0;
        font-size: 16px;
        color: #000; /* Texto em preto */
        text-align: center;
        width: 500px;
      }

      .highlight .reserve-button {
        background-color: #0238ed;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
      }

      .highlight .reserve-button:hover {
        background-color: #002bb5;
      }

      .restaurant-section {
        margin-bottom: 40px;
      }

      h2.section-title {
        font-size: 24px;
        margin: 20px 0;
        text-align: center;
        color: #000; /* Texto em preto */
      }
    </style>
  </head>
  <body>
    <header>
      <img src="img/logo.png" alt="Logo Segura a Cadeira" />
      <div class="location">
        <img src="img/localizacao.jpg" alt="Ícone de Localização" />
        <span>São Paulo</span>
      </div>
      <div class="auth-buttons">
  <a href="login.html" class="login-button">Login</a>
  <a href="criarCliente.php" class="cadastro-button">Cadastro</a>
</div>

    </header>

    <!-- Seção de pesquisa -->
    <div class="search-section">
  <h1>Onde vai ser hoje?</h1>
  <div class="search-bar">


  <div class = "aleatorio">
    <div class="input-wrapper">
      <i class="fas fa-clock"></i>
      <input type="time" id="hora" value="19:00"  />
    </div>

    <div class="input-wrapper">
      <i class="fas fa-calendar-alt"></i>
      <input type="date" id="data" value="2024-09-25" />
    </div>

    <div class="input-wrapper">
      <i class="fas fa-user-friends"></i>
      <input
        type="number"
        id="quantidade"
        placeholder="Quantas pessoas?"
        min="1"
        max="10"
      />
    </div>
</div>

    <div class="input-wrapper-search">
      <i class="fas fa-search"></i>
      <input
        type="text"
        placeholder="Procure por restaurantes, cozinhas, bairros..."
        id="pesquisa"
      />
    </div>

    <button class="reserve-button">Bora lá!</button>
  </div>
</div>

    <!-- Lista de restaurantes -->
    <div class="restaurant-section">
      <h2 id="section-title" class="section-title">
        Jantar para dois no centro de São Paulo
      </h2>
      <div class="restaurant-list">
        <div class="restaurant-card">
          <img src="img/bar.jpg" alt="Haus Bar" />
          <h3>HAUS BAR</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p class = "text">Petiscaria | R$ 15 a 120</p>
          <p class = "text">Ambiente acessível</p>
          <p class="mesas">3 mesas disponíveis!</p>
        </div>
        <div class="restaurant-card">
          <img src="img/mare.jpg" alt="Maré" />
          <h3>MARÉ</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p>Japonesa | R$ 20 a 240</p>
          <p>Ambiente acessível</p>
          <p class="mesas">1 mesa disponível!</p>
        </div>
        <div class="restaurant-card">
          <img src="img/seraphim.jpg" alt="Seraphim" />
          <h3>SERAPHIM</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p>Italiana | R$ 10 a 330</p>
          <p>Ambiente familiar</p>
          <p class="mesas">5 mesas disponíveis!</p>
        </div>
        <div class="restaurant-card">
          <img src="img/joe_mama_image.jpg" alt="Joe Mama" />
          <h3>JOE MAMA</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p>Pizzaria | R$ 80 a 280</p>
          <p>Ambiente familiar</p>
          <p class="mesas">7 mesas disponíveis!</p>
        </div>
      </div>
    </div>

    <!-- Destaque da semana -->
    <div class="highlight">
      <img src="img/campeliss.jpg" alt="Campelli's Destaque" />
      <div>
        <h3>DESTAQUE DA SEMANA</h3>
        <h2>CAMPELLI'S</h2>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        <p>Italiana | R$ 120 a 480</p>
        <p>
        "Campelli's é uma joia da culinária italiana, liderada pelo talentoso chef Victorio Campelli. O restaurante oferece uma experiência autêntica, com um ambiente acolhedor e um cardápio que destaca o prato principal: o capeletti. O Campelli's um destino obrigatório para os amantes da gastronomia italiana."
        </p>
      <a href="reserve.php">  <button class="reserve-button">Reserve agora</button> </a>
      </div>
    </div>

    <script>
      // Função para atualizar o texto do título de acordo com a quantidade de pessoas
      function atualizarTexto() {
        const quantidade = document.getElementById("quantidade").value;
        const title = document.getElementById("section-title");

        if (quantidade > 1) {
          title.innerHTML = Jantar para ${quantidade} no centro de São Paulo;
        } else if (quantidade == 1) {
          title.innerHTML = Jantar para uma pessoa no centro de São Paulo;
        } else {
          title.innerHTML = "Jantar para dois no centro de São Paulo";
        }
      }
    </script>
  </body>
</html>

<?php
$servername = "localhost";
$username = "root";  // Seu usuário de banco de dados
$password = "";  // Sua senha de banco de dados
$dbname = "restaurantes_db";  // Nome do seu banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
echo "Conexão bem-sucedida";

// Query de exemplo para puxar dados de restaurantes
$sql = "SELECT nome, tipo, faixa_preco FROM restaurantes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibindo dados dos restaurantes
    while($row = $result->fetch_assoc()) {
        echo "Nome: " . $row["nome"]. " - Tipo: " . $row["tipo"]. " - Faixa de Preço: " . $row["faixa_preco"]. "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>