<?php

namespace Modules\Models\Anketa\Dynamic;

use Modules\Models\Anketa\DynamicModel;

class Ambulatoria extends DynamicModel
{

    const TABLE = 'valuetable_ambulatoria';
    const COLUMNS = [
        'ip' => ['type' => 'string', 'length' => '15' , 'default' => 'null'],
        'type' => ['type' => 'string', 'length' => '50', 'default' => 'Сайт'],
        'month' => ['type' => 'string', 'length' => '15'],
        'year' => ['type' => 'string', 'length' => '4'],
        'region_id' => ['type' => 'int'],
        'medicalOrganization_id' => ['type' => 'int'],
                'question_35' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_36' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_37' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_38' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_39' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_40' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_41' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_42' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_43' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_44' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_45' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_46' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_47' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_48' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_49' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_50' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_51' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_52' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_53' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_54' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_55' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_56' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_57' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_58' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_59' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_60' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_61' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_62' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_63' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_64' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_65' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_69' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_70' => ['type' => 'string', 'length' => '512', 'default' => ''],
            ];
    const RELATIONS = [
        'region' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\Region'],
        'medicalOrganization' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MedicalOrganization'],
    ];

}
