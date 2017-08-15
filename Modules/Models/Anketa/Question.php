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
        'answers'=>['type'=>'hasMany','model'=>'\Modules\Models\Anketa\Answer'],
    ];

    public static function hasChildren($id)
    {
        return \Modules\Models\Anketa\Question::where(['parent_id' => $id]);
    }

}