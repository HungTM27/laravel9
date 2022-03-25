<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','quantity','description','price','status','cate_id'];
    protected $table = "products";
    public $timestamps = false;
     public function category(){
        //  quan hệ n -> 1 (từ bảng con => bảng cha)
        return $this->belongsTo(Category::class, 'cate_id');

}
}
