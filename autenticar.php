<?php
// Se alguém abrir este arquivo direto pela barra do navegador, volta pro login
if (!isset($_POST['telefone'])) {
    header("Location: index.php");
    exit;
}

// Pega o que foi digitado no formulário de login
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo']; // "neto" ou "idoso" (depende do botão clicado)

// Tira a máscara do telefone: "(42) 99999-9999" vira "42999999999"
$telefone = str_replace(['(', ')', ' ', '-'], '', $telefone);

// Usuários de teste (depois isso vai virar uma consulta no banco de dados)
$telefoneIdoso = "42999999999";
$senhaIdoso = "1234";

$telefoneNeto = "42988888888";
$senhaNeto = "1234";

if ($tipo == "idoso" && $telefone == $telefoneIdoso && $senha == $senhaIdoso) {
    // Idoso e responsável vão para a tela de contato com os netos
    header("Location: home.php");
    exit;
} elseif ($tipo == "neto" && $telefone == $telefoneNeto && $senha == $senhaNeto) {
    // Neto de aluguel vai para o painel dele (perfil + solicitações)
    header("Location: painelNeto.php");
    exit;
} else {
    // Volta pro login avisando que deu erro
    header("Location: index.php?erro=1");
    exit;
}
