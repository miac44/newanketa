<?php

namespace App\Controllers;

use App\View;
use App\Controller;
use App\Config;

class Main extends Controller
{

    protected function beforeAction()
    {
        $this->view->site = Config::instance()->site;
        $this->view->user = \App\Auth::user();
        $this->view->addTemplateDir(ROOT_DIR . '/Modules/Views/' . Config::instance()->template_engine);
    }

    protected function actionIndex()
    {
        $module = new \Modules\Controllers\Blog\Index();
        $module->view = $this->view;
        return $module->action('Index');
    }

    protected function actionAuth($data, $post)
    {
        \App\Auth::login($post['login'], $post['password']);
        \App\Http::redirectPrevious();
    }

    protected function actionLogout()
    {
        $session = \App\Auth::logout();
        \App\Http::redirectPrevious();
    }

}