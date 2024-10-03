@extends('layouts.app')

@section('content')
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
        <button type="submit" class="btn btn-primary">Atualizar Projeto</button>
    </form>
</div>
@endsection
