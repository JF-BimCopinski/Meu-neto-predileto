<?php
// Se alguém abrir este arquivo direto pela barra do navegador, volta pro login
if (!isset($_POST['nome'])) {
    header("Location: index.php");
    exit;
}

// Pega o que foi digitado no formulário de cadastro
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];            // opcional (pode vir vazio)
$complemento = $_POST['complemento'];  // opcional (pode vir vazio)
$perfil = $_POST['perfil'];

// Só o responsável pelo idoso preenche os dados do idoso
if ($perfil == "responsavel") {
    $nomeIdoso = $_POST['nome_idoso'];
    $telefoneIdoso = $_POST['telefone_idoso'];
    $enderecoIdoso = $_POST['endereco_idoso'];
}

// No futuro, aqui os dados serão salvos no banco de dados.
// Por enquanto (só frontend), voltamos para o login avisando que deu certo.
header("Location: index.php?cadastro=1");
exit;
?>