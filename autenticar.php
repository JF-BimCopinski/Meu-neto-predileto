<?php
// Se alguém abrir este arquivo direto pela barra do navegador, volta pro login
if (!isset($_POST['telefone'])) {
    header("Location: index.php");
    exit;
}

// Pega o que foi digitado no formulário do index.php
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

// Tira a máscara do telefone: "(42) 99999-9999" vira "42999999999"
$telefone = str_replace(['(', ')', ' ', '-'], '', $telefone);

// Usuário de teste (depois isso vai virar uma consulta no banco de dados)
$telefoneCerto = "42999999999";
$senhaCerta = "1234";

if ($telefone == $telefoneCerto && $senha == $senhaCerta) {
    // Por enquanto só uma mensagem, igual ao finalizacao.php
    // Depois troque por: header("Location: home.php");
    echo "<h1>Login feito com sucesso!</h1>";
    echo "<p>Bem-vindo ao Meu Neto Predileto.</p>";
} else {
    // Volta pro login avisando que deu erro
    header("Location: login.php?erro=1");
    exit;
}
?>