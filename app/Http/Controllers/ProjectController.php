<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        $projects = Project::with('client')->get();
        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View

    {
        $clientes = Client::get();
        $funcionarios = Employee::ativos();
        return view('projects.create',[
            'clients'=>$clientes,
            'employees'=>$funcionarios
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request): \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        DB::transaction(function()use($request){

            $project = Project::create(
                $request->except(['_token','funcionarios'])
            );
            $project->employees()->attach($request->funcionarios);
        });
        return redirect()->route('projects.index')
            ->with('mensagem','Projeto salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * 
     */
    public function show(Project $project)
    {
        $project->load('client','employees');
        return view('projects.show', [
            'project'=>$project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $project = Project::findOrFail($id);
        $clientes = Client::get();
        $funcionarios = Employee::ativos();
        return view('projects.edit',['project'=>$project,'clients'=>$clientes,'employees'=>$funcionarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id): \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        // dd($request->all());
        $project = Project::findOrFail($id);
        DB::transaction(function()use($request,$project){

            $project->update(
                $request->except(['_token','funcionarios'])
            );
            $project->employees()->sync($request->funcionarios);
        });
        return redirect()->route('projects.index')
            ->with('mensagem','Projeto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector

    {
        $project = Project::findOrFail($id);
        DB::transaction(function() use($project) {
            $project->employees()->sync([]);
            $project->delete();
        });
        return redirect()->route('projects.index')->with('deletado','Projeto deletado com sucesso');
    }
}
