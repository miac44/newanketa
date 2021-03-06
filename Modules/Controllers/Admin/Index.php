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
        foreach (\App\Config::instance()->menu->admin as $k => $v) {
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
        if (!is_null($data['id'])) {
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
            if ($value['type'] == 'hasOne') {
                $hasOneElement = $value['id'] ?? $key . '_id';
                $medicalOrganization->$hasOneElement = $post[$key];
            }
        };
        $medicalOrganization->save();
        $links = \Modules\Models\Anketa\MedicalOrganization_to_Form::where(['medicalorganization_id = ' => $medicalOrganization->id]);
        foreach ($links as $link) {
            $link->delete();
        }
        if (count($post['forms']) > 0) {
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
        $links = \Modules\Models\Anketa\MedicalOrganization_to_Form::where(['medicalorganization_id = ' => $data['id']]);
        foreach ($links as $link) {
            $link->delete();
        }
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionFormForm($data = null)
    {
        if (!is_null($data['id'])) {
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
            if ($value['type'] == 'hasOne') {
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
        $links = \Modules\Models\Anketa\MedicalOrganization_to_Form::where(['form_id = ' => $data['id']]);
        foreach ($links as $link) {
            $link->delete();
        }
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionQuestionForm($data = null)
    {
        if (isset($data['id']) && !is_null($data['id'])) {
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
            if (isset($post[$key])) {
                $question->$key = $post[$key];
            }
        };
        foreach ($question::RELATIONS as $key => $value) {
            if (isset($post[$key])) {
                if ($value['type'] == 'hasOne') {
                    $hasOneElement = $value['id'] ?? $key . '_id';
                    $question->$hasOneElement = $post[$key];
                }
            }
        };
        $question->form_id = $data['form_id'];
        $question->save();
        $data['question_id'] = $question->id;
        self::actionAnswerSave($data, $post);
        die;
    }

    protected function actionQuestionList($data)
    {
        $this->view->form_id = $data['form_id'];
        $this->view->questions = \Modules\Models\Anketa\Form::findById($data['form_id'])->questions;
        $this->view->content = $this->view->render('Admin\question\list');
        $this->view->display('admin');
    }

    protected function actionQuestionDelete($data)
    {
        $question = \Modules\Models\Anketa\Question::findById($data['id']);
        $question->delete();
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionAnswerForm($data)
    {
        if (is_null($data['question_id'])) {
            $this->view->display('Admin\error');
        }
        $this->view->question = \Modules\Models\Anketa\Question::findById($data['question_id']);
        $this->view->content = $this->view->render('Admin\answer\form');
        $this->view->display('admin');
    }

    protected function actionAnswerSave($data, $post)
    {
        $answers = \Modules\Models\Anketa\Answer::where(['question_id = ' => $data['question_id']]);
        foreach ($answers as $answer) {
            $answer->delete();
        };
        $answers = explode("\r\n", $post['answertext']);
        foreach ($answers as $text) {
            $answer = new \Modules\Models\Anketa\Answer();
            $answer->question_id = $data['question_id'];
            $answer->text = trim($text);
            if ($answer->text != "") {
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
        $this->view->content = $this->view->render('Admin\action\form');
        $this->view->display('admin');
    }

    protected function actionActionQuestions($data, $post)
    {
        $this->view->form = \Modules\Models\Anketa\Form::findById($data['form_id']);
        $this->view->answer = \Modules\Models\Anketa\Answer::findById($post['answer']);
        $question_id = substr($post['question'], strpos($post['question'], "_") + 1);
        $this->view->question = \Modules\Models\Anketa\Question::findById($question_id);
        $this->view->content = $this->view->render('Admin\action\questions');
        $this->view->display('admin');
    }

    protected function actionActionSave($data, $post)
    {
        $answer_id = $data['answer_id'];
        foreach ($post['questions'] as $question_id => $action) {
            $link = \Modules\Models\Anketa\Action::whereOneElement(['answer_id = ' => $answer_id, 'question_id = ' => $question_id]);
            $reverseAction = null;
            if (!is_null($link)) {
                $link->delete();
            }
            if ($action == "show") {
                $reverseAction = "hide";
            };
            if ($action == "hide") {
                $reverseAction = "show";
            };
            if (isset($reverseAction)) {
                $link = new \Modules\Models\Anketa\Action();
                $link->answer_id = $answer_id;
                $link->question_id = $question_id;
                $link->action_object = $action;
                $link->save();
                $questionFromAnswer = \Modules\Models\Anketa\Answer::findById($answer_id)->question;
                $reverseAnswers = $questionFromAnswer->answers;
                foreach ($reverseAnswers as $answer) {
                    if ($answer->id != $answer_id) {
                        $link = \Modules\Models\Anketa\Action::whereOneElement(['answer_id = ' => $answer->id, 'question_id = ' => $question_id]);
                        if (is_null($link)) {
                            $link = new \Modules\Models\Anketa\Action();
                            $link->answer_id = $answer->id;
                            $link->question_id = $question_id;
                            $link->action_object = $reverseAction;
                            $link->save();
                        }
                    }
                }
            }
        }
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionFormCreateModel($data)
    {
        $form = \Modules\Models\Anketa\Form::findById($data['id']);
        $modelname = ucfirst($form->alias);
        $this->view->model = $modelname;
        $this->view->table = "valuetable_" . $form->alias;
        $this->view->questions = $form->questions;
        $model_text = $this->view->render('/Admin/files/model');
        file_put_contents(ROOT_DIR . "/Modules/Models/Anketa/Dynamic/" . $modelname . ".php", $model_text);
        $modelname = '\\Modules\\Models\\Anketa\\Dynamic\\' . $modelname;
        $model = new $modelname;
        $model->create();
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionMZList()
    {
        $this->view->medicalOrganizations = \Modules\Models\Anketa\MedicalOrganization::findAll();
        $this->view->forms = \Modules\Models\Anketa\Form::findAll();
        $this->view->content = $this->view->render('Admin\mz\index');
        $this->view->display('admin');
    }

    protected function actionMedicalOrganizationCount()
    {
        $this->view->medicalOrganizations = \Modules\Models\Anketa\MedicalOrganization::findAll();
        $this->view->forms = \Modules\Models\Anketa\Form::findAll();
        $this->view->content = $this->view->render('Admin\medicalorganization\count');
        $this->view->display('admin');
    }

    protected function actionMZEnterData($data, $post)
    {
        $this->view->form = \Modules\Models\Anketa\Form::findById($post['form_id']);
        $this->view->medicalOrganization = \Modules\Models\Anketa\MedicalOrganization::findById($post['medicalOrganization_id']);
        $this->view->questions = \Modules\Models\Anketa\MZ\MZquestion::where(['alias = ' => $this->view->form->alias]);
        $this->view->values = \Modules\Models\Anketa\MZ\MZvalues::getValues($this->view->form->id, $post['medicalOrganization_id']);
        $this->view->content = $this->view->render('Admin\mz\mzform');
        $this->view->display('admin');
    }

    protected function actionMZSave($data, $post)
    {
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
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

/*



МЗ



*/


    protected function actionMZQuestionForm($data = null)
    {
        if (isset($data['id']) && !is_null($data['id'])) {
            $this->view->question = \Modules\Models\Anketa\MZ\MZquestion::findById($data['id']);
        }
        $this->view->form_alias = $data['alias'];
        $this->view->content = $this->view->render('Admin\mz\question\form');
        $this->view->display('admin');
    }

    protected function actionMZQuestionSave($data, $post)
    {
        $question = new \Modules\Models\Anketa\MZ\MZquestion();
        if (isset($post['id'])) {
            $question->id = $post['id'];
        };
        $question->alias = $data['alias'];
        $question->text = $post['text'];
        $question->save();
        $data['question_id'] = $question->id;
        self::actionMZAnswerSave($data, $post);
        die;
    }

    protected function actionMZQuestionList($data)
    {
        $this->view->form_alias = $data['alias'];
        $this->view->questions = \Modules\Models\Anketa\MZ\MZquestion::where(['alias = ' => $data['alias']]);
        $this->view->content = $this->view->render('Admin\mz\question\list');
        $this->view->display('admin');
    }

    protected function actionMZQuestionDelete($data)
    {
        $question = \Modules\Models\Anketa\MZ\MZquestion::findById($data['id']);
        $question->delete();
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }

    protected function actionMZAnswerForm($data)
    {
        if (is_null($data['question_id'])) {
            $this->view->display('Admin\error');
        }
        $this->view->question = \Modules\Models\Anketa\MZ\MZquestion::findById($data['question_id']);
        $this->view->content = $this->view->render('Admin\mz\answer\form');
        $this->view->display('admin');
    }

    protected function actionMZAnswerSave($data, $post)
    {
        $answers = \Modules\Models\Anketa\MZ\MZAnswer::where(['mzquestion_id = ' => $data['question_id']]);
        foreach ($answers as $answer) {
            $answer->delete();
        };
        $answers = explode("\r\n", $post['answertext']);
        foreach ($answers as $text) {
            $answer = new \Modules\Models\Anketa\MZ\MZAnswer();
            $answer->mzquestion_id = $data['question_id'];
            $answer->text = trim($text);
            if ($answer->text != "") {
                $answer->save();
            }
        };
        $this->view->content = $this->view->render('Admin\ok');
        $this->view->display('admin');
    }






















}
