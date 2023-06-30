<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'no',
        'product_id',
        'note',
        'user_id',
        'status',
        'total',
        'code',
        'pembayaran',
    ];

    protected $guarded = ['id'];

    protected $table =
    'orders';

    public function user()
    {
        return $this->belongsTo(user::class);
    }
    // public function product()
    // {
    //     return $this->belongsTo(product::class,'product_id');
    // }

}
