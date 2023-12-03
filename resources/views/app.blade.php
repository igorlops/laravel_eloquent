<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar bg-dark">
        <div class="container d-flex justify-content-between">
            <div style="width:400px" class="menu-pagina d-flex flex-row justify-content-around align-items-center">
                <a class="navbar-brand text-white" href=" {{ route('index') }} ">Home</a>
                <a class="nav-link text-white" href=" {{ route('contato') }} ">Contato</a>
                <a class="nav-link text-white" href=" {{ route('sobre') }} ">Sobre</a>
                <a class="nav-link text-white" href=" {{ route('servicos') }} ">Serviços</a>
            </div>
            <a class="nav-link text-white" href=" {{ route('clients.index') }} ">Clientes</a>
            <a class="nav-link text-white" href=" {{ route('projects.index') }} ">Projetos</a>
            
        </div>
    </nav>

    <div class="container mt-5">
        @yield('conteudo')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>