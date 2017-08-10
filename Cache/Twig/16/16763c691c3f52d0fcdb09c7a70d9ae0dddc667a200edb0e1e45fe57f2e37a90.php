<?php

/* Admin/formmo.html */
class __TwigTemplate_c07ec3507e32216634e7510c6a4b238fd66ff6587c89c7a124e030c2b6919d60 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"container\">
    <form name=\"medicalorganization\" action=\"/admin/medicalorganization/add\" method=\"post\">
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8 text-center\"><h2>Добавить МО<h2></div>
            <div class=\"col-md-2\"></div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8\"><input type=\"input\" name=\"name\" /></div>
            <div class=\"col-md-2\"></div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8\"><button type=\"submit\" class=\"btn btn-block btn-lg btn-primary\"><span class=\"glyphicon glyphicon-floppy-disk\"></span> Сохранить</button></div>
            <div class=\"col-md-2\"></div>
        </div>

    </form>

";
    }

    public function getTemplateName()
    {
        return "Admin/formmo.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"container\">
    <form name=\"medicalorganization\" action=\"/admin/medicalorganization/add\" method=\"post\">
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8 text-center\"><h2>Добавить МО<h2></div>
            <div class=\"col-md-2\"></div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8\"><input type=\"input\" name=\"name\" /></div>
            <div class=\"col-md-2\"></div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8\"><button type=\"submit\" class=\"btn btn-block btn-lg btn-primary\"><span class=\"glyphicon glyphicon-floppy-disk\"></span> Сохранить</button></div>
            <div class=\"col-md-2\"></div>
        </div>

    </form>

", "Admin/formmo.html", "D:\\OpenServer\\domains\\newanketa\\Modules\\Views\\Twig\\Admin\\formmo.html");
    }
}
