<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Lista os clientes
     * @return string
     */
    public function index() : View
    {
        $clientes = Client::paginate(10);
        return view("clients.index", [
            "clients"=> $clientes
        ]
        );
    }

    /**
     * Visualiza detalhes do clientes
     *
     * @param Client $client
     * @return string
     */
    public function show(Client $client) :View
    {;
        return view("clients.show", [
            "client"=>$client
        ]);
    }

    /**
     * Exibe o formulário de criação de cliente
     *
     * @return View
     */
    public function create() :View
    {
        return view("clients.create");
    }

    /**
     * Insert dados no banco de dados e redireciona para View de lista de clientes
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(ClientRequest $request):RedirectResponse
    {
        $dados = $request->except('_token');
        Client::create($dados);

        return redirect()->route('clients.index')
        ->with('mensagem','Cadastrado com sucesso!');
    }


/**
 * Abre view de formulário com os dados preenchidos
 *
 * @param Client $client
 * @return View
 */
    public function edit(Client $client) :View
    {
        return view('clients.edit', [
            'client'=>$client
        ]);
    }

/**
 * Atualiza cliente
 *
 * @param Client $client
 * @param Request $request
 * @return RedirectResponse
 */
    public function update(Client $client, ClientRequest $request):RedirectResponse
    {
        $client->update([
            'nome'=>$request->nome,
            'endereco'=>$request->endereco,
            'observacao'=>$request->observacao
        ]);

        return redirect()->route('clients.index')->with('mensagem','Atualizado com sucesso');
    }

/**
 * Deleta cliente
 *
 * @param Client $client
 * @return RedirectResponse
 */
    public function destroy(Client $client):RedirectResponse
    {
        $client->delete();

        return redirect()->route('clients.index')->with('deletado','Item deletado com sucesso!');
    }
}
