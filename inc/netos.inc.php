<?php
// Dados e funções compartilhados pelas telas que mostram netos.
// (Arquivo incluído com: include 'inc/netos.inc.php';)

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
        "foto" => "img/maria.jpg", // mesmo caminho usado no home.php
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
        "foto" => "img/miguel.jpg", // mesmo caminho usado no home.php
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
