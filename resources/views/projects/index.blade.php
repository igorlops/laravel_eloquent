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
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td><a href=" {{route('projects.show',$project)}}">{{$project->nome}}</a></td>
                    <td>{{ $project->client->nome }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <a href="{{ route('projects.create') }}" class="btn btn-primary">Novo projecte</a> --}}

@endsection