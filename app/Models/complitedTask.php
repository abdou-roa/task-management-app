<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complitedTask extends Model
{
    use HasFactory;


    protected $fillable = [
        
    ];
    protected $attributes = [
        'is_completed'=>true
    ];
    protected $dataformat= "Y-m-d";
    public $timestamps=false;
}
