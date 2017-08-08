<?php

/* Admin\index.html */
class __TwigTemplate_805add9c2c7f1c831c9764012e51ac6b81efb4c2a18b55f4725f278a66bcdafd extends Twig_Template
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
        echo "<a href=\"/admin/medicalorganization/form\" class=\"btn btn-lg btn-default\"><span class=\"glyphicon glyphicon-plus\"></span>Добавить МО</a>";
    }

    public function getTemplateName()
    {
        return "Admin\\index.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<a href=\"/admin/medicalorganization/form\" class=\"btn btn-lg btn-default\"><span class=\"glyphicon glyphicon-plus\"></span>Добавить МО</a>", "Admin\\index.html", "D:\\OpenServer\\domains\\newanketa\\Modules\\Views\\Twig\\Admin\\index.html");
    }
}
