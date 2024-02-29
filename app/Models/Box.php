<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;
    protected  $guarded =['id'];
    protected $fillable = [ 'value', 'text_uz', 'text_ru', 'text_en'];
}
