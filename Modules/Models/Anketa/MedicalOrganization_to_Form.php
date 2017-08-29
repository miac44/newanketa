<?php

namespace Modules\Models\Anketa;

use App\Model;

class MedicalOrganization_to_Form extends Model
{
    const TABLE = 'medicalorganization_to_form';
    const COLUMNS = [
        'medicalorganization_id' => ['type' => 'int'],
        'form_id' => ['type' => 'int'],
    ];
}
