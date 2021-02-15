<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    protected $table = 'attributesValue';

    public function attributeGroup()
    {
        return $this->belongsTo(AttributeGroup::class,'attributeGroup_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'attributeValue_product','attributeValue_id','product_id');
    }
}
