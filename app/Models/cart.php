<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;


class cart extends Model
{
 

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    protected $table =
    'cart';

    protected $guarded = ['id'];
}
