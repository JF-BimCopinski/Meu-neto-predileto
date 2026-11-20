<?php
include 'inc/netos.inc.php';

// Se não veio um id válido na URL, volta para a tela principal
if (!isset($_GET['id']) || !isset($netos[$_GET['id']])) {
    header("Location: home.php");
    exit;
}

$id = $_GET['id'];
$neto = $netos[$id];
$donoDoPerfil = false; // quem está vendo é o idoso
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Neto Predileto - <?php echo $neto['nome']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <?php include 'inc/header.inc.php'; ?>

    <main class="conteudo py-4">
        <?php include 'inc/perfilConteudo.inc.php'; ?>
    </main>
</body>

</html>
