<?php

/* footer.html */
class __TwigTemplate_8a7d434ac7d969a82ad87ff16e9e6f7892b72379fbabfdfea850cebd48583bcc extends Twig_Template
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
        echo twig_include($this->env, $context, "footer.scripts.html");
        echo "
<footer>
(c) ";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["site"]) || array_key_exists("site", $context) ? $context["site"] : (function () { throw new Twig_Error_Runtime('Variable "site" does not exist.', 3, $this->getSourceContext()); })()), "publish_year", array()), "html", null, true);
        if ((twig_date_format_filter($this->env, "now", "Y") != twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["site"]) || array_key_exists("site", $context) ? $context["site"] : (function () { throw new Twig_Error_Runtime('Variable "site" does not exist.', 3, $this->getSourceContext()); })()), "publish_year", array()))) {
            echo "-";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        }
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["site"]) || array_key_exists("site", $context) ? $context["site"] : (function () { throw new Twig_Error_Runtime('Variable "site" does not exist.', 3, $this->getSourceContext()); })()), "copyright", array()), "html", null, true);
        echo "
</footer>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 3,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{{ include('footer.scripts.html') }}
<footer>
(c) {{ site.publish_year}}{% if \"now\"|date(\"Y\") != site.publish_year %}-{{ \"now\"|date(\"Y\") }}{% endif %} {{ site.copyright }}
</footer>
</body>
</html>", "footer.html", "D:\\OpenServer\\domains\\newanketa\\Templates\\Twig\\footer.html");
    }
}
