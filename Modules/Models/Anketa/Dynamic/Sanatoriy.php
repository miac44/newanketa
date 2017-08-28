<?php

namespace Modules\Models\Anketa\Dynamic;

use Modules\Models\Anketa\DynamicModel;

class Sanatoriy extends DynamicModel
{

    const TABLE = 'valuetable_sanatoriy';
    const COLUMNS = [
        'ip' => ['type' => 'string', 'length' => '15' , 'default' => 'null'],
        'type' => ['type' => 'string', 'length' => '50', 'default' => 'Сайт'],
        'month' => ['type' => 'string', 'length' => '15'],
        'year' => ['type' => 'string', 'length' => '4'],
        'region_id' => ['type' => 'int'],
        'medicalOrganization_id' => ['type' => 'int'],
                'question_205' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_206' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_207' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_208' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_209' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_210' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_211' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_212' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_213' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_214' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_215' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_216' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_217' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_218' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_219' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_220' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_221' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_222' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_223' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_224' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_225' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_226' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_227' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_228' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_229' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_230' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_231' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_232' => ['type' => 'string', 'length' => '512', 'default' => ''],
            ];
    const RELATIONS = [
        'region' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\Region'],
        'medicalOrganization' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MedicalOrganization'],
    ];

}
