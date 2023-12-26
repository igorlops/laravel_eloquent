@extends('app')
@section('titulo', 'Novo funcionário')

@section('conteudo')
    <a href="{{route('projects.index')}}" class="btn btn-outline-secondary mb-5">Voltar</a>

    <h1>Novo projeto</h1>

    <form method="post" action="{{ route('projects.store') }}">
        @include('projects._form')
    </form>

@endsection