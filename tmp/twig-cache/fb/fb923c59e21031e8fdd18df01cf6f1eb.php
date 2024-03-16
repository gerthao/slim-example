<?php

use Twig\Environment;
use Twig\Source;
use Twig\Template;

/* base/base.html.twig */

class __TwigTemplate_a5d941376dab9874960802520f1e49dc extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'css' => [$this, 'block_stylesheets'],
            'js' => [$this, 'block_javascripts'],
            'body' => [$this, 'block_body'],
        ];
    }

    public function getSourceContext()
    {
        return new Source("", "base/base.html.twig", "/app/templates/base/base.html.twig");
    }

    // line 6

    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 7
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 10
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "base/base.html.twig";
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
        return array(78 => 10, 72 => 7, 66 => 6, 61 => 12, 59 => 10, 55 => 8, 52 => 7, 50 => 6, 45 => 4, 40 => 1,);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<html lang=\"en\">
<header>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"/>
    ";
        // line 4
        echo $this->extensions['Odan\Twig\TwigAssetsExtension']->assets(["files" => ["base/base.css"]]);
        echo "
    <script src=\"https://kit.fontawesome.com/14c5ded771.js\" crossorigin=\"anonymous\"></script>
    ";
        // line 6
        $this->displayBlock('css', $context, $blocks);
        // line 7
        echo "    ";
        $this->displayBlock('js', $context, $blocks);
        // line 8
        echo "</header>
<body>
";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 12
        echo "</body>
</html>";
    }
}
