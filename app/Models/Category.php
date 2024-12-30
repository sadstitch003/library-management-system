<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    public $incrementing = false;

    protected $fillable = [
        'category_id',
        'category_name',
        'status_del',
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'category_id', 'category_id')->where('status_del', false);
    }
}
