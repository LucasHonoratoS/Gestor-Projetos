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
        if ($this->tasks->isEmpty()) {
            return 'planejado';
        } elseif ($this->tasks->where('completed', false)->isEmpty()) {
            return 'completo';
        } else {
            return 'em andamento';
        }
    }

}
