<?php

namespace App\Models;

use App\Models\JobPosition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    protected $guarded = [];

    public function jobPositions(){
        return $this->hasMany(JobPosition::class);
    }
}
