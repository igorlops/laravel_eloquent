<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
class Saudacao extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  string $nome
     * @return string
     */
    public function __invoke(string $nome = null)
    {
        // return view('saudacao', [ "nome" => $nome ]);
        return view('saudacao')->with("nome", $nome);
    }
}
