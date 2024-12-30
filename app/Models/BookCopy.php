<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    protected $primaryKey = 'book_copy_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'book_copy_id',
        'book_id',
        'publisher_id',
        'book_condition',
        'year_published',
        'is_available',
        'status_del',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id')
                    ->where('status_del', false);
    }

    public function publishers()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'publisher_id')
                    ->where('status_del', false);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class, 'book_copy_id', 'book_copy_id')
                    ->where('status_del', false);
    }

    public function getBook()
    {
        return $this->book()
                    ->where('status_del', false)->get();
    }

    public function getPublisher()
    {
        return $this->publishers()
                    ->where('status_del', false)->get();
    }
}
