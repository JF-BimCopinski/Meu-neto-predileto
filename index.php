<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Meu Neto Predileto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <main class="tela-login container d-flex flex-column align-items-center text-center py-5">

        <h1 class="titulo-login text-white mt-4">MEU NETO<br>PREDILETO</h1>

        <form action="autenticar.php" method="POST" class="w-100 mt-5">

            <!-- Mensagem de erro (só aparece se voltar do autenticar.php com ?erro=1) -->
            <?php if (isset($_GET['erro'])) { ?>
                <div class="alert alert-danger py-2 small" role="alert">
                    Telefone ou senha incorretos.
                </div>
            <?php } ?>

            <!-- Campo de telefone -->
            <div class="campo mx-auto mb-4">
                <input type="tel" class="form-control rounded-pill" id="telefone" name="telefone"
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
            <a href="familiar.php" class="btn btn-familiar w-75 d-block mx-auto">
                ACESSE COMO FAMILIAR
            </a>
        </form>
    </main>

    <script>
        // Máscara do telefone: (41) 99999-9999
        const campoTelefone = document.getElementById('telefone');

        campoTelefone.addEventListener('input', () => {
            // tira tudo que não for número e limita a 11 dígitos
            let numeros = campoTelefone.value.replace(/\D/g, '').slice(0, 11);

            if (numeros.length > 10) {
                numeros = numeros.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
            } else if (numeros.length > 6) {
                numeros = numeros.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
            } else if (numeros.length > 2) {
                numeros = numeros.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
            }

            campoTelefone.value = numeros;
        });
    </script>
</body>
</html>