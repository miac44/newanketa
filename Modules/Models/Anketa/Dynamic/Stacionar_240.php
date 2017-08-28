<?php

namespace Modules\Models\Anketa\Dynamic;

use Modules\Models\Anketa\DynamicModel;

class Stacionar_240 extends DynamicModel
{

    const TABLE = 'valuetable_stacionar_240';
    const COLUMNS = [
        'ip' => ['type' => 'string', 'length' => '15' , 'default' => 'null'],
        'type' => ['type' => 'string', 'length' => '50', 'default' => 'Сайт'],
        'month' => ['type' => 'string', 'length' => '15'],
        'year' => ['type' => 'string', 'length' => '4'],
        'region_id' => ['type' => 'int'],
        'medicalOrganization_id' => ['type' => 'int'],
                'question_107' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_108' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_109' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_110' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_111' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_112' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_113' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_114' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_115' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_116' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_117' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_118' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_119' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_120' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_121' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_122' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_123' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_124' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_125' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_126' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_127' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_128' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_129' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_130' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_131' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_132' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_133' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_134' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_135' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_136' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_137' => ['type' => 'string', 'length' => '512', 'default' => ''],
                'question_138' => ['type' => 'string', 'length' => '512', 'default' => ''],
            ];
    const RELATIONS = [
        'region' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\Region'],
        'medicalOrganization' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MedicalOrganization'],
    ];

}
