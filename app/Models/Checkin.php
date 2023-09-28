<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkin extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'employee_id',
        'is_checkin'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
