@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Projetos</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Criar Novo Projeto</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
