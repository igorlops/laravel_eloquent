@extends('app')
@section('titulo', 'Detalhes do projeto')

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h2>{{ $project['nome'] }}</h2>
            <div>
            <div class="card-text">
                <p><strong>ID: </strong>#{{$project['id']}}</p>
                <p><strong>Cliente: </strong>{{ $project['client']['nome'] }}</p>
            </div>
        </div>
    </div>
    <hr>
    <h2 class="mt-5">Funcionários que trabalham no projeto</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="row">ID</th>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($project->employees as $employee)
                <tr>
                    <th scope="row">{{ $employee->id }}</th>
                    <td>{{$employee->nome}}</td>
                </tr>
            @empty
                <tr>
                    <th scope="row"></th>
                    <td>Nenhum funcionário cadastrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
        
    <a href=" {{ route('projects.index') }}" class="btn btn-secondary">Voltar</a>

@endsection