<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $primaryKey = 'admin_id';
    public $incrementing = false;

    protected $fillable = [
        'admin_id', 'admin_name', 'admin_email', 'admin_password', 'status_del'
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'member_id', 'member_id')
                    ->where('status_del', false);
    }

    public function getAuthIdentifierName()
    {
        return 'admin_email';  
    }

    public function getAuthPassword()
    {
        return $this->admin_password;
    }
}
