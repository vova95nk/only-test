<?php

declare(strict_types=1);

namespace App\Enums;

enum DriverPositions: string
{
    case Economy = 'economy';

    case Comfort = 'comfort';

    case Business = 'business';
}
