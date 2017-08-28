<?php

namespace Modules\Models\Anketa\Dynamic;

use Modules\Models\Anketa\DynamicModel;

class Donorstvo extends DynamicModel
{

    const TABLE = 'valuetable_donorstvo';
    const COLUMNS = [
        'ip' => ['type' => 'string', 'length' => '15' , 'default' => 'null'],
        'type' => ['type' => 'string', 'length' => '50', 'default' => 'Сайт'],
        'month' => ['type' => 'string', 'length' => '15'],
        'year' => ['type' => 'string', 'length' => '4'],
        'region_id' => ['type' => 'int'],
        'medicalOrganization_id' => ['type' => 'int'],
                'question_162' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_163' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_164' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_165' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_166' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_167' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_168' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_169' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_170' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_171' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_172' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_173' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_174' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_175' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_176' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_177' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_178' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_179' => ['type' => 'string', 'length' => '512', 'default' => ''],
            ];
    const RELATIONS = [
        'region' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\Region'],
        'medicalOrganization' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MedicalOrganization'],
    ];

}
