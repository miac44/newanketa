<?php

/* Admin\listmo.html */
class __TwigTemplate_33930392932d144c314309ee9a9675080072665569f28a8a0eee8606a074a744 extends Twig_Template
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
";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["medicalorganizations"]) || array_key_exists("medicalorganizations", $context) ? $context["medicalorganizations"] : (function () { throw new Twig_Error_Runtime('Variable "medicalorganizations" does not exist.', 2, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["medicalorganization"]) {
            // line 3
            echo "<div class=\"row\">
    <div class=\"col-md-2\">";
            // line 4
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["medicalorganization"], "id", array()), "html", null, true);
            echo "</div>
    <div class=\"col-md-7\">";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["medicalorganization"], "name", array()), "html", null, true);
            echo "</div>
    <div class=\"col-md-3\">
\t    <a href=\"/admin/medicalorganization/edit/";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["medicalorganization"], "id", array()), "html", null, true);
            echo "\" class=\"btn btn-block btn-lg btn-primary\"><span class=\"glyphicon glyphicon-edit\"></span>Редактировать</a>
\t    <a href=\"/admin/medicalorganization/delete/";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["medicalorganization"], "id", array()), "html", null, true);
            echo "\"  class=\"btn btn-block btn-lg btn-danger\"><span class=\"glyphicon glyphicon-remove\"></span>Удалить</a>
\t</div>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['medicalorganization'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "Admin\\listmo.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 12,  42 => 8,  38 => 7,  33 => 5,  29 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"container\">
{% for medicalorganization in medicalorganizations %}
<div class=\"row\">
    <div class=\"col-md-2\">{{ medicalorganization.id }}</div>
    <div class=\"col-md-7\">{{ medicalorganization.name }}</div>
    <div class=\"col-md-3\">
\t    <a href=\"/admin/medicalorganization/edit/{{ medicalorganization.id }}\" class=\"btn btn-block btn-lg btn-primary\"><span class=\"glyphicon glyphicon-edit\"></span>Редактировать</a>
\t    <a href=\"/admin/medicalorganization/delete/{{ medicalorganization.id }}\"  class=\"btn btn-block btn-lg btn-danger\"><span class=\"glyphicon glyphicon-remove\"></span>Удалить</a>
\t</div>
</div>
{% endfor %}
</div>", "Admin\\listmo.html", "D:\\OpenServer\\domains\\newanketa\\Modules\\Views\\Twig\\Admin\\listmo.html");
    }
}
