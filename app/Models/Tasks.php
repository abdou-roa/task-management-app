<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    
    protected $attributes = [
        'is_completed'=>false
    ];
    protected $dataformat= "Y-m-d";
    public $timestamps=false;
}
