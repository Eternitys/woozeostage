<?php

/* WSChatBundle::layout.html.twig */
class __TwigTemplate_ef38bdfaa1e7d7fe0fdc9f1a819096acd35118716ff76d2bfd5b219bb4b5e8ed extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'chat' => array($this, 'block_chat'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Chat
";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->displayBlock('chat', $context, $blocks);
    }

    public function block_chat($context, array $blocks = array())
    {
        // line 7
        echo "    ";
    }

    public function getTemplateName()
    {
        return "WSChatBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 7,  43 => 6,  40 => 5,  33 => 3,  30 => 2,  42 => 6,  39 => 5,  32 => 3,  29 => 2,);
    }
}
