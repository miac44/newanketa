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
    <form name=\"medicalorganization\" action=\"/admin/medicalorganization/save\" method=\"post\">
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8 text-center\"><h2>Добавить МО<h2></div>
            <div class=\"col-md-2\"></div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8\"><input type=\"input\" name=\"name\" placeholder=\"Введите имя медицинской организации\" required=\"required\" ";
        // line 10
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["medicalorganization"] ?? null), "name", array(), "any", true, true)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["medicalorganization"]) || array_key_exists("medicalorganization", $context) ? $context["medicalorganization"] : (function () { throw new Twig_Error_Runtime('Variable "medicalorganization" does not exist.', 10, $this->getSourceContext()); })()), "name", array()), "html", null, true);
            echo "\" ";
        }
        echo " /></div>
            <div class=\"col-md-2\"></div>
            ";
        // line 12
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["medicalorganization"] ?? null), "id", array(), "any", true, true)) {
            echo "<input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["medicalorganization"]) || array_key_exists("medicalorganization", $context) ? $context["medicalorganization"] : (function () { throw new Twig_Error_Runtime('Variable "medicalorganization" does not exist.', 12, $this->getSourceContext()); })()), "id", array()), "html", null, true);
            echo "\" />";
        }
        echo " 
        </div>
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8\">
                <select name=\"region\" required=\"required\">
                ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["regions"]) || array_key_exists("regions", $context) ? $context["regions"] : (function () { throw new Twig_Error_Runtime('Variable "regions" does not exist.', 18, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["region"]) {
            echo "            
                    <option value=\"";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["region"], "id", array()), "html", null, true);
            echo "\"";
            if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["medicalorganization"] ?? null), "region", array(), "any", false, true), "id", array(), "any", true, true)) {
                if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["medicalorganization"]) || array_key_exists("medicalorganization", $context) ? $context["medicalorganization"] : (function () { throw new Twig_Error_Runtime('Variable "medicalorganization" does not exist.', 19, $this->getSourceContext()); })()), "region", array()), "id", array()) == twig_get_attribute($this->env, $this->getSourceContext(), $context["region"], "id", array()))) {
                    echo " selected";
                }
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["region"], "name", array()), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['region'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "                </select>
            </div>
            <div class=\"col-md-2\"></div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8\">
                ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["forms"]) || array_key_exists("forms", $context) ? $context["forms"] : (function () { throw new Twig_Error_Runtime('Variable "forms" does not exist.', 28, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["form"]) {
            // line 29
            echo "                <div class=\"checkbox\">
                    <label><input type=\"checkbox\" name=\"forms[]\" value=\" ";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["form"], "id", array()), "html", null, true);
            echo "\" ";
            if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["medicalorganization"] ?? null), "forms", array(), "any", false, true), "form", array(), "any", false, true), "id", array(), "any", true, true)) {
                if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["medicalorganization"]) || array_key_exists("medicalorganization", $context) ? $context["medicalorganization"] : (function () { throw new Twig_Error_Runtime('Variable "medicalorganization" does not exist.', 30, $this->getSourceContext()); })()), "forms", array()), "form", array()), "id", array()) == twig_get_attribute($this->env, $this->getSourceContext(), $context["form"], "id", array()))) {
                    echo " checked";
                }
            }
            echo "> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["form"], "name", array()), "html", null, true);
            echo "</label>
                </div>            
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['form'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "            </div>
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

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 33,  90 => 30,  87 => 29,  83 => 28,  74 => 21,  58 => 19,  52 => 18,  39 => 12,  30 => 10,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"container\">
    <form name=\"medicalorganization\" action=\"/admin/medicalorganization/save\" method=\"post\">
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8 text-center\"><h2>Добавить МО<h2></div>
            <div class=\"col-md-2\"></div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8\"><input type=\"input\" name=\"name\" placeholder=\"Введите имя медицинской организации\" required=\"required\" {% if medicalorganization.name is defined %} value=\"{{ medicalorganization.name }}\" {% endif %} /></div>
            <div class=\"col-md-2\"></div>
            {% if medicalorganization.id is defined %}<input type=\"hidden\" name=\"id\" value=\"{{ medicalorganization.id }}\" />{% endif %} 
        </div>
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8\">
                <select name=\"region\" required=\"required\">
                {% for region in regions %}            
                    <option value=\"{{ region.id }}\"{% if medicalorganization.region.id is defined %}{% if medicalorganization.region.id == region.id %} selected{% endif %}{% endif %}>{{ region.name }}</option>
                {% endfor%}
                </select>
            </div>
            <div class=\"col-md-2\"></div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-2\"></div>
            <div class=\"col-md-8\">
                {% for form in forms %}
                <div class=\"checkbox\">
                    <label><input type=\"checkbox\" name=\"forms[]\" value=\" {{ form.id }}\" {% if medicalorganization.forms.form.id is defined %}{% if medicalorganization.forms.form.id == form.id %} checked{% endif %}{% endif %}> {{ form.name }}</label>
                </div>            
                {% endfor%}
            </div>
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
