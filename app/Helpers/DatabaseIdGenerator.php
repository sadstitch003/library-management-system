<?php

namespace App\Helpers;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Category;
use App\Models\Member;
use App\Models\Staff;
use App\Models\Loan;
use Carbon\Carbon;

class DatabaseIdGenerator
{
    public static function generateAuthorId($name)
    {
        $name = preg_replace('/[^a-zA-Z\s]/', ' ', $name);
        $words = explode(' ', $name);
        $abbreviation = '';

        if (count($words) == 1) {
            $abbreviation = strtoupper(substr($words[0], 0, 3));
        } else {
            foreach ($words as $word) {
                $abbreviation .= strtoupper(substr($word, 0, 1));
                if (strlen($abbreviation) >= 3) {
                    break;
                }
            }
        }

        while (strlen($abbreviation) < 3) {
            $abbreviation .= '0';
        }

        $counter = 1;
        while (Author::where('author_id', $abbreviation . $counter)->exists()) {
            $counter++;
        }

        return $abbreviation . $counter;
    }

    public static function generateCategoryId($name)
    {
        $name = preg_replace('/[^a-zA-Z\s]/', ' ', $name);
        $words = explode(' ', $name);
        $abbreviation = '';

        if (count($words) == 1) {
            $abbreviation = strtoupper(substr($words[0], 0, 3));
        } else {
            foreach ($words as $word) {
                $abbreviation .= strtoupper(substr($word, 0, 1));
                if (strlen($abbreviation) >= 3) {
                    break;
                }
            }
        }

        while (strlen($abbreviation) < 3) {
            $abbreviation .= '0';
        }

        $counter = 1;
        while (Category::where('category_id', $abbreviation . $counter)->exists()) {
            $counter++;
        }

        return $abbreviation . $counter;
    }

    public static function generateBookId($title) {
        $words = explode(' ', $title);
        $abbreviation = '';

        if (count($words) == 1) {
            $abbreviation = strtoupper(substr($words[0], 0, 5));
        } else {
            foreach ($words as $word) {
                $abbreviation .= strtoupper(substr($word, 0, 1));
                if (strlen($abbreviation) >= 5) {
                    break;
                }
            }
        }
        

        while (strlen($abbreviation) < 5) {
            $abbreviation .= '0';
        }

        $counter = 1;
        while (Book::where('book_id', $abbreviation . $counter)->exists()) {
            $counter++;
        }

        return $abbreviation . $counter;
    }

    public static function generateStaffId($name) {
        $name = preg_replace('/[^a-zA-Z\s]/', ' ', $name);
        $words = explode(' ', $name);
        $abbreviation = '';

        if (count($words) == 1) {
            $abbreviation = strtoupper(substr($words[0], 0, 3));
        } else {
            foreach ($words as $word) {
                $abbreviation .= strtoupper(substr($word, 0, 1));
                if (strlen($abbreviation) >= 3) {
                    break;
                }
            }
        }

        while (strlen($abbreviation) < 3) {
            $abbreviation .= '0';
        }

        $counter = 1;
        while (Staff::where('staff_id', $abbreviation . $counter)->exists()) {
            $counter++;
        }

        return $abbreviation . $counter;
    }

    public static function generateMemberId($name) {
        $name = preg_replace('/[^a-zA-Z\s]/', ' ', $name);
        $words = explode(' ', $name);
        $abbreviation = '';

        if (count($words) == 1) {
            $abbreviation = strtoupper(substr($words[0], 0, 3));
        } else {
            foreach ($words as $word) {
                $abbreviation .= strtoupper(substr($word, 0, 1));
                if (strlen($abbreviation) >= 3) {
                    break;
                }
            }
        }

        while (strlen($abbreviation) < 3) {
            $abbreviation .= '0';
        }

        $counter = 1;
        while (Member::where('member_id', $abbreviation . $counter)->exists()) {
            $counter++;
        }

        return $abbreviation . $counter;
    }

    public static function generateBookCopyId($title, $year) {

        $counter = 1;
        while (BookCopy::where('book_copy_id', $title . '-' . $year . '-' . $counter)->exists()) {
            $counter++;
        }

        return $title . '-' . $year . '-' . $counter;
    }

    public static function generateLoanId() {
        $currDate = Carbon::now()->format('Ymd');
        $counter = 1;
        while (Loan::where('loan_id', $currDate . 'L' . str_pad($counter, 4, '0', STR_PAD_LEFT))->exists()) {
            $counter++;
        }

        return $currDate . 'L' . str_pad($counter, 4, '0', STR_PAD_LEFT);
    }

    public static function generatePublisherId($name) {
        $name = preg_replace('/[^a-zA-Z\s]/', ' ', $name);
        $words = explode(' ', $name);
        $abbreviation = '';

        if (count($words) == 1) {
            $abbreviation = strtoupper(substr($words[0], 0, 3));
        } else {
            foreach ($words as $word) {
                $abbreviation .= strtoupper(substr($word, 0, 1));
                if (strlen($abbreviation) >= 3) {
                    break;
                }
            }
        }

        while (strlen($abbreviation) < 3) {
            $abbreviation .= '0';
        }

        $counter = 1;
        while (Author::where('author_id', $abbreviation . $counter)->exists()) {
            $counter++;
        }

        return $abbreviation . $counter;
    }
}
