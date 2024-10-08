<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'manager_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'hire_date',
        'salary',
        'is_active',
        'profile_picture',
    ];

    protected $casts = [
       'is_active' => 'boolean',
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function manager(){
        return $this->belongsTo(Manager::class);
    }
}
