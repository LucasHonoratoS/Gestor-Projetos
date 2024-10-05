@extends('layouts.app')

@section('content')
<style>
/* Esconder o checkbox original */
input[type="checkbox"] {
    display: none; /* Esconder o checkbox */
}

/* Estilizar o label do checkbox */
.custom-checkbox {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 2px solid #ccc; /* Cor da borda padrão */
    border-radius: 4px; /* Bordas arredondadas */
    cursor: pointer; /* Cursor de ponteiro */
    position: relative; /* Para posicionar o estado "checked" */
    background-color: white; /* Fundo branco */
}

/* Quando o checkbox estiver selecionado */
input[type="checkbox"]:checked + .custom-checkbox {
    background-color: green; /* Cor de fundo verde */
    border-color: green; /* Cor da borda verde */
}

/* Marcar o "check" dentro do label */
input[type="checkbox"]:checked + .custom-checkbox:after {
    content: '';
    position: absolute;
    top: 1px;
    left: 5px;
    width: 6px;
    height: 12px;
    border: solid white; /* Cor do "check" */
    border-width: 0 2px 2px 0; /* Formato do "check" */
    transform: rotate(45deg);
}
</style>


<div class="container">
    <h1>Editar Projeto: {{ $project->name }}</h1>

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description">{{ $project->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2 mb-4">Atualizar Projeto</button>
        <!-- Tabela de Tarefas -->
        <h3>Tarefas</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Concluída</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($project->tasks as $task)
                    @include("tasks.table")
                @endforeach
                @include("tasks.script")
            </tbody>
        </table>

        <!-- Botão para ir à página de criação de tarefas -->
        <a href="{{ route('tasks.create', $project->id) }}" class="btn btn-primary mb-4">Adicionar Nova Tarefa</a>
    </form>
</div>
@endsection

