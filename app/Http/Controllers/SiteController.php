<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;

class SiteController extends Controller
{
    /**
     * 
     * Mostra página home
     *
     * @return string
     */
    public function index()
    {
        return view("home");
    }

    /**
     * Mostra página sobre
     *
     * @return string
     */
    public function sobre()
    {
        return view("sobre");
    }

    /**
     * Mostra página contato
     *
     * @return string
     */
    public function contato()
    {
        return view("contato");
    }

    /**
     * Mostra página de serviços
     *
     * @return string
     */
    public function servicos()
    {
        return view("servicos");
    }

    /**
     * Mostra página de serviço por ID
     *
     * @param integer $id
     * @return void
     */
    public function servico(int $id)
    {
        $servicos = [
            1=> [
                "nome" => "Lavagem de roupa",
                "descricao" => "descricao muito longa de roupa"
            ],
            2=> [
                "nome" => "Lavagem de Coberta",
                "descricao" => "descricao muito longa de coberta"
            ],
            3=> [
                "nome" => "Lavagem de Urso ",
                "descricao" => "descricao muito longa de urso"
            ],
        ];
    
        return view("servico")->with('servico', $servicos[$id]);
    }
}
