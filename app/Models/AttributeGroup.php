<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    use HasFactory;

    protected $table = 'attributesgroup';

    public function attributesValue()
    {
        return $this->hasMany(AttributeValue::class,'attributeGroup_id');
    }

    public function categories()
    {
        return $this->belongsToMany(category::class,'attributegroup_category','attributeGroup_id','category_id');
    }
}
