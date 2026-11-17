<!-- ================= TOPO (usado em todas as telas do idoso) ================= -->
<header class="topo">
    <div class="conteudo">

        <!-- Menu, perfil e configuração -->
        <nav class="d-flex justify-content-between align-items-end">
            <a href="home.php" class="item-topo">
                <i class="bi bi-house-door-fill"></i>
                <span>MENU</span>
            </a>

            <a href="#" class="item-topo">
                <!-- FOTO DE PERFIL: coloque o caminho da imagem no src (ex.: img/perfil.jpg) -->
                <div class="caixa-foto-perfil">
                    <img src="img/velha.jpg" alt="imagem de uma velha">
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