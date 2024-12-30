<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $primaryKey = 'loan_id';

    protected $table = 'loans';

    protected $fillable = [
        'loan_id',
        'admin_id',
        'member_id',
        'book_copy_id',
        'loan_date',
        'loan_status',
        'return_date',
        'return_date_actual',
        'return_book_condition',
        'status_del'
    ];

    protected $casts = [
        'loan_id' => 'string',
        'loan_date' => 'datetime',
        'return_date' => 'datetime',
        'return_date_actual' => 'datetime',
    ];

    public function bookCopy()
    {
        return $this->belongsTo(BookCopy::class, 'book_copy_id', 'book_copy_id')
                    ->where('status_del', false);
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'member_id')
                    ->where('status_del', false);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id')
                    ->where('status_del', false);
    }

    public function getMember()
    {
        return $this->member; 
    }

    public function getBookCopy()
    {
        return $this->bookCopy;
    }

    public function getBook()
    {
        return $this->bookCopy->book;
    }

    public function isLate()
    {
        return now()->greaterThan($this->return_date) || ($this->return_date_actual !== null && $this->return_date_actual->greaterThan($this->return_date));
    }
}
