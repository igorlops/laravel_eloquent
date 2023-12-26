<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InativarFuncionario extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function __invoke(int $id): \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector

    {
        $employee = Employee::findOrFail($id);

        if($employee->data_demissao) {
            return redirect()->route('employees.show', $employee)
            ->with('mensagem',"Esse funcionário já está inativo");
        }
        $employee->data_demissao = Carbon::now();
        $employee->save();
        return redirect()->route('employees.show', $employee)
        ->with('mensagem',"Funcionário inativado com sucesso");
    }
}
