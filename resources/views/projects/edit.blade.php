@extends('app')
@section('titulo', 'Edição de funcionário')

@section('conteudo')
    <a href="{{route('projects.index')}}" class="btn btn-outline-secondary mb-5">Voltar</a>

    <h1>Editar Projeto {{$project->id}}</h1>

    <form method="post" action="{{ route('projects.update',$project) }}">
        @method('put')
        @include('projects._form')
    </form>

@endsection