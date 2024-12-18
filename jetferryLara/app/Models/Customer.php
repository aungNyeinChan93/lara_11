<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected $guarded = [];

    public function types(){
        return $this->belongsToMany(Type::class);
    }
    // $c = App\Models\Customer::find(10)->types()->attach(3)
}
