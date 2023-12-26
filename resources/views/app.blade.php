<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <nav class="navbar bg-dark">
        <div class="d-flex justify-content-around col-6">
            <a href="{{route('home')}}" class="nav-link text-white">Logo</a>
            <a class="nav-link text-white" href=" {{ route('clients.index') }} ">Clientes</a>
            <a class="nav-link text-white" href=" {{ route('employees.index') }} ">Funcionários</a>
            <a class="nav-link text-white" href=" {{ route('projects.index') }} ">Projetos</a>
            
        </div>
    </nav>
    @if (session('mensagem'))
        <div class="alert alert-success">{{session('mensagem')}}</div>
    @endif
    @if (session('deletado'))
        <div class="alert alert-danger">{{session('deletado')}}</div>
    @endif
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li class="container"><strong>{{$error}}</strong></li>
            @endforeach
        </ul>
    @endif
    <div class="container mt-5 mb-5">
        @yield('conteudo')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {

                $('#cliente').select2(
                    {
                        theme:"bootstrap"
                    }
                );
                $('#funcionario').select2(
                    {
                        theme:"classic"
                    }
                );
            });
        </script>
</body>

</html>