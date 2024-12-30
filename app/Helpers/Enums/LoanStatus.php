<?php

namespace App\Helpers\Enums;

enum LoanStatus: string
{
    case ACTIVE = 'Active';
    case RETURNED = 'Returned';
    case RETURNED_LATE = 'Returned Late';
}
