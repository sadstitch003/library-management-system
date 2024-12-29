<?php

namespace App\Helpers\Enums;

enum BookCondition: string
{
    case GOOD = 'Good'; 
    case USED = 'Used'; 
    case DAMAGED = 'Damaged';
    case POOR = 'Poor';
}