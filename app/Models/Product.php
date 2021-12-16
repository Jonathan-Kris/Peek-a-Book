<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $guarded = [ 'product_id' ];

    public function detailTransaction(){
        return $this->hasMany(DetailTransaction::class, 'product_id', 'product_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
