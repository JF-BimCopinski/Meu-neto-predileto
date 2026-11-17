<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Neto Predileto - Início</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/home.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- ================= TOPO ================= -->
    <header class="topo">
        <div class="conteudo">

            <!-- Menu, perfil e configuração -->
            <nav class="d-flex justify-content-between align-items-end">
                <a href="#" class="item-topo">
                    <i class="bi bi-house-door-fill"></i>
                    <span>MENU</span>
                </a>

                <a href="#" class="item-topo">
                    <!-- FOTO DE PERFIL: coloque o caminho da imagem no src (ex.: img/perfil.jpg) -->
                    <div class="caixa-foto-perfil">
                        <img src="" alt="">
                    </div>
                    <span>PERFIL</span>
                </a>

                <a href="#" class="item-topo">
                    <i class="bi bi-gear-fill"></i>
                    <span>CONFIGURAÇÃO</span>
                </a>
            </nav>

            <!-- Busca e filtro -->
            <form class="d-flex align-items-center gap-3 mt-3" action="home.php" method="GET">
                <div class="busca">
                    <input type="text" class="form-control rounded-pill" name="busca"
                        placeholder="O que você está procurando?">
                    <i class="bi bi-search"></i>
                </div>

                <button type="button" class="btn-filtro">
                    <i class="bi bi-funnel-fill"></i>
                    <span>FILTRO</span>
                </button>
            </form>
        </div>
    </header>

    <!-- ================= CONTEÚDO ================= -->
    <main class="flex-grow-1 d-flex flex-column">

        <!-- Últimos netos de aluguel -->
        <section class="secao-ultimos">
            <div class="conteudo text-center">
                <h2 class="titulo-secao">ÚLTIMOS NETOS DE ALUGUEL</h2>
                <h3 class="nome-neto">Maria Luiza, 25 anos</h3>

                <div class="d-flex align-items-start gap-3 text-start">
                    <div>
                        <!-- FOTO DA MARIA LUIZA: coloque o caminho da imagem no src -->
                        <div class="caixa-foto">
                            <img src="" alt="">
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
            </div>
        </section>

        <!-- Sugestões de netos -->
        <section class="secao-sugestoes flex-grow-1">
            <div class="conteudo text-center">
                <h2 class="titulo-secao">SUGESTÕES DE NETOS</h2>
                <h3 class="nome-neto">Miguel, 30 anos</h3>

                <div class="d-flex align-items-start gap-3 text-start">
                    <div>
                        <!-- FOTO DO MIGUEL: coloque o caminho da imagem no src -->
                        <div class="caixa-foto">
                            <img src="" alt="">
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
            </div>
        </section>
    </main>
</body>

</html>