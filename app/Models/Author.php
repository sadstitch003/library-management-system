<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $primaryKey = 'author_id';

    public $incrementing = false;

    protected $fillable = [
        'author_id',
        'author_name',
        'status_del',
    ];

    // Define relationship to the Book model
    public function books()
    {
        return $this->belongsToMany(Book::class, 'author_id', 'author_id')
                    ->where('status_del', false);
    }
}
