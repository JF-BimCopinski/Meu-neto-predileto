<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Neto Predileto - Início</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">

<?php include 'inc/header.inc.php'; ?>

    <!-- ================= CONTEÚDO ================= -->
    <main class="flex-grow-1 d-flex flex-column">

        <!-- Últimos netos de aluguel -->
        <section class="secao-ultimos">
            <a href="perfilNeto.php?id=maria" class="conteudo text-center d-block text-decoration-none">
                <h2 class="titulo-secao">ÚLTIMOS NETOS DE ALUGUEL</h2>
                <h3 class="nome-neto">Maria Luiza, 25 anos</h3>

                <div class="d-flex align-items-start gap-3 text-start">
                    <div>
                        <div class="caixa-foto">
                            <img src="img/maria.jpg" alt="Foto da Maria Luiza">
                        </div>
                        <div class="text-warning mt-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>

                    <div class="servicos">
                        <p>Professora de Educação Física</p>
                        <p>Acompanhamento em academia</p>
                    </div>
                </div>

                <p class="ver-perfil mt-3 mb-0">VER PERFIL <i class="bi bi-chevron-right"></i></p>
            </a>
        </section>

        <!-- Sugestões de netos -->
        <section class="secao-sugestoes flex-grow-1">
            <a href="perfilNeto.php?id=miguel" class="conteudo text-center d-block text-decoration-none">
                <h2 class="titulo-secao">SUGESTÕES DE NETOS</h2>
                <h3 class="nome-neto">Miguel, 30 anos</h3>

                <div class="d-flex align-items-start gap-3 text-start">
                    <div>
                        <div class="caixa-foto">
                            <img src="img/miguel.jpg" alt="Foto do Miguel">
                        </div>
                        <div class="text-warning mt-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>

                    <div class="servicos">
                        <p>Técnico T.I</p>
                        <p>Auxílio na tecnologia</p>
                        <p>Letramento digital para idosos</p>
                    </div>
                </div>

                <p class="ver-perfil mt-3 mb-0">VER PERFIL <i class="bi bi-chevron-right"></i></p>
            </a>
        </section>
    </main>
</body>

</html>
