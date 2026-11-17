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

// Tira a máscara do telefone: "(41) 99999-9999" vira "41999999999"
$telefone = str_replace(['(', ')', ' ', '-'], '', $telefone);

// Usuário de teste (depois isso vai virar uma consulta no banco de dados)
$telefoneCerto = "42999999999";
$senhaCerta = "1234";

if ($telefone == $telefoneCerto && $senha == $senhaCerta) {

    if ($tipo == "idoso") {
        // Idoso e responsável vão para a tela de contato com os netos
        header("Location: home.php");
        exit;
    } else {
        // Neto de aluguel: ainda não existe tela para ele
        echo "<h1>Login feito com sucesso!</h1>";
        echo "<p>A tela do neto de aluguel ainda está em construção.</p>";
    }

} else {
    // Volta pro login avisando que deu erro
    header("Location: index.php?erro=1");
    exit;
}
?>