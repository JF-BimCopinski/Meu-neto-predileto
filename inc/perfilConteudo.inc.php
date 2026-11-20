<!--
    Conteúdo do perfil de um neto. É usado em DUAS telas:
    - perfilNeto.php  -> visto pelo idoso      ($donoDoPerfil = false)
    - painelNeto.php  -> visto pelo próprio neto ($donoDoPerfil = true)

    Antes de incluir este arquivo, a página precisa definir:
    $neto, $id e $donoDoPerfil (e $pendentes, no caso do painel do neto).
-->

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

        <?php if ($donoDoPerfil) { ?>

            <!-- Visão do NETO: retângulo de solicitações (abre o pop up) -->
            <button type="button" class="btn btn-solicitacoes w-100 d-flex align-items-center justify-content-center gap-3 mt-4"
                data-bs-toggle="modal" data-bs-target="#modalSolicitacoes">
                <i class="bi bi-bell-fill"></i>
                <span>SOLICITAÇÕES</span>

                <?php if ($pendentes > 0) { ?>
                    <span class="notificacao"><?php echo $pendentes; ?></span>
                <?php } ?>
            </button>

        <?php } else { ?>

            <!-- Visão do IDOSO: botões de contato -->
            <a href="pagamento.php?id=<?php echo $id; ?>" class="btn btn-contratar w-100 d-block mt-4 mb-3">SOLICITAR ACOMPANHAMENTO</a>
            <a href="chat.php?id=<?php echo $id; ?>" class="btn btn-mensagem w-100 d-block">ENVIAR MENSAGEM</a>

        <?php } ?>
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
