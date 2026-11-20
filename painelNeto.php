<?php
session_start();
include 'inc/netos.inc.php';

// Nesta tela quem está logado é a Maria Luiza (neto de aluguel de teste)
$id = "maria";
$neto = $netos[$id];
$donoDoPerfil = true;

// Procura uma solicitação PENDENTE feita para ela (criada em pagamento.php)
$pendentes = 0;

if (isset($_SESSION['solicitacao'])) {
    $solicitacao = $_SESSION['solicitacao'];

    if ($solicitacao['neto'] == $id && $solicitacao['status'] == "pendente") {
        $pendentes = 1;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Neto Predileto - Painel do neto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <?php include 'inc/headerNeto.inc.php'; ?>

    <main class="conteudo py-4">

        <!-- Avisos depois de aceitar/recusar (vem de responderSolicitacao.php) -->
        <?php if (isset($_GET['resposta']) && $_GET['resposta'] == "aceita") { ?>
            <div class="alert alert-success" role="alert">
                Solicitação aceita! O idoso foi avisado.
            </div>
        <?php } ?>

        <?php if (isset($_GET['resposta']) && $_GET['resposta'] == "recusada") { ?>
            <div class="alert alert-secondary" role="alert">
                Solicitação recusada.
            </div>
        <?php } ?>

        <?php include 'inc/perfilConteudo.inc.php'; ?>
    </main>

    <!-- ================= POP UP DE SOLICITAÇÕES ================= -->
    <div class="modal fade" id="modalSolicitacoes" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content cartao-modal">

                <div class="modal-header">
                    <h2 class="modal-title titulo-secao mb-0" id="tituloModal">SOLICITAÇÕES</h2>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">

                    <?php if ($pendentes > 0) { ?>

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <i class="bi bi-person-circle avatar-comentario"></i>
                            <div>
                                <div class="fw-bold"><?php echo $solicitacao['idoso']; ?></div>
                                <div class="qtd-avaliacoes">quer um acompanhamento</div>
                            </div>
                        </div>

                        <div class="info-linha">
                            <i class="bi bi-heart-pulse"></i>
                            <span><?php echo $solicitacao['servico']; ?></span>
                        </div>
                        <div class="info-linha">
                            <i class="bi bi-cash-coin"></i>
                            <span>Você recebe R$ <?php echo number_format($solicitacao['valor'], 2, ',', '.'); ?></span>
                        </div>
                        <div class="info-linha mb-4">
                            <i class="bi bi-clock"></i>
                            <span>Solicitado às <?php echo $solicitacao['hora']; ?></span>
                        </div>

                        <form action="responderSolicitacao.php" method="POST" class="d-flex gap-2">
                            <button type="submit" name="acao" value="aceitar" class="btn btn-contratar flex-fill">ACEITAR</button>
                            <button type="submit" name="acao" value="recusar" class="btn btn-cadastrar flex-fill">RECUSAR</button>
                        </form>

                    <?php } else { ?>

                        <p class="texto-sobre text-center py-3">Nenhuma solicitação no momento.</p>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript do Bootstrap (necessário para o pop up funcionar) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
