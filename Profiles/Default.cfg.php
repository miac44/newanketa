<?php
return array(
    'site' =>
        array(
            'title' => 'Мой первый сайт',
            'name' => 'слоган',
            'copyright' => 'Все права защищены',
            'publish_year' => '2017',
            'meta' =>
                array(
                    'name' =>
                        array(
                            'keywords' => 'сайт, мой первый сайт, тест',
                            'author' => 'Автор',
                            'description' => 'Описание сайта',
                            'viewport' => 'width=device-width, initial-scale=1.0',
                        ),
                ),
        ),
    'cookie' =>
        array(
            'name' => 'ThisIsDefaultProfile',
            'time' => 31536000,
        ),
    'db' =>
        array(
            'host' => 'localhost',
            'user' => 'username',
            'password' => 'simplepassword',
            'dbname' => 'database',
        ),
    'posts' =>
        array(
            'count_on_start_page' => 3,
        ),
    'template_engine' => 'Twig',
    'cache_dir' => '/path/to/cache/from/root',
    'template_dir' => '/path/to/main/template/from/root',
    'date_format' => 'd.m.Y H:i',
    'routes' =>
        array(
            '/' => '/Anketa/Index',
            '/auth' => '/Main/Auth',
            '/logout' => '/Main/Logout',
            '/login' => '/Main/Login',
            '/admin' => '/Admin/FormList',
            '/admin/medicalorganization/form' => '/Admin/MedicalOrganizationForm',
            '/admin/medicalorganization/save' => '/Admin/MedicalOrganizationSave',
            '/admin/medicalorganization/list' => '/Admin/MedicalOrganizationList',
            '/admin/medicalorganization/delete/<1>' => '/Admin/MedicalOrganizationDelete(id=<1>)',
            '/admin/medicalorganization/edit/<1>' => '/Admin/MedicalOrganizationForm(id=<1>)',
            '/admin/medicalorganization/access/form/<1>' => '/Admin/MedicalOrganizationAccessForm(form_id=<1>)',
            '/admin/medicalorganization/access/form/<1>/save' => '/Admin/MedicalOrganizationAccessFormSave(form_id=<1>)',
            '/admin/form/form' => '/Admin/FormForm',
            '/admin/form/save' => '/Admin/FormSave',
            '/admin/form/list' => '/Admin/FormList',
            '/admin/form/delete/<1>' => '/Admin/FormDelete(id=<1>)',
            '/admin/form/edit/<1>' => '/Admin/FormForm(id=<1>)',
            '/admin/form/<1>/createmodel' => '/Admin/FormCreateModel(id=<1>)',
            '/admin/question/form/<1>/form' => '/Admin/QuestionForm(form_id=<1>)',
            '/admin/question/form/<1>/list' => '/Admin/QuestionList(form_id=<1>)',
            '/admin/question/form/<1>/save' => '/Admin/QuestionSave(form_id=<1>)',
            '/admin/question/form/<1>/delete/<2>' => '/Admin/QuestionDelete(form_id=<1>,id=<2>)',
            '/admin/question/form/<1>/edit/<2>' => '/Admin/QuestionForm(form_id=<1>,id=<2>)',
            '/admin/answer/question/<1>/form' => '/Admin/AnswerForm(question_id=<1>)',
            '/admin/answer/question/<1>/save' => '/Admin/AnswerSave(question_id=<1>)',
            '/admin/answer/question/<1>/edit' => '/Admin/AnswerForm(question_id=<1>)',
            '/admin/action/form/<1>' => '/Admin/ActionForm(form_id=<1>)',
            '/admin/action/form/<1>/questions' => '/Admin/ActionQuestions(form_id=<1>)',
            '/admin/action/answer/<1>/save/' => '/Admin/ActionSave(answer_id=<1>)',
            '/admin/mz/question/form/<1>/form/' => '/Admin/MZQuestionForm(alias=<1>)',
            '/admin/mz/question/form/<1>' => '/Admin/MZQuestionForm(alias=<1>)',
            '/admin/mz/question/form/<1>/edit/<2>' => '/Admin/MZQuestionForm(alias=<1>, id=<2>)',
            '/admin/mz/question/delete/<1>' => '/Admin/MZQuestionDelete(id=<1>)',
            '/admin/mz/question/<1>/list' => '/Admin/MZQuestionList(alias=<1>)',
            '/admin/mz/question/form/<1>/save' => '/Admin/MZQuestionSave(alias=<1>)',
            '/admin/mz/answer/question/<1>/form' => '/Admin/MZAnswerForm(question_id=<1>)',
            '/admin/mz/answer/question/<1>/save' => '/Admin/MZAnswerSave(question_id=<1>)',
            '/stat' => '/Stat/MedicalOrganizationCount',
            '/stat/medicalorganization/count' => '/Stat/MedicalOrganizationCount',
            '/stat/mz/list' => '/Stat/MZList',
            '/stat/mz/enterdata/<1>' => '/Stat/MZEnterData(id=<1>)',
            '/stat/mz/save/<1>' => '/Stat/MZSave(id=<1>)',
            '/form/<1>' => '/Anketa/Form(id=<1>)',
            '/form/<1>/save' => '/Anketa/FormSave(id=<1>)',
        ),
        'menu' =>
            array(
                'stat' =>
                    array(
                        'Главная' => '/stat',
                        'Ввод с МЗ' => '/stat/mz/list',
                        'Количество' => '/stat/medicalorganization/count',
                    ),
                    'admin' =>
                    array(
                        'Главная' => '/admin/form/list',
                        'МО' => '/admin/medicalorganization/list',
                    ),
                    'anketa' =>
                    array(
                        'Главная' => '/',
                    ),
            ),

    );
