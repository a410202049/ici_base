<?php

/* Common/common.twig */
class __TwigTemplate_db698b3cd394a793c3a1fe5033d3cd756fbd510c587d09fa62a2de452914b0fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'style' => array($this, 'block_style'),
            'container' => array($this, 'block_container'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"zh-CN\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"renderer\" content=\"webkit\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta name=\"keywords\" content=\"";
        // line 9
        $this->displayBlock('keywords', $context, $blocks);
        echo "\">
    <meta name=\"description\" content=\"";
        // line 10
        $this->displayBlock('description', $context, $blocks);
        echo "\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, base_url("public/home/css/bootstrap.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, base_url("public/home/css/nprogress.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, base_url("public/home/js/highlight/default.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, base_url("public/home/css/style.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, base_url("public/home/css/font-awesome.min.css"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon-precomposed\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, base_url("public/home/images/icon.png"), "html", null, true);
        echo "\">
    <link rel=\"shortcut icon\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, base_url("public/home/images/favicon.ico"), "html", null, true);
        echo "\">
    <script src=\"";
        // line 18
        echo twig_escape_filter($this->env, base_url("public/home/js/jquery-2.1.4.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, base_url("public/home/js/layer/layer.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, base_url("public/home/js/nprogress.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, base_url("public/home/js/jquery.lazyload.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, base_url("public/home/js/pjax/pjax.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, base_url("public/home/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 24
        echo twig_escape_filter($this->env, base_url("public/home/js/highlight/highlight.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, base_url("public/home/js/scripts.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 26
        $this->displayBlock('style', $context, $blocks);
        // line 27
        echo "
</head>
<body class=\"user-select\">
<header class=\"header\">
  <nav class=\"navbar navbar-default\" id=\"navbar\">
    <div class=\"container\">
      <div class=\"navbar-header\">
        <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#header-navbar\" aria-expanded=\"false\"> <span class=\"sr-only\"></span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span> </button>
        <h1 class=\"logo hvr-bounce-in\"><a href=\"http://www.muzhuangnet.com/\" title=\"木庄网络博客\"><img src=\"http://www.muzhuangnet.com/upload/201610/17/201610171329086541.png\" alt=\"木庄网络博客\"></a></h1>
      </div>
      <div class=\"collapse navbar-collapse\" id=\"header-navbar\">
        <form class=\"navbar-form visible-xs\" action=\"";
        // line 38
        echo twig_escape_filter($this->env, base_url("search"), "html", null, true);
        echo "/1\" method=\"get\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"keyword\" class=\"form-control\" placeholder=\"请输入关键字\" maxlength=\"20\" autocomplete=\"off\">
            <span class=\"input-group-btn\">
            <button class=\"btn btn-default btn-search\" type=\"submit\">搜索</button>
            </span> </div>
        </form>
        <ul class=\"nav navbar-nav navbar-right\">
          ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["navs"]) ? $context["navs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["nav"]) {
            // line 47
            echo "            <li><a target=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "target", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "keywords", array()), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "href", array()), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "name", array()), "html", null, true);
            echo "</a></li>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nav'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "        </ul>
      </div>
    </div>
  </nav>
</header>
";
        // line 54
        $this->displayBlock('container', $context, $blocks);
        // line 55
        echo "<footer class=\"footer\">
  <div class=\"container\">
    <p>本站[<a href=\"http://www.muzhuangnet.com/\" >木庄网络博客</a>]的部分内容来源于网络，若侵犯到您的利益，请联系站长删除！谢谢！Powered By [<a href=\"http://www.dtcms.net/\" target=\"_blank\" rel=\"nofollow\" >DTcms</a>] Version 4.0 &nbsp;<a href=\"http://www.miitbeian.gov.cn/\" target=\"_blank\" rel=\"nofollow\" >闽ICP备00000000号-1</a> &nbsp; <a href=\"http://www.muzhuangnet.com/sitemap.xml\" target=\"_blank\" class=\"sitemap\" >网站地图</a></p>
  </div>
  <div id=\"gotop\"><a class=\"gotop\"></a></div>
</footer>

    ";
        // line 62
        $this->displayBlock('script', $context, $blocks);
        // line 63
        echo "</body>
</html>
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "sitename", array()), "html", null, true);
    }

    // line 9
    public function block_keywords($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "keywords", array()), "html", null, true);
    }

    // line 10
    public function block_description($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "description", array()), "html", null, true);
    }

    // line 26
    public function block_style($context, array $blocks = array())
    {
    }

    // line 54
    public function block_container($context, array $blocks = array())
    {
    }

    // line 62
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
        return array (  205 => 62,  200 => 54,  195 => 26,  189 => 10,  183 => 9,  177 => 8,  171 => 63,  169 => 62,  160 => 55,  158 => 54,  151 => 49,  136 => 47,  132 => 46,  121 => 38,  108 => 27,  106 => 26,  102 => 25,  98 => 24,  94 => 23,  90 => 22,  86 => 21,  82 => 20,  78 => 19,  74 => 18,  70 => 17,  66 => 16,  62 => 15,  58 => 14,  54 => 13,  50 => 12,  46 => 11,  42 => 10,  38 => 9,  34 => 8,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!doctype html>
<html lang=\"zh-CN\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"renderer\" content=\"webkit\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>{% block title %}{{site.sitename}}{% endblock %}</title>
    <meta name=\"keywords\" content=\"{% block keywords %}{{site.keywords}}{% endblock %}\">
    <meta name=\"description\" content=\"{% block description %}{{site.description}}{% endblock %}\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{base_url('public/home/css/bootstrap.min.css')}}\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{base_url('public/home/css/nprogress.css')}}\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{base_url('public/home/js/highlight/default.min.css')}}\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{base_url('public/home/css/style.css')}}\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{base_url('public/home/css/font-awesome.min.css')}}\">
    <link rel=\"apple-touch-icon-precomposed\" href=\"{{base_url('public/home/images/icon.png')}}\">
    <link rel=\"shortcut icon\" href=\"{{base_url('public/home/images/favicon.ico')}}\">
    <script src=\"{{base_url('public/home/js/jquery-2.1.4.min.js')}}\"></script>
    <script src=\"{{base_url('public/home/js/layer/layer.js')}}\"></script>
    <script src=\"{{base_url('public/home/js/nprogress.js')}}\"></script>
    <script src=\"{{base_url('public/home/js/jquery.lazyload.min.js')}}\"></script>
    <script src=\"{{base_url('public/home/js/pjax/pjax.min.js')}}\"></script>
    <script src=\"{{base_url('public/home/js/bootstrap.min.js')}}\"></script>
    <script src=\"{{base_url('public/home/js/highlight/highlight.min.js')}}\"></script>
    <script src=\"{{base_url('public/home/js/scripts.js')}}\"></script>
    {% block style %}{% endblock %}

</head>
<body class=\"user-select\">
<header class=\"header\">
  <nav class=\"navbar navbar-default\" id=\"navbar\">
    <div class=\"container\">
      <div class=\"navbar-header\">
        <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#header-navbar\" aria-expanded=\"false\"> <span class=\"sr-only\"></span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span> </button>
        <h1 class=\"logo hvr-bounce-in\"><a href=\"http://www.muzhuangnet.com/\" title=\"木庄网络博客\"><img src=\"http://www.muzhuangnet.com/upload/201610/17/201610171329086541.png\" alt=\"木庄网络博客\"></a></h1>
      </div>
      <div class=\"collapse navbar-collapse\" id=\"header-navbar\">
        <form class=\"navbar-form visible-xs\" action=\"{{base_url('search')}}/1\" method=\"get\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"keyword\" class=\"form-control\" placeholder=\"请输入关键字\" maxlength=\"20\" autocomplete=\"off\">
            <span class=\"input-group-btn\">
            <button class=\"btn btn-default btn-search\" type=\"submit\">搜索</button>
            </span> </div>
        </form>
        <ul class=\"nav navbar-nav navbar-right\">
          {% for nav in navs  %}
            <li><a target=\"{{nav.target}}\" title=\"{{nav.keywords}}\" href=\"{{nav.href}}\" >{{nav.name}}</a></li>
          {% endfor %}
        </ul>
      </div>
    </div>
  </nav>
</header>
{% block container %}{% endblock %}
<footer class=\"footer\">
  <div class=\"container\">
    <p>本站[<a href=\"http://www.muzhuangnet.com/\" >木庄网络博客</a>]的部分内容来源于网络，若侵犯到您的利益，请联系站长删除！谢谢！Powered By [<a href=\"http://www.dtcms.net/\" target=\"_blank\" rel=\"nofollow\" >DTcms</a>] Version 4.0 &nbsp;<a href=\"http://www.miitbeian.gov.cn/\" target=\"_blank\" rel=\"nofollow\" >闽ICP备00000000号-1</a> &nbsp; <a href=\"http://www.muzhuangnet.com/sitemap.xml\" target=\"_blank\" class=\"sitemap\" >网站地图</a></p>
  </div>
  <div id=\"gotop\"><a class=\"gotop\"></a></div>
</footer>

    {% block script %}{% endblock %}
</body>
</html>
", "Common/common.twig", "D:\\phpStudy\\WWW\\ici_base\\templates\\home\\default\\Common\\common.twig");
    }
}
