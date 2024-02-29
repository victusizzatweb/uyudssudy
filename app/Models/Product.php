<?php

namespace App\Models;
use App\Models\Catigory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected  $guarded =['id'];
    public function category(){
        return $this->belongsTo(Catigory::class); 
    }
    protected $fillable = [ 'title_uz', 'title_ru', 'title_en', 'category_id','image'];

}
