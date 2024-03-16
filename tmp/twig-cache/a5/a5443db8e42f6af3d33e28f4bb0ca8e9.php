<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* home/index.html.twig */
class __TwigTemplate_31c5fc9769b9e7280ca31c5166af68cd extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base/base.html.twig", "home/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <main>
        <div>hello world</div>
        ";
        // line 6
        $this->loadTemplate("components/alert/alert.html.twig", "home/index.html.twig", 6)->display(twig_array_merge($context, ["type" => "danger", "message" => "hello world"]));
        // line 7
        echo "        ";
        $this->loadTemplate("components/alert/alert.html.twig", "home/index.html.twig", 7)->display(twig_array_merge($context, ["type" => "success", "message" => "hello world"]));
        // line 8
        echo "        ";
        $this->loadTemplate("components/alert/alert.html.twig", "home/index.html.twig", 8)->display(twig_array_merge($context, ["type" => "info", "message" => "hello world"]));
        // line 9
        echo "        ";
        $this->loadTemplate("components/alert/alert.html.twig", "home/index.html.twig", 9)->display(twig_array_merge($context, ["type" => "warning", "message" => "hello world"]));
        // line 10
        echo "    </main>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "home/index.html.twig";
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
        return array (  65 => 10,  62 => 9,  59 => 8,  56 => 7,  54 => 6,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "home/index.html.twig", "/app/templates/home/index.html.twig");
    }
}
