<?php
namespace App\Enum;

use Filament\Support\Contracts\HasLabel;
 
enum RoleUsers: string implements HasLabel
{
    case hocvien = '0';
    case ADMIN = '1';
    
    
    public function getLabel(): ?string
    {
        return $this->name;
    
        return match ($this) {
            self::hocvien => 'Học viên',
            self::ADMIN => 'ADMIN'
            
        };
    }
}