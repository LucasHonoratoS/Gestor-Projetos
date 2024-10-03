@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->name }}</h1>
    <p>{{ $project->description }}</p>

    <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
