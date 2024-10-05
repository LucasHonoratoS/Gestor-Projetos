@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Nova Tarefa para o Projeto: {{ $project->name }}</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="hidden" name="project_id" value="{{ $project->id }}">

        <div class="form-group">
            <label for="name">Nome da Tarefa</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição da Tarefa</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Tarefa</button>
    </form>

    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-secondary mt-4">Voltar ao Projeto</a>
</div>
@endsection
