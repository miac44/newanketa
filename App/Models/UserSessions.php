<?php

namespace App\Models;

use App\Model;

class UserSessions extends Model
{
    const TABLE = 'user_sessions';
    const COLUMNS = [
        'user_id' => ['type' => 'int'],
        'hash' => ['type' => 'string', 'length' => 512],
        'ua' => ['type' => 'text'],
        'ip' => ['type' => 'string', 'length' => 15],
    ];
    const RELATIONS = [
        'user' => ['type' => 'hasOne', 'model' => '\App\Models\User']
    ];

}