<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Exibe uma lista de tarefas
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Mostra o formulário para criar uma nova tarefa
    public function create($projectId)
    {
        $project = Project::findOrFail($projectId);
        return view('tasks.create', compact('project'));
    }

    // Armazena uma nova tarefa
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'project_id' => 'required|exists:projects,id',
        ]);

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('projects.edit', $request->project_id)->with('success', 'Tarefa adicionada com sucesso!');
    }

    // Mostra uma tarefa específica
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Mostra o formulário para editar uma tarefa existente
    public function edit(Task $task)
    {
        $project = Project::findOrFail($task->project_id);
        return view('tasks.edit', compact('task', 'project'));
    }

    // Atualiza uma tarefa existente
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        $task->update($request->all());

        return redirect()->route('projects.edit', $task->project_id)->with('success', 'Tarefa atualizada com sucesso!');
    }

    // Atualiza o estado de conclusão de uma tarefa
    public function toggleComplete(Task $task)
    {
        $task->completed = !$task->completed; // Alterna o estado de completed
        $task->save();
    
        return response()->json(['completed' => $task->completed]);
    }


    // Remove uma tarefa existente
    public function destroy(Task $task)
    {
        $task->delete();
    
        return response()->json(['success' => true, 'message' => 'Tarefa removida com sucesso!']);
    }
    
}
