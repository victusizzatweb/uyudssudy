<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected  $guarded =['id'];
    protected $fillable = [ 'title_uz', 'title_ru', 'title_en', 'text_uz', 'text_ru', 'text_en','image', 'text2_uz', 'text2_ru', 'text2_en'];

}
