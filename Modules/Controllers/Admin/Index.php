<?php

namespace Modules\Controllers\Admin;

use App\Controller;
use App\Config;

class Index extends \App\Controllers\Main
{

    protected function beforeAction()
    {
        parent::beforeAction();
        if (is_null($this->view->user)) {
            \App\Http::redirect("/login");
        }
        $menu = [];
        foreach (\App\Config::instance()->menu as $k=>$v){
            $menu[$k] = $v;
        }
        $this->view->menu = $menu;
        $this->view->request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    protected function actionIndex()
    {
        $this->view->content = $this->view->render('Admin\index');
        $this->view->display('admin');
    }


    protected function actionSecond()
    {
        $this->view->content = "Second";
        $this->view->display('admin');
    }

    protected function actionMedicalOrganizationForm()
    {
        $this->view->regions = \Modules\Models\Anketa\Region::findAll();
        $this->view->forms = \Modules\Models\Anketa\Form::findAll();
        $this->view->content = $this->view->render('Admin/formmo');
        $this->view->display('admin');
    }

    protected function actionMedicalOrganizationAdd($data, $post)
    {
        var_dump($post);
    }

}
