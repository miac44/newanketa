<?php

namespace Modules\Controllers\Anketa;

use App\Controller;
use App\Config;

class Index extends \App\Controllers\Main
{

    protected function beforeAction()
    {
        parent::beforeAction();
        if (is_null($this->view->user)) {
            \App\Http::redirect("/login");
            die();
        }
        $menu = [];
        foreach (\App\Config::instance()->menu->anketa as $k => $v) {
            $menu[$k] = $v;
        }
        $this->view->menu = $menu;
        $this->view->request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    protected function actionIndex()
    {
        $forms = \Modules\Models\Anketa\Form::findAll();
        foreach ($forms as  $key => $form) {
            $nameModel = '\\Modules\\Models\\Anketa\\Dynamic\\' . ucfirst($form->alias);
            $form->countCompletedForm = count($nameModel::findAll());
            $forms[$key] = $form;
        }
        $this->view->forms = $forms;
        $this->view->content = $this->view->render('Anketa\index');
        $this->view->display('index');
    }

    protected function actionForm($data)
    {
        $this->view->regions = \Modules\Models\Anketa\Region::findAll();
        $this->view->form = \Modules\Models\Anketa\Form::findById($data['id']);
        $this->view->questions = \Modules\Models\Anketa\Question::where(['form_id = ' => $data['id'], 'parent_id is ' => null]);
        $this->view->content = $this->view->render('Anketa\form');
        $this->view->display('index');
    }

    protected function actionFormSave($data, $post)
    {
        $form  = \Modules\Models\Anketa\Form::findById($data['id']);
        $modelname = '\\Modules\\Models\\Anketa\\Dynamic\\' . ucfirst($form->alias);
        $valueModel = new $modelname;
        $valueModel->ip = $_SERVER['REMOTE_ADDR'];
        $valueModel->month = $post['month'];
        $valueModel->year = $post['year'];
        $valueModel->region_id = substr($post['region'], strpos($post['region'], '_')+1);
        $valueModel->medicalOrganization_id = substr($post['medicalOrganization'], strpos($post['medicalOrganization'], '_')+1);
        foreach ($post['form'] as $question_id => $valueArr) {
            $questionRow = 'question_' . $question_id;
            $valueModel->$questionRow = implode(',', $valueArr);
        }
        $valueModel->save();
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('index');
    }

}
