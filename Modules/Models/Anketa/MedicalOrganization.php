<?php

namespace Modules\Models\Anketa;

use App\Model;

class MedicalOrganization extends Model
{

    const TABLE = 'medical_organizations';
    const COLUMNS = [
        'name'   => ['type'=>'string'],
    ];
    const RELATIONS = [
        'forms'=>['type'=>'manyToMany','model'=>'\Modules\Models\Anketa\Form'],
        'region'=>['type'=>'hasOne','model'=>'\Modules\Models\Anketa\Region'],
    ];

}