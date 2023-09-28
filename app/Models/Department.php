<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'company_id',
        'parent_id'
    ];

    public function subDepartment()
    {
        return $this->hasMany(Department::class, 'parent_id');
    }

    public function employees()
    {
        return  $this->hasMany(Employee::class);
    }
}
