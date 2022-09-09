<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "title","slug","description",
        "price","image","inStock",
        "category_id"
    ];
    public function getRouteKeyName(){
        return "slug";
    }
    public function category(){
        return $this->belongsTo(Category::class);}
    use HasFactory;
}
