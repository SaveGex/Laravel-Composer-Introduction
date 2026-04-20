<?php

namespace App\Types;

enum FlashTypes : string
{
    case Warning = 'warning';
    case Success = 'success';
    case Danger = 'danger';
    case Info = 'info';
    
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
