<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getStatusAttribute()
    {
        $totalTasks = $this->tasks()->count();
        $completedTasks = $this->tasks()->where('completed', true)->count();

        if ($totalTasks === 0) {
            return 'planejado'; // Se não houver tarefas, considerar como planejado
        } elseif ($completedTasks === $totalTasks) {
            return 'concluído';
        } else {
            return 'em andamento';
        }
    }
}
