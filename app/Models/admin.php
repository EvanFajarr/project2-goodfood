<?php

namespace App\Models;


use App\Models\admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{   
    use HasRoles;

    protected $table = 'admin';
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'alamat',
    //     'no',


    // ];

    protected $guarded = [];
  
    Protected $guard_name ='admin'; // added
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function assignRole($role)
    {
        $this->roles()->sync([$role]);
    }
}