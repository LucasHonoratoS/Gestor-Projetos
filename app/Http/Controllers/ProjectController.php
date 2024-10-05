<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Exibe uma lista de projetos
    public function index()
    {
        $projects = Project::all(); // Obtém todos os projetos
        return view('projects.index', compact('projects')); // Retorna a view com os projetos
    }

    // Mostra o formulário para criar um novo projeto
    public function create()
    {
        return view('projects.create'); // Retorna a view para criar um projeto
    }

    // Armazena um novo projeto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Project::create($request->all()); // Cria um novo projeto com os dados do formulário
        return redirect()->route('projects.index')->with('success', 'Projeto criado com sucesso!'); // Redireciona para a lista de projetos
    }

    // Mostra um projeto específico
    public function show(Project $project)
    {
        return view('projects.show', compact('project')); // Retorna a view do projeto específico
    }

    // Mostra o formulário para editar um projeto existente
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project')); // Retorna a view para editar o projeto
    }

    // Atualiza um projeto existente
    public function update(Request $request, Project $project)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Atualizar os dados do projeto
        $project->name = $request->name;
        $project->description = $request->description;

        // Salvar as alterações
        $project->save();

        // Redirecionar com mensagem de sucesso
        return redirect()->route('projects.index', $project->id)->with('success', 'Projeto atualizado com sucesso!');
    }

    // Remove um projeto existente
    public function destroy(Project $project)
    {
        $project->delete(); // Exclui o projeto
        return redirect()->route('projects.index')->with('success', 'Projeto removido com sucesso!'); // Redireciona para a lista de projetos
    }
}
    