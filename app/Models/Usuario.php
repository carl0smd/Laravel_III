<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Usuario extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'usuarios';
    public $timestamps = false;

    //accessor edad con Carbon
    public function getEdadAttribute()
    {
        return Carbon::parse($this->f_nacimiento)->age;
    }

}
