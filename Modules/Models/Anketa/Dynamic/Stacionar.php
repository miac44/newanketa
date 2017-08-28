<?php

namespace Modules\Models\Anketa\Dynamic;

use Modules\Models\Anketa\DynamicModel;

class Stacionar extends DynamicModel
{

    const TABLE = 'valuetable_stacionar';
    const COLUMNS = [
        'ip' => ['type' => 'string', 'length' => '15' , 'default' => 'null'],
        'type' => ['type' => 'string', 'length' => '50', 'default' => 'Сайт'],
        'month' => ['type' => 'string', 'length' => '15'],
        'year' => ['type' => 'string', 'length' => '4'],
        'region_id' => ['type' => 'int'],
        'medicalOrganization_id' => ['type' => 'int'],
                'question_1' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_2' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_3' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_4' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_5' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_6' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_7' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_8' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_9' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_10' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_11' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_12' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_13' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_14' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_15' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_16' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_17' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_18' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_19' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_20' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_21' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_22' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_23' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_24' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_25' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_26' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_27' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_28' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_29' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_30' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_31' => ['type' => 'string', 'length' => '512', 'default' => ''],
            ];
    const RELATIONS = [
        'region' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\Region'],
        'medicalOrganization' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MedicalOrganization'],
    ];

}
