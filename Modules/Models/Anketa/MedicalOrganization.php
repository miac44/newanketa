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
        $dynamicModel = '\\Modules\\Models\\Anketa\\Dynamic\\' . ucfirst($k);
        return class_exists($dynamicModel);
    }

}
