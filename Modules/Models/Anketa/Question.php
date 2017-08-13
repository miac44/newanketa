<?php

namespace Modules\Models\Anketa;

use App\Model;

class Question extends Model
{

    const TABLE = 'questions';
    const COLUMNS = [
        'text'   => ['type'=>'text'],
        'type'   => ['type'=>'string'],
        'required'   => ['type'=>'int', 'length'=>1],
    ];
    const RELATIONS = [
        'form'=>['type'=>'hasOne','model'=>'\Modules\Models\Anketa\Form'],
        'parent'=>['type'=>'hasOne','model'=>'\Modules\Models\Anketa\Question'],
    ];

}