<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    const DEPARTMENT_HOME = "Department of Home";
    const DEPARTMENT_EDUCATION = "Department of Education";
    const DEPARTMENT_INFORMATION = "Department of Information & International Relations";
    const DEPARTMENT_HEALTH = "Department of Health";
    const DEPARTMENT_SECURITY = "Department of Security";
    const DEPARTMENT_FINANCE = "Department of Finance";
    const DEPARTMENT_JUSTICE = "Supreme Justice Commission";
    public static function getHandlerByDepartment($department)
    {
        $mapping = [
            self::DEPARTMENT_HOME => 'Tenzin',
            self::DEPARTMENT_EDUCATION => 'Tenzin',
            self::DEPARTMENT_INFORMATION => 'Tenzin',
            self::DEPARTMENT_HEALTH => 'Tsering',
            self::DEPARTMENT_SECURITY => 'Tsering',
            self::DEPARTMENT_FINANCE => 'Dolma',
            self::DEPARTMENT_JUSTICE => 'Dolma',
        ];

        return $mapping[$department] ?? 'Default Handler';
    }
}
