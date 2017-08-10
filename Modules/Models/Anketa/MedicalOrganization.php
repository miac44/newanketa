<?php

namespace Modules\Models\Anketa;

use App\Model;

class MedicalOrganization extends Model
{

    const TABLE = 'medical_organizations';
    const COLUMNS = [
        'name'   => ['type'=>'string'],
        'region_id' => ['type'=>'int'],
    ];
    const RELATIONS = [
        'forms'=>['type'=>'manyToMany','model'=>'\Modules\Models\Anketa\Form'],
    ];

}