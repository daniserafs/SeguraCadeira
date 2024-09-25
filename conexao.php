<?php

// Define as credenciais para a conexão com o banco de dados
$usuario = 'root';
$senha = '';
$database = 'tbl_SeguraCadeira';
$host = 'localhost';

// Cria uma nova conexão com o banco de dados
$mysqli = new mysqli($host, $usuario, $senha, $database);

// Verifica se houve algum erro na conexão
if ($mysqli->connect_error) {
    // Encerra a execução do script e exibe uma mensagem de erro
    die("Falha ao conectar ao banco de dados: " . $mysqli->connect_error);
}

$sql = file_get_contents('iniciabanco.sql');

// Executa o script SQL
if ($mysqli->multi_query($sql)) {
    do {
        // Limpa os resultados
        if ($result = $mysqli->store_result()) {
            $result->free();
        }
    } while ($mysqli->more_results() && $mysqli->next_result());
} else {
    die("Erro ao executar o script SQL: " . $mysqli->error);
}
?>