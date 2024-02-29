<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected  $guarded =['id'];
    protected $fillable = ['location_uz', 'location_ru', 'location_en','header_logo', 'location_image', 'working_time', 'working_t_image','phone','phone_image','map'];
   
}
