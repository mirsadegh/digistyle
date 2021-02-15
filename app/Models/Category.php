<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function children()
    {
        return $this->hasMany(category::class,'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function attributeGroups()
    {
      return $this->belongsToMany(AttributeGroup::class,'attributegroup_category','category_id','attributeGroup_id');
    }
}
