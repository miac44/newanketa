<?php

namespace Modules\Controllers\Stat;

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
        foreach (\App\Config::instance()->menu->stat as $k => $v) {
            $menu[$k] = $v;
        }
        $this->view->menu = $menu;
        $this->view->request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    protected function actionMZList()
    {
        $this->view->medicalOrganizations = \Modules\Models\Anketa\MedicalOrganization::findAll();
        $this->view->forms = \Modules\Models\Anketa\Form::findAll();
        $this->view->content = $this->view->render('Stat\mz\index');
        $this->view->display('admin');
    }

    protected function actionMedicalOrganizationCount()
    {
        $this->view->medicalOrganizations = \Modules\Models\Anketa\MedicalOrganization::findAll();
        $this->view->forms = \Modules\Models\Anketa\Form::findAll();
        $this->view->content = $this->view->render('Stat\medicalorganization\count');
        $this->view->display('admin');
    }

    protected function actionMZEnterData($data, $post)
    {
        $this->view->form = \Modules\Models\Anketa\Form::findById($post['form_id']);
        $this->view->medicalOrganization = \Modules\Models\Anketa\MedicalOrganization::findById($post['medicalOrganization_id']);
        $this->view->questions = \Modules\Models\Anketa\MZ\MZquestion::where(['alias = ' => $this->view->form->alias]);
        $this->view->values = \Modules\Models\Anketa\MZ\MZvalues::getValues($this->view->form->id, $post['medicalOrganization_id']);
        $this->view->content = $this->view->render('Stat\mz\mzform');
        $this->view->display('admin');
    }

    protected function actionMZSave($data, $post)
    {
        var_dump($post);
        foreach ($post['values'] as $k=>$v){
            $mzDeleteValues = \Modules\Models\Anketa\MZ\MZvalues::whereOneElement(['answer_id = ' => $k, 'medicalorganization_id = ' => $data['id']]);
            if (!is_null($mzDeleteValues)){
                $mzDeleteValues->delete();
            };
            $mzNewValues = new \Modules\Models\Anketa\MZ\MZvalues();
            $mzNewValues->answer_id = $k;
            $mzNewValues->medicalorganization_id = $data['id'];
            $mzNewValues->value = $v;
            $mzNewValues->save();
        }
        $mzcount = \Modules\Models\Anketa\MZ\MZcount::whereOneElement(['form_id = ' => $post['form_id'], 'medicalorganization_id = ' => $data['id']]);
        if (is_null($mzcount)){
            $mzcount = new \Modules\Models\Anketa\MZ\MZcount();
            $mzcount->form_id = $post['form_id'];
            $mzcount->medicalorganization_id = $data['medicalorganization_id'];
        }
        $mzcount->count = $post['mzcount'];
        $mzcount->save();
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    /*

    тут понеслась полная хуета

    */

    protected function actionStacionar()
    {
        $this->view->form = \Modules\Models\Anketa\Form::findById(1);
        $this->view->content = $this->view->render('Stat\stacionar');
        $this->view->display('admin');
    }

}
