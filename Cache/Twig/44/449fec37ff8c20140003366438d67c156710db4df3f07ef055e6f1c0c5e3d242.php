<?php

/* menu.html */
class __TwigTemplate_1a4c0965b24a9d45a63e990d0d811e60194ca648c54d2e84fdd2259d5c173175 extends Twig_Template
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
        echo "<nav class=\"navbar navbar-default\">
    <div class=\"container-fluid\">
        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
            <ul class=\"nav navbar-nav\">
                ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) || array_key_exists("menu", $context) ? $context["menu"] : (function () { throw new Twig_Error_Runtime('Variable "menu" does not exist.', 5, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["menuname"] => $context["menulink"]) {
            // line 6
            echo "                    <li";
            if (($context["menulink"] == (isset($context["request_uri"]) || array_key_exists("request_uri", $context) ? $context["request_uri"] : (function () { throw new Twig_Error_Runtime('Variable "request_uri" does not exist.', 6, $this->getSourceContext()); })()))) {
                echo " class=\"active\"";
            }
            echo "><a href=\"";
            echo twig_escape_filter($this->env, $context["menulink"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["menuname"], "html", null, true);
            echo "</a></li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['menuname'], $context['menulink'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "            </ul>
        </div>
    </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "menu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 8,  29 => 6,  25 => 5,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<nav class=\"navbar navbar-default\">
    <div class=\"container-fluid\">
        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
            <ul class=\"nav navbar-nav\">
                {% for menuname, menulink in menu %}
                    <li{% if menulink == request_uri %} class=\"active\"{% endif %}><a href=\"{{ menulink }}\">{{ menuname }}</a></li>
                {% endfor %}
            </ul>
        </div>
    </div>
</nav>", "menu.html", "D:\\OpenServer\\domains\\newanketa\\Templates\\Twig\\menu.html");
    }
}
