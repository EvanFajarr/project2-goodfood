<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'no',
        'product_id',
        'note',
        'user_id',
        'status',
        'total',
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
