<?php

namespace Modules\Models\Anketa;

use App\Model;

class Form extends Model
{

    const TABLE = 'forms';
    const COLUMNS = [
        'name'   => ['type'=>'string'],
        'description'   => ['type'=>'text'],
		'action'   => ['type'=>'string'],
    ];
    const RELATIONS = [
        'medicalOrganization'=>['type'=>'manyToMany','model'=>'\Modules\Models\Anketa\MedicalOrganization'],
    ];

}