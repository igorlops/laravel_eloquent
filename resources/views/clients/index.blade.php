@extends('app')
@section('titulo', 'Lista de clientes')

@section('conteudo')
    <h1>Todos os nosso clientes:</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="row">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">Observacao</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <th scope="row">{{ $client['id'] }}</th>
                    <td><a href=" {{ route('clients.show',$client)}} ">{{$client['nome']}}</a></td>
                    <td>{{ $client['endereco'] }}</td>
                    <td>{{ $client['observacao'] }}</td>
                    <td class="d-flex justify-content-center flex-row">
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary">Editar</a>
                        <form action="{{route('clients.destroy', $client)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar?')">Apagar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('clients.create') }}" class="btn btn-primary">Novo cliente</a>

@endsection