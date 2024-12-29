<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'author_name'
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    public function books()
    {
        return $this->belongsToMany(Book::class,'book_author', 'author_id', 'book_id');
    }
}
