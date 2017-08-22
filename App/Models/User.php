<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    const TABLE = 'users';
    const COLUMNS = [
        'login' => ['type' => 'string'],
        'name' => ['type' => 'string'],
        'password' => ['type' => 'string'],
    ];
    const RELATIONS = [
        'sessions' => ['type' => 'hasMany', 'model' => 'App\Models\UserSessions'],
        'posts' => ['type' => 'hasMany', 'model' => '\Modules\Models\Blog\Post'],
    ];

}