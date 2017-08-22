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

    protected function actionFormForm($data = null)
    {
        if (!is_null($data['id'])){
            $this->view->form = \Modules\Models\Anketa\Form::findById($data['id']);
        }
        $this->view->content = $this->view->render('Admin\form\form');
        $this->view->display('admin');
    }

    protected function actionFormSave($data, $post)
    {
        $form = new \Modules\Models\Anketa\Form();
        if (isset($post['id'])) {
            $form->id = $post['id'];
        };
        foreach ($form::COLUMNS as $key => $value) {
            $form->$key = $post[$key];
        };
        foreach ($form::RELATIONS as $key => $value) {
            if ($value['type']=='hasOne'){
                $hasOneElement = $value['id'] ?? $key . '_id';
                $form->$hasOneElement = $post[$key];
            }
        };
        $form->save();
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionFormList()
    {
        $this->view->forms = \Modules\Models\Anketa\Form::findAll();
        $this->view->content = $this->view->render('Admin\form\list');
        $this->view->display('admin');
    }

    protected function actionFormDelete($data)
    {
        $form = \Modules\Models\Anketa\Form::findById($data['id']);
        $form->delete();
        $links = \Modules\Models\Anketa\MedicalOrganization_to_Form::where(['form_id = '=>$data['id']]);
        foreach ($links as $link) {
            $link->delete();
        }
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionQuestionForm($data = null)
    {
        if (isset($data['id']) && !is_null($data['id'])){
            $this->view->question = \Modules\Models\Anketa\Question::findById($data['id']);
        }
        $this->view->form = \Modules\Models\Anketa\Form::findById($data['form_id']);
        $this->view->content = $this->view->render('Admin\question\form');
        $this->view->display('admin');
    }

    protected function actionQuestionSave($data, $post)
    {
        $question = new \Modules\Models\Anketa\Question();
        if (isset($post['id'])) {
            $question->id = $post['id'];
        };
        foreach ($question::COLUMNS as $key => $value) {
            if (isset($post[$key])){
                $question->$key = $post[$key];
            }
        };
        foreach ($question::RELATIONS as $key => $value) {
            if (isset($post[$key])){
                if ($value['type']=='hasOne'){
                    $hasOneElement = $value['id'] ?? $key . '_id';
                    $question->$hasOneElement = $post[$key];
                }
            }
        };
        $question->form_id = $data['form_id'];
        $question->save();
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionQuestionList($data)
    {
        $this->view->form_id = $data['form_id'];
        $this->view->questions = \Modules\Models\Anketa\Question::findAll(['form_id = ' => $data['form_id']]);
        $this->view->content = $this->view->render('Admin\question\list');
        $this->view->display('admin');
    }

    protected function actionQuestionDelete($data)
    {
        $question = \Modules\Models\Anketa\Question::findById($data['id']);
        $question -> delete();
//        TODO
//        удалить ответы на вопросы
//        пересчитать информацию
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionAnswerForm($data)
    {
        if (is_null($data['question_id'])){
            $this->view->display('Admin\error');
        }
        $this->view->question = \Modules\Models\Anketa\Question::findById($data['question_id']);
        $this->view->content = $this->view->render('Admin\answer\form');
        $this->view->display('admin');
    }

    protected function actionAnswerSave($data, $post)
    {
        $answers = \Modules\Models\Anketa\Answer::where(['question_id = '=>$data['question_id']]);
        foreach ($answers as $answer) {
            $answer->delete();
        };
        $answers = explode(";", $post['text']);
        foreach ($answers as $text) {
            $answer = new \Modules\Models\Anketa\Answer();
            $answer->question_id = $data['question_id'];
            $answer->text = trim($text);
            if ($answer->text != ""){
                $answer->save();
            }
        };
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionMedicalOrganizationAccessForm($data)
    {
        $this->view->form = \Modules\Models\Anketa\Form::findById($data['form_id']);
        $this->view->medicalOrganizations = \Modules\Models\Anketa\MedicalOrganization::findAll();
        $this->view->content = $this->view->render('Admin\medicalorganization\accessform');
        $this->view->display('admin');
    }

    protected function actionMedicalOrganizationAccessFormSave($data, $post)
    {
        $deleteLinks = \Modules\Models\Anketa\MedicalOrganization_to_Form::where(['form_id = ' => $data['form_id']]);
        foreach ($deleteLinks as $link) {
            $link->delete();
        };
        foreach ($post['medicalOrganizations'] as $value) {
            $link = new \Modules\Models\Anketa\MedicalOrganization_to_Form();
            $link->form_id = $data['form_id'];
            $link->medicalorganization_id = $value;
            $link->save();
        }
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionActionForm($data)
    {
        $this->view->form = \Modules\Models\Anketa\Form::findById($data['form_id']);
        $this->view->content = $this->view->render('Admin\actionform');
        $this->view->display('admin');
    }

    protected function actionActionFormSave($data, $post)
    {
        $answer_id = $post['answer'];
        foreach ($post['questions'] as $question_id => $action) {
            $link = \Modules\Models\Anketa\Action::whereOneElement(['answer_id = ' => $answer_id, 'question_id' => $question_id]);
            if (!is_null($link)){
                $link->delete();
            }
            if ($action == "show"){
                $link = new \Modules\Models\Anketa\Action();
                $link->answer_id = $answer_id;
                $link->question_id = $question_id;
                $link->action_object = "show";
                $link->save();
            }
            if ($action == "hide"){
                $link = new \Modules\Models\Anketa\Action();
                $link->answer_id = $answer_id;
                $link->question_id = $question_id;
                $link->action_object = "hide";
                $link->save();
            }
        }
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

}
