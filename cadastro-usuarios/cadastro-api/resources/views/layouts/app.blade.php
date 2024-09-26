<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.9.55/css/materialdesignicons.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px;
        }
        .sidebar {
            position: fixed;
            top: 56px; 
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 20px 0;
            overflow-x: hidden;
            overflow-y: auto;
            background-color: #1976D2;
        }
        .sidebar .nav-link {
            color: white;
            padding: 10px 20px;
        }
        .sidebar .nav-link:hover {
            background-color: #1565C0;
        }
        .main-content {
            margin-left: 250px; /* Largura da sidebar */
            padding: 20px;
        }
        .navbar-brand img {
            height: 30px; /* Ajuste conforme necessário */
        }
        @media (max-width: 767.98px) {
            .sidebar {
                top: 56px;
                padding-top: 0;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('users.index') }}">
                                <i class="mdi mdi-account-group me-2"></i>
                                Usuários
                            </a>
                        </li>
                        <!-- Adicione mais itens de menu conforme necessário -->
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
