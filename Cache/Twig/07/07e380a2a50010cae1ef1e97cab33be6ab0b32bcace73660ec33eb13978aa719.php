<?php

/* auth_form.html */
class __TwigTemplate_09b0931f155c725666c60762dece067ca64898942c4b48fb0f81816073743f77 extends Twig_Template
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
        if ((null === (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new Twig_Error_Runtime('Variable "user" does not exist.', 1, $this->getSourceContext()); })()))) {
            // line 2
            echo "<form name=\"auth_form\" action=\"/auth\" method=\"POST\">
    Логин: <input name=\"login\" placeholder=\"login\" />
    Пароль: <input name=\"password\" type=\"password\" placeholder=\"password\" />
    <button type=\"submit\">Вход</button>
</form>
";
        } else {
            // line 8
            echo "Привет, ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new Twig_Error_Runtime('Variable "user" does not exist.', 8, $this->getSourceContext()); })()), "name", array()), "html", null, true);
            echo "! <a href=\"/logout\">Выйти</a>
";
        }
        // line 10
        echo "

";
    }

    public function getTemplateName()
    {
        return "auth_form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 10,  29 => 8,  21 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if user is null %}
<form name=\"auth_form\" action=\"/auth\" method=\"POST\">
    Логин: <input name=\"login\" placeholder=\"login\" />
    Пароль: <input name=\"password\" type=\"password\" placeholder=\"password\" />
    <button type=\"submit\">Вход</button>
</form>
{% else %}
Привет, {{ user.name }}! <a href=\"/logout\">Выйти</a>
{% endif %}


", "auth_form.html", "D:\\OpenServer\\domains\\newanketa\\Templates\\Twig\\auth_form.html");
    }
}
