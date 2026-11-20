<?php
session_start();
include 'inc/netos.inc.php';

// Se não veio um id válido na URL, volta para a tela principal
if (!isset($_GET['id']) || !isset($netos[$_GET['id']])) {
    header("Location: home.php");
    exit;
}

$id = $_GET['id'];
$neto = $netos[$id];

// Valor aleatório (depois virá do banco de dados): de R$ 40 a R$ 150, de 5 em 5
$valor = rand(8, 30) * 5;
$valorFormatado = number_format($valor, 2, ',', '.');

// Guarda a solicitação na sessão, para o neto ver no painel dele
$_SESSION['solicitacao'] = [
    "neto" => $id,
    "idoso" => "Dona Helena, 72 anos", // idoso de teste
    "servico" => $neto['servicos'][0],
    "valor" => $valor,
    "hora" => date("H:i"),
    "status" => "pendente"
];

// Código Pix "copia e cola" de EXEMPLO (depois virá do sistema de pagamento)
$codigoPix = "00020126330014BR.GOV.BCB.PIX0111TESTE-PIX-01520400005303986" . "5802BR5920MEU NETO PREDILETO6009SAO PAULO62070503***6304A1B2";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Neto Predileto - Pagamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <?php include 'inc/header.inc.php'; ?>

    <main class="conteudo py-4">

        <!-- ================= RESUMO DO PEDIDO ================= -->
        <section class="cartao-perfil">
            <h2 class="titulo-secao">RESUMO DO PEDIDO</h2>

            <div class="resumo-neto">
                <div class="caixa-foto-perfil">
                    <img src="<?php echo $neto['foto']; ?>" alt="">
                </div>
                <div>
                    <div class="nome-resumo"><?php echo $neto['nome']; ?></div>
                    <div class="profissao mb-0"><?php echo $neto['profissao']; ?></div>
                </div>
            </div>

            <div class="info-linha mt-3">
                <i class="bi bi-heart-pulse"></i>
                <span><?php echo $neto['servicos'][0]; ?></span>
            </div>

            <div class="rotulo">Total a pagar</div>
            <div class="valor-total">R$ <?php echo $valorFormatado; ?></div>

            <div class="info-linha mt-3 mb-0">
                <i class="bi bi-shield-check"></i>
                <span>Pagamento protegido: o valor só é liberado para o neto depois do atendimento.</span>
            </div>
        </section>

        <!-- ================= PAGAMENTO COM PIX ================= -->
        <section class="cartao-perfil text-center">
            <h2 class="titulo-secao">PAGUE COM PIX</h2>

            <!-- QR Code -->
            <div id="blocoQr">
                <p class="texto-sobre mb-3">Abra o aplicativo do seu banco e escaneie o QR Code:</p>
                <div class="caixa-qr">
                    <img src="img/qrcode.png" alt="QR Code para pagamento">
                </div>
            </div>

            <!-- Status do pagamento -->
            <div class="mt-4">
                <div class="status-pagamento" id="statusPagamento">
                    <i class="bi bi-hourglass-split" id="iconeStatus"></i>
                    <span id="textoStatus">Aguardando pagamento</span>
                </div>
                <p class="tempo-qr mt-2 mb-0" id="blocoTempo">
                    <i class="bi bi-clock"></i> O QR Code expira em <span id="tempo">10:00</span>
                </p>
            </div>

            <!-- Pix copia e cola -->
            <div id="blocoCodigo" class="mt-4 text-start">
                <p class="rotulo mb-2">Ou copie o código Pix:</p>
                <div class="codigo-pix" id="codigoPix"><?php echo $codigoPix; ?></div>
                <button type="button" id="btnCopiar" class="btn btn-mensagem w-100 d-block mt-3">
                    <i class="bi bi-clipboard"></i> COPIAR CÓDIGO
                </button>
            </div>

            <!-- Aparece depois que o pagamento é confirmado -->
            <div id="avisoConfirmado" class="d-none mt-4">
                <p class="texto-sobre mb-3">Seu pedido foi enviado para <?php echo $neto['nome']; ?>. Ela(e) responderá em breve!</p>
                <a href="chat.php?id=<?php echo $id; ?>" class="btn btn-contratar w-100 d-block">CONVERSAR COM <?php echo strtoupper($neto['nome']); ?></a>
            </div>

            <!-- Aparece se o QR Code expirar -->
            <a href="pagamento.php?id=<?php echo $id; ?>" id="linkNovoQr" class="btn btn-contratar w-100 d-none mt-4">GERAR NOVO QR CODE</a>

            <!-- Botão só para o teste -->
            <button type="button" id="btnSimular" class="btn btn-cadastrar w-100 d-block mt-4">
                SIMULAR PAGAMENTO (TESTE)
            </button>
        </section>

        <a href="perfilNeto.php?id=<?php echo $id; ?>" class="link-esqueceu d-block text-center">Cancelar e voltar ao perfil</a>
    </main>

    <script>
        // ---------- Elementos da página ----------
        const statusPagamento = document.getElementById('statusPagamento');
        const iconeStatus = document.getElementById('iconeStatus');
        const textoStatus = document.getElementById('textoStatus');
        const blocoQr = document.getElementById('blocoQr');
        const blocoTempo = document.getElementById('blocoTempo');
        const blocoCodigo = document.getElementById('blocoCodigo');
        const avisoConfirmado = document.getElementById('avisoConfirmado');
        const linkNovoQr = document.getElementById('linkNovoQr');
        const btnSimular = document.getElementById('btnSimular');
        const btnCopiar = document.getElementById('btnCopiar');
        const tempo = document.getElementById('tempo');

        // ---------- Copiar o código Pix ----------
        btnCopiar.addEventListener('click', () => {
            const codigo = document.getElementById('codigoPix').textContent.trim();

            if (navigator.clipboard) {
                navigator.clipboard.writeText(codigo);

                btnCopiar.innerHTML = '<i class="bi bi-check2"></i> CÓDIGO COPIADO!';
                setTimeout(() => {
                    btnCopiar.innerHTML = '<i class="bi bi-clipboard"></i> COPIAR CÓDIGO';
                }, 2000);
            }
        });

        // ---------- Contagem regressiva do QR Code (10 minutos) ----------
        let segundos = 10 * 60;

        const contagem = setInterval(() => {
            segundos--;

            const min = String(Math.floor(segundos / 60)).padStart(2, '0');
            const seg = String(segundos % 60).padStart(2, '0');
            tempo.textContent = min + ':' + seg;

            if (segundos <= 0) {
                clearInterval(contagem);

                statusPagamento.classList.add('status-expirado');
                iconeStatus.className = 'bi bi-x-circle-fill';
                textoStatus.textContent = 'QR Code expirado';

                blocoQr.classList.add('d-none');
                blocoTempo.classList.add('d-none');
                blocoCodigo.classList.add('d-none');
                btnSimular.classList.add('d-none');
                linkNovoQr.classList.remove('d-none');
            }
        }, 1000);

        // ---------- Simular o pagamento (só para teste) ----------
        btnSimular.addEventListener('click', () => {
            clearInterval(contagem);

            statusPagamento.classList.add('status-pago');
            iconeStatus.className = 'bi bi-check-circle-fill';
            textoStatus.textContent = 'Pagamento confirmado';

            blocoQr.classList.add('d-none');
            blocoTempo.classList.add('d-none');
            blocoCodigo.classList.add('d-none');
            btnSimular.classList.add('d-none');
            avisoConfirmado.classList.remove('d-none');
        });
    </script>
</body>

</html>
