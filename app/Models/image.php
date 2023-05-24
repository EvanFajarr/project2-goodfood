<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class image extends Model
{
    use HasFactory;
    // protected $fillable=[
    //     'image',
    //     'product_id',
    // ];
    protected $table =
    'image';
    public function product(){
        return $this->belongsTo(product::class,'product_id');
    }

    protected $guarded = [];
}
