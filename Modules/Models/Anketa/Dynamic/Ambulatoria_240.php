<?php

namespace Modules\Models\Anketa\Dynamic;

use Modules\Models\Anketa\DynamicModel;

class Ambulatoria_240 extends DynamicModel
{

    const TABLE = 'valuetable_ambulatoria_240';
    const COLUMNS = [
        'ip' => ['type' => 'string', 'length' => '15' , 'default' => 'null'],
        'type' => ['type' => 'string', 'length' => '50', 'default' => 'Сайт'],
        'month' => ['type' => 'string', 'length' => '15'],
        'year' => ['type' => 'string', 'length' => '4'],
        'region_id' => ['type' => 'int'],
        'medicalOrganization_id' => ['type' => 'int'],
                'question_74' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_75' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_76' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_77' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_78' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_79' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_80' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_81' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_82' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_83' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_84' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_85' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_86' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_87' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_88' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_89' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_90' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_91' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_92' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_93' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_94' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_95' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_96' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_97' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_98' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_99' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_100' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_101' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_102' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_103' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_104' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_105' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_106' => ['type' => 'string', 'length' => '512', 'default' => ''],
            ];
    const RELATIONS = [
        'region' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\Region'],
        'medicalOrganization' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MedicalOrganization'],
    ];

}
