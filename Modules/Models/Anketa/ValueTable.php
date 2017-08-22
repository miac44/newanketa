<?php

namespace Modules\Models\Anketa;

use App\Model;

class ValueTable extends Model
{

    const COLUMNS = [
        'ip' => ['type' => 'string', 'length'=>15],
        'type' => ['type' => 'string'],
    ];

    const RELATIONS = [
        'form' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\Form'],
        'region' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\Region'],
        'medicalOrganization' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MedicalOrganization'],
    ];


    public function __construct($table_alias)
    {

        define('TABLE' , 'valuetable_' . $table_alias);
    }

    public function extraCreate()
    {
        var_dump($this->TABLE);
        parent::create();
    }




}
