<?php

/* admin.html */
class __TwigTemplate_3690d57eaa8b68594bf51a2673d3f040926fd4660b139c0853e718629177bb2e extends Twig_Template
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
        echo twig_include($this->env, $context, "header.html");
        echo "
";
        // line 2
        echo twig_include($this->env, $context, "menu.html");
        echo "
";
        // line 3
        echo (isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new Twig_Error_Runtime('Variable "content" does not exist.', 3, $this->getSourceContext()); })());
        echo "
";
        // line 4
        if (array_key_exists("pagination", $context)) {
            echo twig_include($this->env, $context, "pagination.html");
            echo " ";
        }
        // line 5
        echo twig_include($this->env, $context, "footer.html");
        echo "
";
    }

    public function getTemplateName()
    {
        return "admin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  31 => 4,  27 => 3,  23 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{{ include('header.html') }}
{{ include('menu.html') }}
{{ content|raw }}
{% if pagination is defined %}{{ include('pagination.html') }} {% endif %}
{{ include('footer.html') }}
", "admin.html", "D:\\OpenServer\\domains\\newanketa\\Templates\\Twig\\admin.html");
    }
}
