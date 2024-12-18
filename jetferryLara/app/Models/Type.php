<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /** @use HasFactory<\Database\Factories\TypeFactory> */
    use HasFactory;

    protected $guarded = [];

    public function customers(){
        return $this->belongsToMany(Customer::class);
    }
    // $t = App\Models\Type::find(1)->customers()->attach(7)
    //
}
