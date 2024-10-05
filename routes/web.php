<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

// Rota principal do aplicativo
Route::get('/', function () {
    return view('welcome');
});

// Rotas para gerenciamento de projetos
Route::resource('projects', ProjectController::class);

// Rotas para tarefas
Route::resource('tasks', TaskController::class);

// Rota para alternar a conclusão de uma tarefa
Route::patch('tasks/{task}/toggle', [TaskController::class, 'toggleComplete'])->name('tasks.toggleComplete');

// Rotas específicas para criar uma nova tarefa dentro de um projeto
Route::get('projects/{project}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');

// Rota para editar uma tarefa específica
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

// Rota para atualizar uma tarefa específica
Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');