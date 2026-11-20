<?php
session_start();

// Se abriram este arquivo direto, ou não existe solicitação, volta pro painel
if (!isset($_POST['acao']) || !isset($_SESSION['solicitacao'])) {
    header("Location: painelNeto.php");
    exit;
}

if ($_POST['acao'] == "aceitar") {
    $_SESSION['solicitacao']['status'] = "aceita";
    header("Location: painelNeto.php?resposta=aceita");
} else {
    $_SESSION['solicitacao']['status'] = "recusada";
    header("Location: painelNeto.php?resposta=recusada");
}
exit;
