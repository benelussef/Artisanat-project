<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
  use HasFactory;
  protected $fillable = [
    "user_id", "product_name", "qty",
    "price", "total",
    "paid","delivered"
  ];  
  public function user(){
    return $this->belongsTo(User::class);
  }
}
