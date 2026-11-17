<?php
// Mostra as estrelas de uma nota (cheias até a nota arredondada, o resto vazias)
function mostrarEstrelas($nota) {
    $cheias = round($nota);

    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $cheias) {
            echo '<i class="bi bi-star-fill"></i> ';
        } else {
            echo '<i class="bi bi-star"></i> ';
        }
    }
}

// Dados de EXEMPLO dos netos (depois isso vai vir do banco de dados)
$netos = [
    "maria" => [
        "nome" => "Maria Luiza",
        "idade" => 25,
        "foto" => "img/neto1.jpg", // mesmo caminho usado no home.php
        "profissao" => "Professora de Educação Física",
        "nota" => 5.0,
        "avaliacoes" => 32,
        "atendimentos" => 48,
        "valor" => 40,
        "sobre" => "Sou professora de Educação Física e adoro ajudar quem quer se movimentar com segurança. Acompanho com paciência, no ritmo de cada pessoa, sempre com uma boa conversa no caminho.",
        "servicos" => ["Acompanhamento em academia", "Caminhadas leves", "Idas ao mercado", "Alongamento e movimento"],
        "disponibilidade" => "Segunda a sábado, das 7h às 19h",
        "regiao" => "Atende perto de você, em ambientes locais",
        "selos" => ["Identidade verificada", "Antecedentes conferidos"],
        "comentarios" => [
            ["autor" => "Dona Helena, 72 anos", "nota" => 5, "texto" => "A Maria Luiza me acompanhou na academia e foi muito atenciosa. Voltei a me exercitar com confiança!"],
            ["autor" => "Seu Antônio, 68 anos", "nota" => 5, "texto" => "Pontual, educada e muito paciente. Recomendo de olhos fechados."]
        ]
    ],
    "miguel" => [
        "nome" => "Miguel",
        "idade" => 30,
        "foto" => "img/neto2.jpg", // mesmo caminho usado no home.php
        "profissao" => "Técnico de T.I",
        "nota" => 4.3,
        "avaliacoes" => 18,
        "atendimentos" => 27,
        "valor" => 35,
        "sobre" => "Sou técnico de T.I e gosto de explicar tecnologia sem pressa e sem termos difíceis. Ajudo com celular, computador, aplicativos e internet, e deixo tudo anotado passo a passo.",
        "servicos" => ["Auxílio na tecnologia", "Letramento digital para idosos", "Configuração de celular", "Videochamadas com a família"],
        "disponibilidade" => "Segunda a sexta, das 9h às 18h",
        "regiao" => "Atende perto de você, em ambientes locais",
        "selos" => ["Identidade verificada", "Antecedentes conferidos"],
        "comentarios" => [
            ["autor" => "Dona Rosa, 75 anos", "nota" => 5, "texto" => "Aprendi a fazer videochamada com meus netos. O Miguel explica com muita calma."],
            ["autor" => "Seu José, 70 anos", "nota" => 4, "texto" => "Resolveu o problema do meu computador e ainda me ensinou a evitar golpes."]
        ]
    ]
];

// Se não veio um id válido na URL, volta para a tela principal
if (!isset($_GET['id']) || !isset($netos[$_GET['id']])) {
    header("Location: home.php");
    exit;
}

// Pega os dados do neto escolhido
$neto = $netos[$_GET['id']];
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

        <!-- ================= CAPA, FOTO E NOME ================= -->
        <section class="cartao-perfil cartao-capa text-center">
            <div class="capa"></div>

            <div class="px-3 pb-4">
                <div class="foto-neto mx-auto">
                    <img src="<?php echo $neto['foto']; ?>" alt="Foto de <?php echo $neto['nome']; ?>">
                </div>

                <h1 class="nome-perfil"><?php echo $neto['nome']; ?>, <?php echo $neto['idade']; ?> anos</h1>
                <p class="profissao"><?php echo $neto['profissao']; ?></p>

                <!-- Avaliação -->
                <div class="text-warning">
                    <?php mostrarEstrelas($neto['nota']); ?>
                    <span class="nota-numero"><?php echo number_format($neto['nota'], 1, ',', '.'); ?></span>
                    <span class="qtd-avaliacoes">(<?php echo $neto['avaliacoes']; ?> avaliações)</span>
                </div>

                <!-- Números -->
                <div class="row g-2 mt-3">
                    <div class="col-4">
                        <div class="bloco-numero">
                            <div class="numero"><?php echo $neto['atendimentos']; ?></div>
                            <div class="rotulo">atendimentos</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="bloco-numero">
                            <div class="numero"><?php echo number_format($neto['nota'], 1, ',', '.'); ?></div>
                            <div class="rotulo">avaliação</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="bloco-numero">
                            <div class="numero"><?php echo $neto['avaliacoes']; ?></div>
                            <div class="rotulo">comentários</div>
                        </div>
                    </div>
                </div>

                <!-- Botões -->
                <a href="#" class="btn btn-contratar w-100 d-block mt-4 mb-3">SOLICITAR ACOMPANHAMENTO</a>
                <a href="#" class="btn btn-mensagem w-100 d-block">ENVIAR MENSAGEM</a>
            </div>
        </section>

        <!-- ================= SOBRE ================= -->
        <section class="cartao-perfil">
            <h2 class="titulo-secao">SOBRE <?php echo strtoupper($neto['nome']); ?></h2>
            <p class="texto-sobre"><?php echo $neto['sobre']; ?></p>
        </section>

        <!-- ================= SERVIÇOS ================= -->
        <section class="cartao-perfil">
            <h2 class="titulo-secao">SERVIÇOS OFERECIDOS</h2>
            <div class="d-flex flex-wrap gap-2">
                <?php foreach ($neto['servicos'] as $servico) { ?>
                    <span class="chip"><?php echo $servico; ?></span>
                <?php } ?>
            </div>
        </section>

        <!-- ================= INFORMAÇÕES ================= -->
        <section class="cartao-perfil">
            <h2 class="titulo-secao">INFORMAÇÕES</h2>

            <div class="info-linha">
                <i class="bi bi-calendar-check"></i>
                <span><?php echo $neto['disponibilidade']; ?></span>
            </div>
            <div class="info-linha">
                <i class="bi bi-cash-coin"></i>
                <span>A partir de R$ <?php echo number_format($neto['valor'], 2, ',', '.'); ?> por hora</span>
            </div>
            <div class="info-linha mb-0">
                <i class="bi bi-geo-alt"></i>
                <span><?php echo $neto['regiao']; ?></span>
            </div>
        </section>

        <!-- ================= SELOS DE CONFIANÇA ================= -->
        <section class="cartao-perfil">
            <h2 class="titulo-secao">SELOS DE CONFIANÇA</h2>

            <?php foreach ($neto['selos'] as $selo) { ?>
                <div class="info-linha">
                    <i class="bi bi-patch-check-fill"></i>
                    <span><?php echo $selo; ?></span>
                </div>
            <?php } ?>
        </section>

        <!-- ================= AVALIAÇÕES ================= -->
        <section class="cartao-perfil">
            <h2 class="titulo-secao">AVALIAÇÕES</h2>

            <?php foreach ($neto['comentarios'] as $comentario) { ?>
                <div class="comentario">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-person-circle avatar-comentario"></i>
                        <div>
                            <div class="fw-bold"><?php echo $comentario['autor']; ?></div>
                            <div class="text-warning"><?php mostrarEstrelas($comentario['nota']); ?></div>
                        </div>
                    </div>
                    <p class="texto-sobre mt-2"><?php echo $comentario['texto']; ?></p>
                </div>
            <?php } ?>
        </section>
    </main>
</body>

</html>
