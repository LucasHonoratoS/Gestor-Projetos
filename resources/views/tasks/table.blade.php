<tr>
    <td>{{ $task->name }}</td>
    <td>{{ $task->description }}</td>
    <td>
        <div class="form-check">
            <input type="checkbox" id="task-{{ $task->id }}" {{ $task->completed ? 'checked' : '' }} disabled>
            <label for="task-{{ $task->id }}" class="custom-checkbox"></label>
        </div>
    </td>
    <td>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Editar</a>
        <button type="button" class="btn btn-success btn-sm toggle-complete" data-id="{{ $task->id }}">
            {{ $task->completed ? 'Marcar como Incompleta' : 'Marcar como Completa' }}
        </button>
        <button type="button" class="btn btn-danger btn-sm delete-task" data-id="{{ $task->id }}">
            Excluir
        </button>
    </td>
</tr>

