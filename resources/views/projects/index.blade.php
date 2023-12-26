@extends('app')
@section('titulo', 'Lista de projetos')

@section('conteudo')
    <h1>Todos os nosso projectes:</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="row">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td><a href=" {{route('projects.show',$project)}}">{{$project->nome}}</a></td>
                    <td>{{ $project->client->nome }}</td>
                    <td>
                        <a href="{{route('projects.edit',$project)}}" class="btn btn-primary">Atualizar</a>
                        <form action="{{route('projects.destroy', $project)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar?')">Apagar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{route('projects.create')}}" class="btn btn-primary">Novo projeto</a>

@endsection