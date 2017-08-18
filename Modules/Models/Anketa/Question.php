<?php

namespace Modules\Models\Anketa;

use App\Tree;

class Question extends Tree
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
        'answers'=>['type'=>'hasMany','model'=>'\Modules\Models\Anketa\Answer'],
    ];


}