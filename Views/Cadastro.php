<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registre-se</title>

    <!-- Bootstrap CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <style>
        html,
        body {
            height: 100%;
        }

        .form-container {
            max-width: 350px;
            padding: 1rem;
        }

        .bg-body-tertiary {
            background-color: #212529;
        }

        .navbar-nav {
            display: flex;
            justify-content: end;
            width: 100%;
        }
    </style>
</head>

<body class="d-flex flex-column bg-body-tertiary">
    <!-- NavBar -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img
                    src="./Views/Img/logo.png"
                    width="180"
                    height="50"
                    alt="" />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuNavBar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuNavBar">
                <div class="navbar-nav">
                    <a href="#" class="nav-link active">Home</a>
                    <a href="#" class="nav-link">Produtos</a>
                </div>
            </div>
        </div>
    </nav>

    <div
        class="d-flex align-items-center justify-content-center flex-grow-1">
        <main class="w-100 form-container">
            <form action="../Controllers/CadastraUsuario.php" method="POST">
                <div class="text-center">
                    <img
                        class="mb-4"
                        height="60"
                        width="200"
                        src="./Views/Img/logo.png"
                        alt="ICODENEW-logo" />
                </div>
                <h1 class="h3 mb-3 fw-normal text-center">
                    Bem-vindo de volta!
                </h1>

                <?php if (isset($_GET["error"]) && $_GET["error"] == "fieldEmpty") : ?>
                    <div class="alert alert-danger" role="alert">
                        Os campos não devem estar vazios!
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET["error"]) && $_GET["error"] == "InternalServerError") : ?>
                    <div class="alert alert-danger" role="alert">
                        Erro Interno do Servidor!
                    </div>
                <?php endif; ?>

                <div class="form-floating mb-3">
                    <input
                        class="form-control"
                        type="text"
                        name="nome"
                        id=""
                        placeholder=""
                        required />
                    <label for="emailInput">Nome Completo:</label>
                </div>

                <div class="form-floating mb-3">
                    <input
                        class="form-control"
                        type="email"
                        name="email"
                        id="emailInput"
                        placeholder="email@example.com"
                        required />
                    <label for="emailInput">Email:</label>
                </div>

                <div class="form-floating mb-3">
                    <input
                        class="form-control"
                        type="password"
                        name="senha"
                        id="passwordInput"
                        placeholder="Senha"
                        required />
                    <label for="passwordInput">Senha:</label>
                </div>

                <div class="form-check text-start mb-3">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="rememberMeCheck" />
                    <label class="form-check-label" for="rememberMeCheck">
                        Lembrar senha
                    </label>
                </div>

                <input class="btn btn-primary w-100 py-2" name="submit" type="submit" value="Entrar">

                <div class="text-center mt-3">
                    <a href="./Login.php" class="text-decoration-none">Login</a>
                </div>

            </form>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>