<?php

namespace App\Helpers\Enums;

enum BookCondition: string
{
    case GOOD = 'Good';
    case SLIGHT_DAMAGE = 'Slight Damage'; 
    case SEVERE_DAMAGE = 'Severe Damage';
}