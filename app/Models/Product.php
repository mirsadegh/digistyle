<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class,'attributeValue_product','product_id','attributeValue_id');
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }
}
