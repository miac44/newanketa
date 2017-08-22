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
            '/' => '/Anketa/FormList',
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
            '/form/<1>' => '/Anketa/Form(id=<1>)',
        ),
    'menu' =>
        array(
            'Главная' => '/admin/form/list',
            'МО' => '/admin/medicalorganization/list',
        ),

);
