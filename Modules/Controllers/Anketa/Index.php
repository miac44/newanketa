<?php

namespace Modules\Controllers\Anketa;

use App\Controller;
use App\Config;

class Index extends \App\Controllers\Main
{

    protected function actionIndex()
    {
        $this->view->forms = \Modules\Models\Anketa\Form::findAll();
        $this->view->content = $this->view->render('Anketa\index');
        $this->view->display('index');
    }
}
