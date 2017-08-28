<?php

namespace Modules\Models\Anketa\Dynamic;

use Modules\Models\Anketa\DynamicModel;

class Skoraya extends DynamicModel
{

    const TABLE = 'valuetable_skoraya';
    const COLUMNS = [
        'ip' => ['type' => 'string', 'length' => '15' , 'default' => 'null'],
        'type' => ['type' => 'string', 'length' => '50', 'default' => 'Сайт'],
        'month' => ['type' => 'string', 'length' => '15'],
        'year' => ['type' => 'string', 'length' => '4'],
        'region_id' => ['type' => 'int'],
        'medicalOrganization_id' => ['type' => 'int'],
                'question_139' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_140' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_141' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_142' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_143' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_144' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_145' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_146' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_147' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_148' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_149' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_150' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_151' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_152' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_153' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_154' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_155' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_156' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_157' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_158' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_159' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_160' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_161' => ['type' => 'string', 'length' => '512', 'default' => ''],
            ];
    const RELATIONS = [
        'region' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\Region'],
        'medicalOrganization' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MedicalOrganization'],
    ];

}
