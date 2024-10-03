<?php

namespace App\Http\Controllers;

use App\Models\Task;
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
    public function create()
    {
        return view('tasks.create');
    }

    // Armazena uma nova tarefa
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    // Mostra uma tarefa específica
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Mostra o formulário para editar uma tarefa existente
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Atualiza uma tarefa existente
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    // Atualiza o estado de conclusão de uma tarefa
    public function toggleComplete(Task $task)
    {
        $task->completed = !$task->completed; // Alterna o estado de completed
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    // Remove uma tarefa existente
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarefa removida com sucesso!');
    }
}
