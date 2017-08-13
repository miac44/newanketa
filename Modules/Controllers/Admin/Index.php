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
            die();
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

    protected function actionMedicalOrganizationForm($data = null)
    {
        if (!is_null($data['id'])){
            $this->view->medicalorganization = \Modules\Models\Anketa\MedicalOrganization::findById($data['id']);
        }
        $this->view->regions = \Modules\Models\Anketa\Region::findAll();
        $this->view->forms = \Modules\Models\Anketa\Form::findAll();
        $this->view->content = $this->view->render('Admin\medicalorganization\form');
        $this->view->display('admin');
    }

    protected function actionMedicalOrganizationSave($data, $post)
    {
        $medicalOrganization = new \Modules\Models\Anketa\MedicalOrganization();
        if (isset($post['id'])) {
            $medicalOrganization->id = $post['id'];
        };
        foreach ($medicalOrganization::COLUMNS as $key => $value) {
                $medicalOrganization->$key = $post[$key];
        };
        foreach ($medicalOrganization::RELATIONS as $key => $value) {
                if ($value['type']=='hasOne'){
                    $hasOneElement = $value['id'] ?? $key . '_id';
                    $medicalOrganization->$hasOneElement = $post[$key];
                }
        };
        $medicalOrganization->save();
        $links = \Modules\Models\Anketa\MedicalOrganization_to_Form::where(['medicalorganization_id = '=>$medicalOrganization->id]);
        foreach ($links as $link) {
            $link->delete();
        }
        if (count($post['forms'])>0){
            foreach ($post['forms'] as $value) {
                $link = new \Modules\Models\Anketa\MedicalOrganization_to_Form();
                $link->form_id = $value;
                $link->medicalorganization_id = $medicalOrganization->id;
                $link->insert();
            }
        }
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionMedicalOrganizationList()
    {
        $this->view->medicalorganizations = \Modules\Models\Anketa\MedicalOrganization::findAll();
        $this->view->content = $this->view->render('Admin\medicalorganization\list');
        $this->view->display('admin');
    }

    protected function actionMedicalOrganizationDelete($data)
    {
        $medicalorganization = \Modules\Models\Anketa\MedicalOrganization::findById($data['id']);
        $medicalorganization->delete();
        $links = \Modules\Models\Anketa\MedicalOrganization_to_Form::where(['medicalorganization_id = '=>$data['id']]);
        foreach ($links as $link) {
            $link->delete();
        }
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

}
