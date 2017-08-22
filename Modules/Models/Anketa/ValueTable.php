<?php

namespace Modules\Models\Anketa;

use App\Model;

class ValueTable extends Model
{

    const COLUMNS = [
    ];

    public function __construct($table_alias)
    {
        define('TABLE' , 'valuetable_' . $table_alias);
    }


}
