<?php

/* header.html */
class __TwigTemplate_a391f0c7fd485efe4737f8964de6b99e0d7bcfc20285d4c60bfbe783acc60e86 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"ru\">
<head>
<title>";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["site"]) || array_key_exists("site", $context) ? $context["site"] : (function () { throw new Twig_Error_Runtime('Variable "site" does not exist.', 4, $this->getSourceContext()); })()), "title", array()), "html", null, true);
        echo "</title>
";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["site"]) || array_key_exists("site", $context) ? $context["site"] : (function () { throw new Twig_Error_Runtime('Variable "site" does not exist.', 5, $this->getSourceContext()); })()), "meta", array()));
        foreach ($context['_seq'] as $context["attr_name"] => $context["attr_value"]) {
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["attr_value"]);
            foreach ($context['_seq'] as $context["name"] => $context["content"]) {
                // line 7
                echo "    <meta ";
                echo twig_escape_filter($this->env, $context["attr_name"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "\" content=\"";
                echo twig_escape_filter($this->env, $context["content"], "html", null, true);
                echo "\">
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['content'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attr_name'], $context['attr_value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "    <!-- Bootstrap -->
    <link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/select.css\" />
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/style.css\" />
</head>
<body>
<header>
</header>";
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 10,  36 => 7,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"ru\">
<head>
<title>{{ site.title }}</title>
{% for attr_name, attr_value in site.meta %}
{% for name, content in attr_value %}
    <meta {{ attr_name }}=\"{{ name }}\" content=\"{{ content }}\">
{% endfor %}
{% endfor %}
    <!-- Bootstrap -->
    <link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/select.css\" />
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/style.css\" />
</head>
<body>
<header>
</header>", "header.html", "D:\\OpenServer\\domains\\newanketa\\Templates\\Twig\\header.html");
    }
}
