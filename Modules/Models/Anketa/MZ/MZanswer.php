<?php

namespace Modules\Models\Anketa\MZ;

use App\Model;

class MZanswer extends Model
{

    const TABLE = 'mz_answers';

    const COLUMNS = [
        'text' => ['type' => 'string'],
        'mzquestion_id' => ['type' => 'int'],
        ];
    const RELATIONS = [
        'mzquestion' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MZ\MZquestion'],
    ];

}
