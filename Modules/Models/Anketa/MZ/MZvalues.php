<?php

namespace Modules\Models\Anketa\MZ;

use App\Model;

class MZvalues extends Model
{

    const TABLE = 'mz_values';

    const COLUMNS = [
        'value' => ['type' => 'int'],
        'medicalorganization_id' => ['type' => 'int'],
        'answer_id' => ['type' => 'int'],
        ];
    const RELATIONS = [
        'medicalorganization' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MedicalOrganization'],
        'answer' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\MZ\MZanswer'],
    ];

    public static function getValues($form_id, $medicalorganization_id)
    {
        $arr = [];
        $form = \Modules\Models\Anketa\Form::findById($form_id);
        $questions = \Modules\Models\Anketa\MZ\MZquestion::where(['alias = ' => $form->alias]);
        foreach ($questions as $question) {
            foreach ($question->answers as $answer) {
                $values = \Modules\Models\Anketa\MZ\MZvalues::whereOneElement(['answer_id = ' => $answer->id, 'medicalorganization_id = ' => $medicalorganization_id]);
                if (!is_null($values)){
                    $arr[$answer->id] = $values->value;
                } else {
                    $arr[$answer->id] = null;
                }
            }
        }
        return $arr;
    }
}
