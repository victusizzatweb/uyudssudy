<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = [ 'title_uz', 'title_ru', 'title_en', 'text_uz', 'text_ru', 'text_en','image'];
}
