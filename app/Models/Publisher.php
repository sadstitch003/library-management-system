<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $primaryKey = 'publisher_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'publisher_id',
        'publisher_name',
        'status_del',
    ];

    public function bookCopies()
    {
        return $this->hasMany(BookCopy::class, 'publisher_id', 'publisher_id')
                    ->where('book_copies.status_del', false);
    }
}
