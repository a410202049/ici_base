<?php

/* Article/list.twig */
class __TwigTemplate_80e230945276bbbf5dcc8382fac97b010e75c86ac62a156021e2d96d2d3b2e6e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("Common/common.twig", "Article/list.twig", 1);
        $this->blocks = array(
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
    public function block_container($context, array $blocks = array())
    {
        // line 3
        echo "<section class=\"container\">
  <div class=\"content-wrap\">
    <div class=\"content\" id=\"content\">
";
        // line 11
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["articles"]) ? $context["articles"] : null), "articles", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 12
            echo "          ";
            if (((isset($context["page_index"]) ? $context["page_index"] : null) == "1")) {
                // line 13
                echo "              ";
                if ((($this->getAttribute($context["loop"], "index", array()) <= 2) && ($this->getAttribute($context["article"], "is_top", array()) == "1"))) {
                    // line 14
                    echo "                <article class=\"excerpt-minic excerpt-minic-index\">
                      <h2><span class=\"red\">【置顶】</span><a class=\"pjax\" target=\"_self\" href=\"";
                    // line 15
                    echo twig_escape_filter($this->env, base_url(("detail/" . $this->getAttribute($context["article"], "id", array()))), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
                    echo "</a>
                      </h2>
                      <p class=\"note\">";
                    // line 17
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "description", array()), "html", null, true);
                    echo "</p>
                </article>
              ";
                } else {
                    // line 20
                    echo "                  <article class=\"excerpt excerpt-3 ";
                    if ( !$this->getAttribute($context["article"], "cover_img", array())) {
                        echo "excerpt_no_pic";
                    }
                    echo "\" style=\"\">
                        ";
                    // line 21
                    if ($this->getAttribute($context["article"], "cover_img", array())) {
                        // line 22
                        echo "                          <a class=\"pjax focus\" href=\"";
                        echo twig_escape_filter($this->env, base_url(("detail/" . $this->getAttribute($context["article"], "id", array()))), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
                        echo "\" target=\"_self\" ><img class=\"thumb\"  src=\"";
                        echo twig_escape_filter($this->env, base_url($this->getAttribute($context["article"], "cover_img", array())), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
                        echo "\"  style=\"display: inline;\"></a>
                        ";
                    }
                    // line 24
                    echo "                        <header><a class=\"pjax cat\" href=\"";
                    echo twig_escape_filter($this->env, base_url(("category/" . $this->getAttribute($context["article"], "cid", array()))), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "cname", array()), "html", null, true);
                    echo "\" >";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "cname", array()), "html", null, true);
                    echo "<i></i></a>
                            <h2><a class=\"pjax\" href=\"";
                    // line 25
                    echo twig_escape_filter($this->env, base_url(("detail/" . $this->getAttribute($context["article"], "id", array()))), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
                    echo "\" target=\"_self\" >";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
                    echo "</a>
                            </h2>
                        </header>
                        <p class=\"meta\">
                            <time class=\"time\"><i class=\"glyphicon glyphicon-time\"></i> ";
                    // line 29
                    if ($this->getAttribute($context["article"], "publishtime", array())) {
                        echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["article"], "publishtime", array()), 0, 10), "html", null, true);
                    } else {
                        echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["article"], "createtime", array()), 0, 10), "html", null, true);
                    }
                    echo "</time>
                            <span class=\"views\"><i class=\"glyphicon glyphicon-eye-open\"></i> ";
                    // line 30
                    if ($this->getAttribute($context["article"], "hit_num", array())) {
                        echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "hit_num", array()), "html", null, true);
                    } else {
                        echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "real_hit_num", array()), "html", null, true);
                    }
                    echo "</span>
                             ";
                    // line 32
                    echo "                        </p>
                        <p class=\"note\">";
                    // line 33
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "description", array()), "html", null, true);
                    echo "</p>
                    </article>
              ";
                }
                // line 36
                echo "          ";
            } else {
                // line 37
                echo "              <article class=\"excerpt excerpt-3 ";
                if ( !$this->getAttribute($context["article"], "cover_img", array())) {
                    echo "excerpt_no_pic";
                }
                echo "\" style=\"\">
                    ";
                // line 38
                if ($this->getAttribute($context["article"], "cover_img", array())) {
                    // line 39
                    echo "                      <a class=\"pjax focus\" href=\"";
                    echo twig_escape_filter($this->env, base_url(("detail/" . $this->getAttribute($context["article"], "id", array()))), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
                    echo "\" target=\"_self\" ><img class=\"thumb\"  src=\"";
                    echo twig_escape_filter($this->env, base_url($this->getAttribute($context["article"], "cover_img", array())), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
                    echo "\"  style=\"display: inline;\"></a>
                    ";
                }
                // line 41
                echo "                    <header><a class=\"pjax cat\" href=\"";
                echo twig_escape_filter($this->env, base_url(("category/" . $this->getAttribute($context["article"], "cid", array()))), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "cname", array()), "html", null, true);
                echo "\" >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "cname", array()), "html", null, true);
                echo "<i></i></a>
                        <h2><a class=\"pjax\" href=\"";
                // line 42
                echo twig_escape_filter($this->env, base_url(("detail/" . $this->getAttribute($context["article"], "id", array()))), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
                echo "\" target=\"_self\" >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
                echo "</a>
                        </h2>
                    </header>
                    <p class=\"meta\">
                        <time class=\"time\"><i class=\"glyphicon glyphicon-time\"></i> ";
                // line 46
                if ($this->getAttribute($context["article"], "publishtime", array())) {
                    echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["article"], "publishtime", array()), 0, 10), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["article"], "createtime", array()), 0, 10), "html", null, true);
                }
                echo "</time>
                        <span class=\"views\"><i class=\"glyphicon glyphicon-eye-open\"></i> ";
                // line 47
                if ($this->getAttribute($context["article"], "hit_num", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "hit_num", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "real_hit_num", array()), "html", null, true);
                }
                echo "</span>
                         ";
                // line 49
                echo "                    </p>
                    <p class=\"note\">";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "description", array()), "html", null, true);
                echo "</p>
                </article>
          ";
            }
            // line 53
            echo "
      ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "      ";
        echo $this->getAttribute((isset($context["articles"]) ? $context["articles"] : null), "pager", array());
        echo "
    </div>
  </div>
  <aside class=\"sidebar\">
    <div class=\"widget widget_search\">
      <form class=\"navbar-form\" action=\"";
        // line 60
        echo twig_escape_filter($this->env, base_url("search"), "html", null, true);
        echo "/1\" method=\"get\">
        <div class=\"input-group\">
          <input type=\"text\" name=\"keyword\" class=\"form-control\" size=\"35\" placeholder=\"请输入关键字\" maxlength=\"15\" autocomplete=\"off\">
          <span class=\"input-group-btn\">
          <button class=\"btn btn-default btn-search\" type=\"submit\">搜索</button>
          </span> </div>
      </form>
    </div>
    <div class=\"widget widget_hot\">
          <h3>热门文章</h3>
          <ul>   
            ";
        // line 71
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["hots"]) ? $context["hots"] : null), "articles", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            echo "         
                <li><a title=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, base_url(("detail/" . $this->getAttribute($context["article"], "id", array()))), "html", null, true);
            echo "\" ><span class=\"thumbnail\">
                      <img class=\"thumb\" src=\"";
            // line 73
            echo twig_escape_filter($this->env, base_url($this->getAttribute($context["article"], "cover_img", array())), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
            echo "\"  style=\"display: block;\">
                  </span><span class=\"text\">";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
            echo "</span><span class=\"muted\"><i class=\"glyphicon glyphicon-time\"></i>
                      ";
            // line 75
            if ($this->getAttribute($context["article"], "publishtime", array())) {
                echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["article"], "publishtime", array()), 0, 10), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["article"], "createtime", array()), 0, 10), "html", null, true);
            }
            // line 76
            echo "                  </span><span class=\"muted\"><i class=\"glyphicon glyphicon-eye-open\"></i> ";
            if ($this->getAttribute($context["article"], "hit_num", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "hit_num", array()), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "real_hit_num", array()), "html", null, true);
            }
            echo "</span></a>
                </li> 
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo " 
          </ul>
     </div>
     <div class=\"widget widget_sentence\">
      <h3>文章归档</h3> 
        <ol class=\"field\">
           ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ym"]) ? $context["ym"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["y"]) {
            echo "   
          <li><a href=\"";
            // line 85
            echo twig_escape_filter($this->env, base_url(("article/date/" . $this->getAttribute($context["y"], "ym", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["y"], "ymtime", array()), "html", null, true);
            echo "(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["y"], "num", array()), "html", null, true);
            echo ")</a></li>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['y'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo " 
        </ol>
     </div>
    <div class=\"widget widget_sentence\">
      <h3>友情链接</h3>
      <div class=\"widget-sentence-link\">
         ";
        // line 92
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["links"]) ? $context["links"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            echo "  
          <a href=\"";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute($context["link"], "url", array()), "html", null, true);
            echo "\" title=\"网站建设\" target=\"_self\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["link"], "name", array()), "html", null, true);
            echo "</a>&nbsp;&nbsp;&nbsp;
         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo " 
      </div>
    </div>
  </aside>
</section>
";
    }

    public function getTemplateName()
    {
        return "Article/list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  343 => 94,  333 => 93,  327 => 92,  319 => 86,  307 => 85,  301 => 84,  293 => 78,  279 => 76,  273 => 75,  269 => 74,  263 => 73,  257 => 72,  251 => 71,  237 => 60,  228 => 55,  213 => 53,  207 => 50,  204 => 49,  196 => 47,  188 => 46,  177 => 42,  168 => 41,  156 => 39,  154 => 38,  147 => 37,  144 => 36,  138 => 33,  135 => 32,  127 => 30,  119 => 29,  108 => 25,  99 => 24,  87 => 22,  85 => 21,  78 => 20,  72 => 17,  63 => 15,  60 => 14,  57 => 13,  54 => 12,  36 => 11,  31 => 3,  28 => 2,  11 => 1,);
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
{% block container %}
<section class=\"container\">
  <div class=\"content-wrap\">
    <div class=\"content\" id=\"content\">
{#       {% if page_index == '1'%}
        {% for article in tops.articles %}

        {% endfor %}
      {% endif %} #}
      {% for article in articles.articles %}
          {% if page_index == '1' %}
              {% if loop.index <= 2 and article.is_top == '1' %}
                <article class=\"excerpt-minic excerpt-minic-index\">
                      <h2><span class=\"red\">【置顶】</span><a class=\"pjax\" target=\"_self\" href=\"{{base_url('detail/'~article.id)}}\" title=\"{{article.title}}\">{{article.title}}</a>
                      </h2>
                      <p class=\"note\">{{article.description}}</p>
                </article>
              {% else %}
                  <article class=\"excerpt excerpt-3 {% if not article.cover_img %}excerpt_no_pic{% endif %}\" style=\"\">
                        {% if article.cover_img %}
                          <a class=\"pjax focus\" href=\"{{base_url('detail/'~article.id)}}\" title=\"{{article.title}}\" target=\"_self\" ><img class=\"thumb\"  src=\"{{base_url(article.cover_img)}}\" alt=\"{{article.title}}\"  style=\"display: inline;\"></a>
                        {% endif %}
                        <header><a class=\"pjax cat\" href=\"{{base_url('category/'~article.cid)}}\" title=\"{{article.cname}}\" >{{article.cname}}<i></i></a>
                            <h2><a class=\"pjax\" href=\"{{base_url('detail/'~article.id)}}\" title=\"{{article.title}}\" target=\"_self\" >{{article.title}}</a>
                            </h2>
                        </header>
                        <p class=\"meta\">
                            <time class=\"time\"><i class=\"glyphicon glyphicon-time\"></i> {% if article.publishtime %}{{article.publishtime|slice(0,10)}}{% else %}{{article.createtime|slice(0,10)}}{% endif %}</time>
                            <span class=\"views\"><i class=\"glyphicon glyphicon-eye-open\"></i> {% if article.hit_num %}{{article.hit_num}}{% else %}{{article.real_hit_num}}{% endif %}</span>
                             {# <a class=\"comment\" href=\"##comment\" title=\"评论\" target=\"_self\" ><i class=\"glyphicon glyphicon-comment\"></i> 0</a> #}
                        </p>
                        <p class=\"note\">{{article.description}}</p>
                    </article>
              {% endif %}
          {% else %}
              <article class=\"excerpt excerpt-3 {% if not article.cover_img %}excerpt_no_pic{% endif %}\" style=\"\">
                    {% if article.cover_img %}
                      <a class=\"pjax focus\" href=\"{{base_url('detail/'~article.id)}}\" title=\"{{article.title}}\" target=\"_self\" ><img class=\"thumb\"  src=\"{{base_url(article.cover_img)}}\" alt=\"{{article.title}}\"  style=\"display: inline;\"></a>
                    {% endif %}
                    <header><a class=\"pjax cat\" href=\"{{base_url('category/'~article.cid)}}\" title=\"{{article.cname}}\" >{{article.cname}}<i></i></a>
                        <h2><a class=\"pjax\" href=\"{{base_url('detail/'~article.id)}}\" title=\"{{article.title}}\" target=\"_self\" >{{article.title}}</a>
                        </h2>
                    </header>
                    <p class=\"meta\">
                        <time class=\"time\"><i class=\"glyphicon glyphicon-time\"></i> {% if article.publishtime %}{{article.publishtime|slice(0,10)}}{% else %}{{article.createtime|slice(0,10)}}{% endif %}</time>
                        <span class=\"views\"><i class=\"glyphicon glyphicon-eye-open\"></i> {% if article.hit_num %}{{article.hit_num}}{% else %}{{article.real_hit_num}}{% endif %}</span>
                         {# <a class=\"comment\" href=\"##comment\" title=\"评论\" target=\"_self\" ><i class=\"glyphicon glyphicon-comment\"></i> 0</a> #}
                    </p>
                    <p class=\"note\">{{article.description}}</p>
                </article>
          {% endif %}

      {% endfor %}
      {{articles.pager|raw}}
    </div>
  </div>
  <aside class=\"sidebar\">
    <div class=\"widget widget_search\">
      <form class=\"navbar-form\" action=\"{{base_url('search')}}/1\" method=\"get\">
        <div class=\"input-group\">
          <input type=\"text\" name=\"keyword\" class=\"form-control\" size=\"35\" placeholder=\"请输入关键字\" maxlength=\"15\" autocomplete=\"off\">
          <span class=\"input-group-btn\">
          <button class=\"btn btn-default btn-search\" type=\"submit\">搜索</button>
          </span> </div>
      </form>
    </div>
    <div class=\"widget widget_hot\">
          <h3>热门文章</h3>
          <ul>   
            {% for article in hots.articles %}         
                <li><a title=\"{{article.title}}\" href=\"{{base_url('detail/'~article.id)}}\" ><span class=\"thumbnail\">
                      <img class=\"thumb\" src=\"{{base_url(article.cover_img)}}\" alt=\"{{article.title}}\"  style=\"display: block;\">
                  </span><span class=\"text\">{{article.title}}</span><span class=\"muted\"><i class=\"glyphicon glyphicon-time\"></i>
                      {% if article.publishtime %}{{article.publishtime|slice(0,10)}}{% else %}{{article.createtime|slice(0,10)}}{% endif %}
                  </span><span class=\"muted\"><i class=\"glyphicon glyphicon-eye-open\"></i> {% if article.hit_num %}{{article.hit_num}}{% else %}{{article.real_hit_num}}{% endif %}</span></a>
                </li> 
            {% endfor %} 
          </ul>
     </div>
     <div class=\"widget widget_sentence\">
      <h3>文章归档</h3> 
        <ol class=\"field\">
           {% for y in ym %}   
          <li><a href=\"{{base_url('article/date/'~y.ym)}}\">{{y.ymtime}}({{y.num}})</a></li>
          {% endfor %} 
        </ol>
     </div>
    <div class=\"widget widget_sentence\">
      <h3>友情链接</h3>
      <div class=\"widget-sentence-link\">
         {% for link in links %}  
          <a href=\"{{link.url}}\" title=\"网站建设\" target=\"_self\" >{{link.name}}</a>&nbsp;&nbsp;&nbsp;
         {% endfor %} 
      </div>
    </div>
  </aside>
</section>
{% endblock %}
", "Article/list.twig", "D:\\phpStudy\\WWW\\ici_base\\templates\\home\\default\\Article\\list.twig");
    }
}
