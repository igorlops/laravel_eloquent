<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Address;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():\Illuminate\Contracts\View\View
    {
        $funcionarios = Employee::paginate(15);
        return view('employees.index',['employees'=>$funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():\Illuminate\Contracts\View\View
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(EmployeeRequest $request)
    {
        DB::transaction(function() use($request){
            $employee = Employee::create(
                $request->only(['nome','cpf','data_contratacao'])
            );
            $employee->address()->create(
                $request->only(['logradouro','numero','complemento','bairro','cidade','cep','estado'])
            );
        });
        return redirect()->route('employees.index')
        ->with('mensagem','Funcionário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id):\Illuminate\Contracts\View\View
    {
        $funcionario = Employee::findOrFail($id);
        return view('employees.show',['employee'=>$funcionario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id):\Illuminate\Contracts\View\View
    {
        $funcionario = Employee::findOrFail($id);
        return view('employees.edit',['employee'=>$funcionario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(EmployeeRequest $request, $id)
    {
        $funcionario = Employee::findOrFail($id);
        DB::transaction(function() use($request, $funcionario){
            $funcionario->update($request->only('nome','cpf','data_contratacao'));
            $funcionario->address()->update(
                $request->only(['logradouro','numero','complemento','bairro','cidade','cep','estado']));
        });
        return redirect()->route('employees.index')->with('mensagem','Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $funcionario = Employee::findOrFail($id);
        DB::transaction(function() use($funcionario){
            $funcionario->address->delete();
            $funcionario->delete();
        });
        return redirect()->route('employees.index')->with('deletado',"Funcionário $funcionario->nome deletado com sucesso!");
    }
}
