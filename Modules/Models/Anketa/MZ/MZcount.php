<?php

namespace Modules\Models\Anketa\MZ;

use App\Model;

class MZcount extends Model
{

    const TABLE = 'mz_count';

    const COLUMNS = [
        'mzcount' => ['type' => 'int'],
        'medicalorganization_id' => ['type' => 'int'],
        'form_id' => ['type' => 'int'],
        ];
    const RELATIONS = [
        'medicalorganization' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MedicalOrganization'],
        'form' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MZ\Form'],
    ];

}
