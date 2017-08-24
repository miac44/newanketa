<?php
namespace App;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $template_engine = '\\App\TemplateEngine\\' . \App\Config::instance()->template_engine;
        $this->view = new $template_engine();
    }

    public function action($action, $app)
    {
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName($app->route->args, $app->route->post);
    }

    public static function existsAction($action)
    {
        $methodName = 'action' . $action;
        return method_exists(static::class, $methodName);
    }
}