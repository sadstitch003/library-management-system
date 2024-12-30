<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $primaryKey = 'book_id';

    public $incrementing = false;

    protected $fillable = [
        'book_id',
        'book_title',
        'status_del',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author', 'book_id', 'author_id')
                    ->where('authors.status_del', false);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id')
                    ->where('categories.status_del', false); 
    }

    public function bookCopies()
    {
        return $this->hasMany(BookCopy::class, 'book_id', 'book_id')
                    ->where('status_del', false); 
    }

    public function getAvailableBookCopyCount(): int
    {
        return $this->bookCopies()->where('is_available', true)
                    ->where('status_del', false)
                    ->count();
    }

    public function getBookCopies()
    {
        return $this->bookCopies()->where('status_del', false)->get();
    }

    public function getAuthor()
    {
        return $this->authors()->where('status_del', false)->get();
    }

    public function getCategory()
    {
        return $this->categories()->where('status_del', false)->get();
    }
}
