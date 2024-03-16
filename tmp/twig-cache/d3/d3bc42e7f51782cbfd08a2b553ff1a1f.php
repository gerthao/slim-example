<?php

use Twig\Environment;
use Twig\Source;
use Twig\Template;

/* components/alert/alert.html.twig */

class __TwigTemplate_e624185eec6d82e725e3fdca76efdbb9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    public function getSourceContext()
    {
        return new Source("", "components/alert/alert.html.twig", "/app/templates/components/alert/alert.html.twig");
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/alert/alert.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array(74 => 15, 70 => 14, 67 => 13, 63 => 11, 61 => 10, 58 => 9, 56 => 8, 53 => 7, 51 => 6, 48 => 5, 46 => 4, 42 => 3, 37 => 1,);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo $this->extensions['Odan\Twig\TwigAssetsExtension']->assets(["files" => ["components/alert/alert.css"]]);
        echo "

<div class=\"alert alert-";
        // line 3
        echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
        echo "\">
    ";
        // line 4
        if ((($context["type"] ?? null) == "danger")) {
            // line 5
            echo "        <div class=\"alert-icon\"><i class=\"fa-solid fa-circle-exclamation\"></i></div>
    ";
        } elseif ((        // line 6
            ($context["type"] ?? null) == "info")) {
            // line 7
            echo "        <div class=\"alert-icon\"><i class=\"fa-solid fa-circle-info\"></i></div>
    ";
        } elseif ((        // line 8
            ($context["type"] ?? null) == "success")) {
            // line 9
            echo "        <div class=\"alert-icon\"><i class=\"fa-solid fa-check\"></i></div>
    ";
        } elseif ((        // line 10
            ($context["type"] ?? null) == "warning")) {
            // line 11
            echo "        <div class=\"alert-icon\"><i class=\"fa-solid fa-triangle-exclamation\"></i></div>
    ";
        }
        // line 13
        echo "    <div class=\"alert-content\">
        <div class=\"alert-heading\">";
        // line 14
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["type"] ?? null)), "html", null, true);
        echo "</div>
        <div class=\"alert-message\">";
        // line 15
        echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
        echo "</div>
    </div>
    <div class=\"alert-button\">
        <button><i class=\"fa-solid fa-close\"></i></button>
    </div>
</div>";
    }
}
