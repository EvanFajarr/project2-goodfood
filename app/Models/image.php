<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    // protected $fillable=[
    //     'image',
    //     'product_id',
    // ];
    protected $table =
    'image';

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    protected $guarded = [];
}
