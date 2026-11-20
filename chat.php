<?php
include 'inc/netos.inc.php';

// Se não veio um id válido na URL, volta para a tela principal
if (!isset($_GET['id']) || !isset($netos[$_GET['id']])) {
    header("Location: home.php");
    exit;
}

$id = $_GET['id'];
$neto = $netos[$id];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Neto Predileto - Conversa com <?php echo $neto['nome']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <?php include 'inc/header.inc.php'; ?>

    <main class="conteudo py-4">
        <section class="cartao-perfil cartao-capa">

            <!-- Cabeçalho do chat: voltar, foto e nome -->
            <div class="cabecalho-chat">
                <a href="perfilNeto.php?id=<?php echo $id; ?>" class="voltar-chat" aria-label="Voltar ao perfil">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <div class="caixa-foto-perfil">
                    <img src="<?php echo $neto['foto']; ?>" alt="">
                </div>
                <div>
                    <p class="nome-chat"><?php echo $neto['nome']; ?></p>
                    <span class="status-online"><i class="bi bi-circle-fill"></i> online</span>
                </div>
            </div>

            <!-- Espaço da conversa (as mensagens são adicionadas pelo JavaScript) -->
            <div class="area-chat" id="areaChat"></div>

            <p class="digitando d-none" id="digitando"><?php echo $neto['nome']; ?> está digitando...</p>

            <!-- Campo para escrever -->
            <form id="formChat" class="barra-chat" autocomplete="off">
                <div class="campo-chat">
                    <input type="text" id="mensagem" class="form-control rounded-pill" placeholder="Digite sua mensagem">
                </div>
                <button type="submit" class="btn-enviar" aria-label="Enviar mensagem">
                    <i class="bi bi-send-fill"></i>
                </button>
            </form>
        </section>
    </main>

    <script>
        // ---------- Elementos e dados ----------
        const nomeNeto = "<?php echo $neto['nome']; ?>";
        const areaChat = document.getElementById('areaChat');
        const digitando = document.getElementById('digitando');
        const formChat = document.getElementById('formChat');
        const campoMensagem = document.getElementById('mensagem');

        // Respostas simuladas (uma por vez, em ordem)
        const respostas = [
            "Claro! Posso sim.",
            "Combinado! Estarei lá no horário.",
            "Pode contar comigo, vou cuidar de tudo.",
            "Qualquer dúvida é só me chamar por aqui."
        ];
        let proximaResposta = 0;

        // ---------- Funções ----------
        function horaAgora() {
            return new Date().toLocaleTimeString('pt-BR', { hour: '2-digit', minute: '2-digit' });
        }

        // Adiciona uma mensagem no espaço da conversa (sem balão: só nome, hora e texto)
        function adicionarMensagem(autor, texto, ehVoce, hora) {
            if (!hora) {
                hora = horaAgora();
            }

            const linha = document.createElement('div');
            linha.className = 'mensagem';
            if (ehVoce) {
                linha.classList.add('mensagem-voce');
            }

            const cabecalho = document.createElement('div');
            cabecalho.className = 'mensagem-autor';
            cabecalho.textContent = autor;

            const spanHora = document.createElement('span');
            spanHora.className = 'mensagem-hora';
            spanHora.textContent = hora;
            cabecalho.appendChild(spanHora);

            const corpo = document.createElement('div');
            corpo.className = 'mensagem-texto';
            corpo.textContent = texto;

            linha.appendChild(cabecalho);
            linha.appendChild(corpo);
            areaChat.appendChild(linha);

            // rola a conversa até a última mensagem
            areaChat.scrollTop = areaChat.scrollHeight;
        }

        // ---------- Conversa que já começa pronta ----------
        adicionarMensagem(nomeNeto, "Olá! Tudo bem? Vi que você tem interesse em um acompanhamento.", false, "14:02");
        adicionarMensagem(nomeNeto, "Me conte como posso ajudar. Qual dia e horário ficam bons para você?", false, "14:02");

        // ---------- Enviar mensagem ----------
        formChat.addEventListener('submit', (evento) => {
            evento.preventDefault(); // não recarrega a página

            const texto = campoMensagem.value.trim();
            if (texto === '') {
                return;
            }

            adicionarMensagem('Você', texto, true);
            campoMensagem.value = '';

            // simula o neto digitando e respondendo
            digitando.classList.remove('d-none');

            setTimeout(() => {
                digitando.classList.add('d-none');
                adicionarMensagem(nomeNeto, respostas[proximaResposta], false);
                proximaResposta = (proximaResposta + 1) % respostas.length;
            }, 1500);
        });
    </script>
</body>

</html>
