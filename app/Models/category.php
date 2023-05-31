<?php

namespace App\Models;

use App\Models\subCategory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class category extends Model
{

    use Sluggable;
    protected $fillable = ['name','code','slug','status'];

    protected $table =
    'category';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function subCategory()
    {
        return $this->belongsTo(subCategory::class);
    }
    
}
