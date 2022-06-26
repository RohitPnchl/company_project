<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignDepartment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function incharge()
    {
        return $this->belongsTo(User::class);
    }
}
