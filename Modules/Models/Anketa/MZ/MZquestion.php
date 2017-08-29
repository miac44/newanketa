<?php

namespace Modules\Models\Anketa\MZ;

use App\Model;

class MZQuestion extends Model
{

    const TABLE = 'mz_questions';

    const COLUMNS = [
        'alias' => ['type' => 'string'],
        'text' => ['type' => 'text'],
        ];
    const RELATIONS = [
        'answers' => ['type' => 'hasMany', 'model' => '\Modules\Models\Anketa\MZ\MZanswer'],
    ];

}
