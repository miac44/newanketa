<?php

namespace Modules\Models\Anketa;

use App\Model;

class Answer extends Model
{

    const TABLE = 'answers';
    const COLUMNS = [
        'text'   => ['type'=>'string'],
    ];
    const RELATIONS = [
        'question' => ['type'=>'hasOne','model'=>'\Modules\Models\Anketa\Question'],
        'questions'=>['type'=>'manyToMany','model'=>'\Modules\Models\Anketa\Question']
        'actions'=>['type'=>'manyToMany','model'=>'\Modules\Models\Anketa\Actions']
    ];

}
