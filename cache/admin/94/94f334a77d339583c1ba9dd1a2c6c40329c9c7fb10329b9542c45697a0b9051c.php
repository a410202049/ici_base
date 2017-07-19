<?php

/* Login/index.twig */
class __TwigTemplate_d7295486e6e57833e3af50b5b7b3e12c4afe96f612ed4de6f61ae1300a2d3867 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("Common/common.twig", "Login/index.twig", 1);
        $this->blocks = array(
            'script' => array($this, 'block_script'),
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Common/common.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_script($context, array $blocks = array())
    {
        // line 3
        echo "<script type=\"text/javascript\">
  function refreshimage() {
      var cap = document.getElementById('vcode');
      cap.src = cap.src + '?';
  }

if(self!=top){
    top.window.location.reload();
}
</script>
";
    }

    // line 14
    public function block_container($context, array $blocks = array())
    {
        // line 15
        echo "<body class=\"gray-bg\">
    <div class=\"middle-box text-center loginscreen  animated fadeInDown\">
        <div>
            <div>
                <img src=\"";
        // line 19
        echo twig_escape_filter($this->env, base_url("public/admin/img/logo_black.png"), "html", null, true);
        echo "\" alt=\"\">
            </div>
            <b style=\"color:red\">";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["error_flashdata"]) ? $context["error_flashdata"] : null), "html", null, true);
        echo "</b>
            <form class=\"m-t\" role=\"form\" action=\"";
        // line 22
        echo twig_escape_filter($this->env, base_url("admin/Login/do_login"), "html", null, true);
        echo "\"  method=\"post\">
                <div class=\"form-group\">
                    <input type=\"text\" class=\"form-control\" name=\"username\" placeholder=\"账号\" required=\"\">
                </div>
                <div class=\"form-group\">
                    <input type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"密码\" required=\"\">
                </div>
                <button type=\"submit\" class=\"btn btn-primary block full-width m-b\">登 录</button>
            </form>
        </div>
    </div>
</body>
";
    }

    public function getTemplateName()
    {
        return "Login/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 22,  60 => 21,  55 => 19,  49 => 15,  46 => 14,  32 => 3,  29 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"Common/common.twig\" %}
{% block script %}
<script type=\"text/javascript\">
  function refreshimage() {
      var cap = document.getElementById('vcode');
      cap.src = cap.src + '?';
  }

if(self!=top){
    top.window.location.reload();
}
</script>
{% endblock %}
{% block container %}
<body class=\"gray-bg\">
    <div class=\"middle-box text-center loginscreen  animated fadeInDown\">
        <div>
            <div>
                <img src=\"{{base_url('public/admin/img/logo_black.png')}}\" alt=\"\">
            </div>
            <b style=\"color:red\">{{error_flashdata}}</b>
            <form class=\"m-t\" role=\"form\" action=\"{{base_url('admin/Login/do_login')}}\"  method=\"post\">
                <div class=\"form-group\">
                    <input type=\"text\" class=\"form-control\" name=\"username\" placeholder=\"账号\" required=\"\">
                </div>
                <div class=\"form-group\">
                    <input type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"密码\" required=\"\">
                </div>
                <button type=\"submit\" class=\"btn btn-primary block full-width m-b\">登 录</button>
            </form>
        </div>
    </div>
</body>
{% endblock %}
", "Login/index.twig", "D:\\phpStudy\\WWW\\ici_base\\templates\\admin\\default\\Login\\index.twig");
    }
}
