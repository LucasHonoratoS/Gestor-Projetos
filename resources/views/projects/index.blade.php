@extends('layouts.app')

@section('content')
<style>
    .kanban-column {
        min-height: 400px;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        background-color: #f8f9fa;
    }
    .card {
        transition: transform 0.2s;
    }
    .card:hover {
        transform: scale(1.05);
    }
</style>

<div class="container">
    <h1 class="text-center">Projetos</h1>

    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-4">Criar Novo Projeto</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Kanban layout for project statuses -->
    <div class="row">
        <!-- Planned Projects -->
        <div class="col-md-4">
            <h3 class="text-center">Planejado</h3>
            <div class="kanban-column">
                @foreach($projects as $project)
                    @if($project->status == 'planejado')
                        <div class="card mb-3 shadow-sm" style="cursor:pointer;" onclick="window.location.href='{{ route('projects.edit', $project) }}'">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $project->name }}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- In Progress Projects -->
        <div class="col-md-4">
            <h3 class="text-center">Em Andamento</h3>
            <div class="kanban-column">
                @foreach($projects as $project)
                    @if($project->status == 'em andamento')
                        <div class="card mb-3 shadow-sm" style="cursor:pointer;" onclick="window.location.href='{{ route('projects.edit', $project) }}'">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $project->name }}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Completed Projects -->
        <div class="col-md-4">
            <h3 class="text-center">Completos</h3>
            <div class="kanban-column">
                @foreach($projects as $project)
                    @if($project->status == 'completo')
                        <div class="card mb-3 shadow-sm" style="cursor:pointer;" onclick="window.location.href='{{ route('projects.edit', $project) }}'">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $project->name }}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
