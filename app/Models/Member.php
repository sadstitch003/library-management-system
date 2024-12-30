<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'member_id';
    public $incrementing = false;

    protected $fillable = [
        'member_id', 'member_name', 'member_address', 'member_phone', 'member_email', 'status_del'
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'member_id', 'member_id');
    }
}
