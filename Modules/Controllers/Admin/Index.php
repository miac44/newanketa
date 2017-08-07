<?php

namespace Modules\Controllers\Admin;

use App\Controller;
use App\Config;

class Index extends \App\Controllers\Main
{

    protected function beforeAction()
    {
        if (is_null($this->view->user)){
            \App\Http::redirect("/login");
        }
    }

    protected function actionIndex()
    {
        echo "Admin";
    }
}
