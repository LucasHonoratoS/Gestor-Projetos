<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Definindo os atributos que podem ser preenchidos em massa
    protected $fillable = [
        'project_id', // Relacionamento com o projeto
        'name',
        'description',
        'completed', // Indica se a tarefa foi concluída ou não
    ];

    // Relacionamento com o modelo Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
