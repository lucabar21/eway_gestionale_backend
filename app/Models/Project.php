<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_project');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
