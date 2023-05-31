<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class subCategory extends Model
{
  
    use Sluggable;

    protected $fillable = ['parent_id','name','code','slug','status'];

    protected $table =
    'sub_category';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(category::class,'parent_id');
    }
    public function product()
    {
        return $this->belongsTo(product::class,'category_id');
    }
}
