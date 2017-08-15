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

    protected function actionForm($data)
    {
        $this->view->form = \Modules\Models\Anketa\Form::findById($data['id']);
        $this->view->content = $this->view->render('Anketa\form');
        $this->view->display('index');
    }

}
