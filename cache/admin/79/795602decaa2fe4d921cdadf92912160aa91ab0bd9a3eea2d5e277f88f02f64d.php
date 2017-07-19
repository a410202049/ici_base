<?php

/* Common/common.twig */
class __TwigTemplate_5595c882bf12aed96521eead829d9cb4e26b5817f7e7872d1a3bdca95126a0e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'style' => array($this, 'block_style'),
            'container' => array($this, 'block_container'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta name=\"renderer\" content=\"webkit\">
        <meta http-equiv=\"Cache-Control\" content=\"no-siteapp\" />
        <title>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "sitename", array()), "html", null, true);
        echo "--后台管理中心</title>
        <meta name=\"keywords\" content=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "keywords", array()), "html", null, true);
        echo "\">
        <meta name=\"description\" content=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "description", array()), "html", null, true);
        echo "\">
        <!--[if lt IE 9]>
        <meta http-equiv=\"refresh\" content=\"0;ie.html\" />
        <![endif]-->
        <link rel=\"shortcut icon\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, base_url("public/admin/img/favicon.ico?v=2"), "html", null, true);
        echo "\">
        <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, base_url("public/admin/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, base_url("public/admin/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, base_url("public/admin/css/animate.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, base_url("public/admin/css/plugins/iCheck/custom.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, base_url("public/admin/css/style.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        ";
        // line 20
        $this->displayBlock('style', $context, $blocks);
        // line 21
        echo "    </head>
    <body class=\"fixed-sidebar full-height-layout gray-bg\" style=\"overflow:hidden\">
    ";
        // line 23
        $this->displayBlock('container', $context, $blocks);
        // line 24
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, base_url("public/admin/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, base_url("public/admin/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, base_url("public/admin/js/plugins/metisMenu/jquery.metisMenu.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, base_url("public/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, base_url("public/admin/js/hplus.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 29
        echo twig_escape_filter($this->env, base_url("public/admin/js/contabs.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 30
        echo twig_escape_filter($this->env, base_url("public/admin/js/plugins/iCheck/icheck.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 31
        echo twig_escape_filter($this->env, base_url("public/admin/js/plugins/layer/layer.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 32
        echo twig_escape_filter($this->env, base_url("public/admin/js/sticky.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 33
        echo twig_escape_filter($this->env, base_url("public/admin/js/common.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 34
        $this->displayBlock('script', $context, $blocks);
        // line 35
        echo "    </body>
</html>";
    }

    // line 20
    public function block_style($context, array $blocks = array())
    {
    }

    // line 23
    public function block_container($context, array $blocks = array())
    {
    }

    // line 34
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Common/common.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 34,  131 => 23,  126 => 20,  121 => 35,  119 => 34,  115 => 33,  111 => 32,  107 => 31,  103 => 30,  99 => 29,  95 => 28,  91 => 27,  87 => 26,  83 => 25,  78 => 24,  76 => 23,  72 => 21,  70 => 20,  66 => 19,  62 => 18,  58 => 17,  54 => 16,  50 => 15,  46 => 14,  39 => 10,  35 => 9,  31 => 8,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta name=\"renderer\" content=\"webkit\">
        <meta http-equiv=\"Cache-Control\" content=\"no-siteapp\" />
        <title>{{site.sitename}}--后台管理中心</title>
        <meta name=\"keywords\" content=\"{{site.keywords}}\">
        <meta name=\"description\" content=\"{{site.description}}\">
        <!--[if lt IE 9]>
        <meta http-equiv=\"refresh\" content=\"0;ie.html\" />
        <![endif]-->
        <link rel=\"shortcut icon\" href=\"{{base_url(\"public/admin/img/favicon.ico?v=2\")}}\">
        <link href=\"{{base_url('public/admin/css/bootstrap.min.css')}}\" rel=\"stylesheet\">
        <link href=\"{{base_url('public/admin/css/font-awesome.min.css')}}\" rel=\"stylesheet\">
        <link href=\"{{base_url('public/admin/css/animate.min.css')}}\" rel=\"stylesheet\">
        <link href=\"{{base_url('public/admin/css/plugins/iCheck/custom.css')}}\" rel=\"stylesheet\">
        <link href=\"{{base_url('public/admin/css/style.min.css')}}\" rel=\"stylesheet\">
        {% block style %}{% endblock %}
    </head>
    <body class=\"fixed-sidebar full-height-layout gray-bg\" style=\"overflow:hidden\">
    {% block container %}{% endblock %}
    <script src=\"{{base_url('public/admin/js/jquery.min.js')}}\"></script>
    <script src=\"{{base_url('public/admin/js/bootstrap.min.js')}}\"></script>
    <script src=\"{{base_url('public/admin/js/plugins/metisMenu/jquery.metisMenu.js')}}\"></script>
    <script src=\"{{base_url('public/admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}\"></script>
    <script src=\"{{base_url('public/admin/js/hplus.min.js')}}\"></script>
    <script src=\"{{base_url('public/admin/js/contabs.min.js')}}\"></script>
    <script src=\"{{base_url('public/admin/js/plugins/iCheck/icheck.min.js')}}\"></script>
    <script src=\"{{base_url('public/admin/js/plugins/layer/layer.js')}}\"></script>
    <script src=\"{{base_url('public/admin/js/sticky.min.js')}}\"></script>
    <script src=\"{{base_url('public/admin/js/common.js')}}\"></script>
    {% block script %}{% endblock %}
    </body>
</html>", "Common/common.twig", "D:\\phpStudy\\WWW\\ici_base\\templates\\admin\\default\\Common\\common.twig");
    }
}
