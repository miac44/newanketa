<?php

namespace Modules\Models\Anketa;

use App\Model;

class Action extends Model
{

    const TABLE = 'actions';
    const COLUMNS = [
        'answer_id'   => ['type'=>'int'],
        'question_id'   => ['type'=>'int'],
        'action_object'   => ['type'=>'string', 'length'=>20],
    ];

}
