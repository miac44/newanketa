<?php

namespace App\Models;

use App\Model;

class Region extends Model
{
    const TABLE = 'regions';
    const COLUMNS = [
        'name' => ['type' => 'string'],
    ];
    const RELATIONS = [
        'medicalOrganization' => ['type' => 'hasMany', 'model' => '\Modules\Models\Anketa\MedicalOrganization'],
    ];
}