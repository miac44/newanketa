<?php

namespace Modules\Models\Anketa\Dynamic;

use Modules\Models\Anketa\DynamicModel;

class Psih extends DynamicModel
{

    const TABLE = 'valuetable_psih';
    const COLUMNS = [
        'ip' => ['type' => 'string', 'length' => '15' , 'default' => 'null'],
        'type' => ['type' => 'string', 'length' => '50', 'default' => 'Сайт'],
        'month' => ['type' => 'string', 'length' => '15'],
        'year' => ['type' => 'string', 'length' => '4'],
        'region_id' => ['type' => 'int'],
        'medicalOrganization_id' => ['type' => 'int'],
                'question_180' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_181' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_182' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_183' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_184' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_185' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_186' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_187' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_188' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_189' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_190' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_191' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_192' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_193' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_194' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_195' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_196' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_197' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_198' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_199' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_200' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_201' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_202' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_203' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_204' => ['type' => 'string', 'length' => '512', 'default' => ''],
            ];
    const RELATIONS = [
        'region' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\Region'],
        'medicalOrganization' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MedicalOrganization'],
    ];

}
