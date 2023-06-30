<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use Sluggable;

    // protected $fillable = ['category_id','name','code','slug','status','harga','stok','discount'];
    protected $guarded = [];

    protected $table =
    'product';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function subCategory()
    {
        return $this->belongsTo(subCategory::class, 'category_id');
    }

    public function image()
    {
        return $this->hasMany(image::class);
    }

    public function order()
    {
        return $this->belongsTo(order::class);
    }

    public function cart()
    {
        return $this->belongsTo(cart::class);
    }
}
