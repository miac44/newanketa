<?php

namespace Modules\Models\Anketa;

use App\Model;

class MedicalOrganization extends Model
{

    const TABLE = 'medical_organizations';
    const COLUMNS = [
        'name' => ['type' => 'string'],
    ];
    const RELATIONS = [
        'forms' => ['type' => 'manyToMany', 'model' => '\Modules\Models\Anketa\Form'],
        'region' => ['type' => 'hasOne', 'model' => '\Modules\Models\Anketa\Region'],
    ];

    public function __get($k)

    {
        $res = parent::__get($k);
        if (!is_null($res)) {
            return $res;
        }

        if ($k == 'mzcount') {
            $mzcount = \Modules\Models\Anketa\MZ\MZcount::whereOneElement(['form_id = ' => $this->form_id, 'medicalorganization_id = ' => $this->id]);
            if (!is_null($mzcount)){
                return $mzcount->count;
            } else {
                return null;
            }
        }

        $calcModel = '\\Modules\\Models\\Anketa\\Calc\\' . ucfirst($k);
        if (class_exists($calcModel)){
            return new $calcModel($this->id);
        }

        $dynamicModel = '\\Modules\\Models\\Anketa\\Dynamic\\' . ucfirst($k);
        if (class_exists($dynamicModel)){
            return count($dynamicModel::where(['medicalOrganization_id = ' => $this->id]));
        }

        return null;
    }

    public function __isset($k)
    {
        $res = parent::__isset($k);
        if (true === $res) {
            return $res;
        }

        if ($k == 'mzcount') {
            return true;
            /*
            if (isset($this->id) && isset($this->forms_id)){
                return true;
            } else {
                return false;
            }
            */
        }

        $dynamicModel = '\\Modules\\Models\\Anketa\\Dynamic\\' . ucfirst($k);
        if (class_exists($dynamicModel)){
            return true;
        }

        $calcModel = '\\Modules\\Models\\Anketa\\Calc\\' . ucfirst($k);
        if (class_exists($calcModel)){
            return true;
        }

        return false;

    }

}
