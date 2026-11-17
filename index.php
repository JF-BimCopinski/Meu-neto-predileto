<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Neto Predileto - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <main class="tela-login container d-flex flex-column align-items-center text-center py-5">

        <h1 class="titulo-login text-white mt-4">MEU NETO<br>PREDILETO</h1>

        <!-- ================= TELA DE LOGIN ================= -->
        <form action="autenticar.php" method="POST" id="formLogin" class="w-100 mt-5">

            <!-- Erro de login (aparece com ?erro=1 na URL) -->
            <?php if (isset($_GET['erro'])) { ?>
                <div class="alert alert-danger py-2 small" role="alert">
                    Telefone ou senha incorretos.
                </div>
            <?php } ?>

            <!-- Sucesso no cadastro (aparece com ?cadastro=1 na URL) -->
            <?php if (isset($_GET['cadastro'])) { ?>
                <div class="alert alert-success py-2 small" role="alert">
                    Cadastro realizado com sucesso! Faça seu login.
                </div>
            <?php } ?>

            <!-- Campo de telefone -->
            <div class="campo mx-auto mb-4">
                <input type="tel" class="form-control rounded-pill mascara-telefone" id="telefone" name="telefone"
                    placeholder="Insira seu telefone" minlength="14" maxlength="15" required>
                <i class="bi bi-telephone"></i>
            </div>

            <!-- Campo de senha -->
            <div class="campo mx-auto">
                <input type="password" class="form-control rounded-pill" id="senha" name="senha"
                    placeholder="Insira sua senha" required>
                <i class="bi bi-shield-check"></i>
            </div>

            <a href="#" class="link-esqueceu d-inline-block mt-2 mb-5">Esqueceu a senha?</a>

            <!-- Botão principal -->
            <button type="submit" class="btn btn-acessar w-75 d-flex justify-content-between align-items-center mx-auto mb-4">
                <span class="flex-grow-1">ACESSAR CONTA</span>
                <i class="bi bi-box-arrow-in-right"></i>
            </button>

            <!-- Botão secundário -->
            <a href="familiar.php" class="btn btn-familiar w-75 d-block mx-auto mb-4">
                ACESSE COMO FAMILIAR
            </a>

            <!-- Botão que abre o cadastro -->
            <button type="button" id="btnAbrirCadastro" class="btn btn-cadastrar w-75 d-block mx-auto">
                CADASTRE-SE
            </button>
        </form>

        <!-- ================= TELA DE CADASTRO (começa escondida) ================= -->
        <form action="cadastrar.php" method="POST" enctype="multipart/form-data" id="formCadastro" class="w-100 mt-4 d-none">

            <h2 class="subtitulo-cadastro text-white mb-4">CADASTRE-SE</h2>

            <!-- Nome -->
            <div class="campo mx-auto mb-3">
                <input type="text" class="form-control rounded-pill" name="nome"
                    placeholder="Insira seu nome" required>
                <i class="bi bi-person"></i>
            </div>

            <!-- Telefone celular -->
            <div class="campo mx-auto mb-3">
                <input type="tel" class="form-control rounded-pill mascara-telefone" name="telefone"
                    placeholder="Insira seu telefone celular" minlength="14" maxlength="15" required>
                <i class="bi bi-telephone"></i>
            </div>

            <!-- Senha -->
            <div class="campo mx-auto mb-3">
                <input type="password" class="form-control rounded-pill" name="senha"
                    placeholder="Insira sua senha" required>
                <i class="bi bi-shield-check"></i>
            </div>

            <!-- Email -->
            <div class="campo mx-auto mb-3">
                <input type="email" class="form-control rounded-pill" name="email"
                    placeholder="Insira seu email" required>
                <i class="bi bi-envelope"></i>
            </div>

            <!-- Endereço -->
            <div class="campo mx-auto mb-4">
                <input type="text" class="form-control rounded-pill" name="endereco"
                    placeholder="Insira seu endereço" required>
                <i class="bi bi-geo-alt"></i>
            </div>

            <!-- Perfil de usuário (botões selecionáveis) -->
            <p class="text-white fw-bold mb-2">Selecione seu perfil</p>
            <div class="d-grid gap-2 w-75 mx-auto mb-4">
                <input type="radio" class="btn-check" name="perfil" id="perfilNeto" value="neto" required>
                <label class="btn btn-outline-light rounded-4 fw-bold py-2" for="perfilNeto">Neto de Aluguel</label>

                <input type="radio" class="btn-check" name="perfil" id="perfilIdoso" value="idoso" required>
                <label class="btn btn-outline-light rounded-4 fw-bold py-2" for="perfilIdoso">Idoso</label>

                <input type="radio" class="btn-check" name="perfil" id="perfilResponsavel" value="responsavel" required>
                <label class="btn btn-outline-light rounded-4 fw-bold py-2" for="perfilResponsavel">Responsável pelo idoso</label>
            </div>

            <!-- Dados do idoso (só aparece se escolher "Responsável pelo idoso") -->
            <div id="dadosIdoso" class="d-none">
                <p class="text-white fw-bold mb-2">Dados do idoso</p>

                <div class="campo mx-auto mb-3">
                    <input type="text" class="form-control rounded-pill" name="nome_idoso"
                        placeholder="Insira o nome do idoso">
                    <i class="bi bi-person"></i>
                </div>

                <div class="campo mx-auto mb-3">
                    <input type="tel" class="form-control rounded-pill mascara-telefone" name="telefone_idoso"
                        placeholder="Insira o telefone do idoso" minlength="14" maxlength="15">
                    <i class="bi bi-telephone"></i>
                </div>

                <div class="campo mx-auto mb-4">
                    <input type="text" class="form-control rounded-pill" name="endereco_idoso"
                        placeholder="Insira o endereço do idoso">
                    <i class="bi bi-geo-alt"></i>
                </div>
            </div>

            <!-- Foto (só visual, por enquanto) -->
            <label for="foto" class="d-block text-white fw-bold mb-2">Foto de perfil</label>
            <div class="campo-foto mx-auto mb-4">
                <input type="file" class="form-control rounded-pill" id="foto" name="foto" accept="image/*">
            </div>

            <!-- Botões -->
            <button type="submit" class="btn btn-acessar w-75 d-block mx-auto mb-3">
                CONFIRMAR CADASTRO
            </button>
            <button type="button" id="btnVoltarLogin" class="btn btn-familiar w-75 d-block mx-auto">
                VOLTAR AO LOGIN
            </button>
        </form>
    </main>

    <script>
        // ---------- Máscara de telefone (vale para todos os campos com a classe mascara-telefone) ----------
        const camposTelefone = document.querySelectorAll('.mascara-telefone');

        camposTelefone.forEach((campo) => {
            campo.addEventListener('input', () => {
                // tira tudo que não for número e limita a 11 dígitos
                let numeros = campo.value.replace(/\D/g, '').slice(0, 11);

                if (numeros.length > 10) {
                    numeros = numeros.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
                } else if (numeros.length > 6) {
                    numeros = numeros.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
                } else if (numeros.length > 2) {
                    numeros = numeros.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
                }

                campo.value = numeros;
            });
        });

        // ---------- Alternar entre login e cadastro ----------
        const formLogin = document.getElementById('formLogin');
        const formCadastro = document.getElementById('formCadastro');

        document.getElementById('btnAbrirCadastro').addEventListener('click', () => {
            formLogin.classList.add('d-none');
            formCadastro.classList.remove('d-none');
        });

        document.getElementById('btnVoltarLogin').addEventListener('click', () => {
            formCadastro.classList.add('d-none');
            formLogin.classList.remove('d-none');
        });

        // ---------- Mostrar dados do idoso só para "Responsável pelo idoso" ----------
        const dadosIdoso = document.getElementById('dadosIdoso');
        const camposIdoso = dadosIdoso.querySelectorAll('input');
        const opcoesPerfil = document.querySelectorAll('input[name="perfil"]');

        opcoesPerfil.forEach((opcao) => {
            opcao.addEventListener('change', () => {
                const ehResponsavel = document.getElementById('perfilResponsavel').checked;

                dadosIdoso.classList.toggle('d-none', !ehResponsavel);

                camposIdoso.forEach((campo) => {
                    campo.required = ehResponsavel;
                });
            });
        });
    </script>
</body>

</html>