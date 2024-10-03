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
