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
     * @param integer $id
     * @return string
     */
    public function show(int $id) :View
    {
        $client = Client::findOrFail($id);
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
 * @param integer $id
 * @return View
 */
    public function edit(int $id) :View
    {
        $client = Client::findOrFail($id);

        return view('clients.edit', [
            'client'=>$client
        ]);
    }



/**
 * Atualiza cliente
 *
 * @param integer $id
 * @param Request $request
 * @return RedirectResponse
 */
    public function update(int $id, ClientRequest $request):RedirectResponse
    {
        $client = Client::findOrFail($id);
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
 * @param integer $id
 * @return RedirectResponse
 */
    public function destroy(int $id):RedirectResponse
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('deletado','Item deletado com sucesso!');
    }
}
