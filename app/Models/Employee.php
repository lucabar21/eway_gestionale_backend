<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'surname', 'email', 'specialization'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_project');
    }
}
