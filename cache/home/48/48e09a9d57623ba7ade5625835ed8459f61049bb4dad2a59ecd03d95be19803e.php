<?php

/* Article/detail.twig */
class __TwigTemplate_e22f2a2be8fec2a538609ddda792e6afe30261733d6a56372feb32861362fda2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("Common/common.twig", "Article/detail.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'style' => array($this, 'block_style'),
            'container' => array($this, 'block_container'),
            'script' => array($this, 'block_script'),
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "sitename", array()), "html", null, true);
        echo "--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "title", array()), "html", null, true);
    }

    // line 4
    public function block_keywords($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "keywords", array()), "html", null, true);
    }

    // line 5
    public function block_description($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "description", array()), "html", null, true);
    }

    // line 8
    public function block_style($context, array $blocks = array())
    {
    }

    // line 10
    public function block_container($context, array $blocks = array())
    {
        // line 11
        echo "<section class=\"container\">
<div class=\"content-wrap single\">
    <div class=\"content\" id=\"content\">
      <header class=\"article-header\">
        <h1 class=\"article-title\">";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "title", array()), "html", null, true);
        echo "</h1>
        <div class=\"article-meta\"> <span class=\"item article-meta-time\">
          <time class=\"time\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"发表时间：";
        // line 17
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "publishtime", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "publishtime", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "createtime", array()), "html", null, true);
        }
        echo "\"><i class=\"glyphicon glyphicon-time\"></i> ";
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "publishtime", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "publishtime", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "createtime", array()), "html", null, true);
        }
        echo "</time>
          </span> <span class=\"item article-meta-source\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "nickname", array()), "html", null, true);
        echo "\"><i class=\"glyphicon glyphicon-globe\"></i> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "nickname", array()), "html", null, true);
        echo "</span> <span class=\"item article-meta-category\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "cname", array()), "html", null, true);
        echo "\"><i class=\"glyphicon glyphicon-list\"></i> <a href=\"javascript:void(0);\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "cname", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "cname", array()), "html", null, true);
        echo "</a></span> <span class=\"item article-meta-views\" data-toggle=\"tooltip\" data-placement=\"bottom\"><i class=\"glyphicon glyphicon-eye-open\"></i> ";
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "hit_num", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "hit_num", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "real_hit_num", array()), "html", null, true);
        }
        echo "</span> ";
        echo " </div>
      </header>
      <article class=\"article-content\">
        ";
        // line 21
        echo $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "content", array());
        echo "
      </article>
      ";
        // line 23
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "tags", array())) {
            // line 24
            echo "        <div class=\"article-tags\">
          标签：
          ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "tags", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 27
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, base_url(("tags/" . $this->getAttribute($context["tag"], "id", array()))), "html", null, true);
                echo "\" rel=\"tag\" style=\"color:";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "fontcolor", array()), "html", null, true);
                echo ";background:";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "color", array()), "html", null, true);
                echo ";border:1px solid ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "bordercolor", array()), "html", null, true);
                echo ";\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "name", array()), "html", null, true);
                echo "</a>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "        </div>
      ";
        }
        // line 31
        echo "      ";
        if ((isset($context["about"]) ? $context["about"] : null)) {
            // line 32
            echo "        <div class=\"relates\">
          <div class=\"title\">
            <h3>相关推荐</h3>
          </div>
          <ul>
            ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["about"]) ? $context["about"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                echo "   
              <li><a href=\"";
                // line 38
                echo twig_escape_filter($this->env, base_url(("detail/" . $this->getAttribute($context["article"], "id", array()))), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
                echo "</a></li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "          </ul>
        </div>
      ";
        }
        // line 43
        echo "      <div class=\"article_next_prev\">
        <ul>
          ";
        // line 45
        if ($this->getAttribute((isset($context["prev_next"]) ? $context["prev_next"] : null), "prev", array())) {
            // line 46
            echo "            <li>上一篇：<a href=\"";
            echo twig_escape_filter($this->env, base_url(("detail/" . $this->getAttribute($this->getAttribute((isset($context["prev_next"]) ? $context["prev_next"] : null), "prev", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["prev_next"]) ? $context["prev_next"] : null), "prev", array()), "title", array()), "html", null, true);
            echo "</a></li>
          ";
        }
        // line 48
        echo "          ";
        if ($this->getAttribute((isset($context["prev_next"]) ? $context["prev_next"] : null), "next", array())) {
            // line 49
            echo "          <li>下一篇：<a href=\"";
            echo twig_escape_filter($this->env, base_url(("detail/" . $this->getAttribute($this->getAttribute((isset($context["prev_next"]) ? $context["prev_next"] : null), "next", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["prev_next"]) ? $context["prev_next"] : null), "next", array()), "title", array()), "html", null, true);
            echo "</a></li>
          ";
        }
        // line 51
        echo "        </ul>
      </div>
      <div class=\"title\" id=\"comment\">
        <h3>评论</h3>
      </div>
      <div id=\"respond\">
          <div class=\"comment\">
              <input id=\"nickname\" class=\"form-control\" size=\"22\" placeholder=\"您的昵称（必填）\" maxlength=\"15\" autocomplete=\"off\" tabindex=\"1\" type=\"text\">
              <input id=\"web_email\" class=\"form-control\" size=\"22\" placeholder=\"您的网址或邮箱（非必填）\" maxlength=\"58\" autocomplete=\"off\" tabindex=\"2\" type=\"text\">
              <div class=\"comment-box\">
                  <textarea placeholder=\"您的评论或留言（必填）\" name=\"comment-textarea\" id=\"comment-textarea\" cols=\"100%\" rows=\"3\" tabindex=\"3\"></textarea>
                  <div class=\"comment-ctrl\">
                      <div class=\"comment-prompt\" style=\"display: none;\"> <i class=\"fa fa-spin fa-circle-o-notch\"></i> <span class=\"comment-prompt-text\">评论正在提交中...请稍后</span> </div>
                      <div class=\"comment-success\" style=\"display: none;\"> <i class=\"fa fa-check\"></i> <span class=\"comment-prompt-text\">评论提交成功...</span> </div>
                      <button type=\"button\" name=\"comment-submit\" id=\"comment-submit\" tabindex=\"4\">评论</button>
                  </div>
              </div>
          </div>
        </div>
      <div id=\"postcomments\">
      <ol id=\"comment_list\" class=\"commentlist\"> 
        ";
        // line 72
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) ? $context["comments"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            echo "  
        <li class=\"comment-content\"><span class=\"comment-f\">#";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "</span><div class=\"comment-main\"><p><a class=\"address\" href=\"";
            if ($this->getAttribute($context["comment"], "website", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "website", array()), "html", null, true);
            } else {
                echo "javascript:void(0);";
            }
            echo "\" rel=\"nofollow\" ";
            if ($this->getAttribute($context["comment"], "website", array())) {
                echo "target=\"_blank\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "nickname", array()), "html", null, true);
            echo "</a><span class=\"time\">(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "createtime", array()), "html", null, true);
            echo ")</span><br>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "content", array()), "html", null, true);
            echo "
        ";
            // line 74
            if ($this->getAttribute($context["comment"], "reply", array())) {
                // line 75
                echo "        <br>&nbsp;&nbsp;
          【站长回复(";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "reply_time", array()), "html", null, true);
                echo ")】：";
                echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "reply", array()), "html", null, true);
                echo "
        ";
            }
            // line 78
            echo "        </p></div></li>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "      </ol>
      </div>
      <script type=\"text/javascript\">
        create_element('js', \"";
        // line 83
        echo twig_escape_filter($this->env, base_url("public/home/js/detail.min.js"), "html", null, true);
        echo "\");
        \$(function() {
          \$(\"#comment-submit\").click(function() {
            var nickname = \$(\"#nickname\").val();
            var commentButton = \$(\"#comment-submit\");
            var web_email = \$('#web_email').val();
            var promptText = \$('#comment-textarea').val();
            var promptBox = \$('.comment-prompt');
            var promptSuccess = \$('.comment-success');
            
            var articleid = \"";
        // line 93
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "id", array()), "html", null, true);
        echo "\";
            commentButton.attr('disabled', true);
            commentButton.addClass('disabled');
             var data = {
                nickname:nickname,
                web_email:web_email,
                promptText:promptText,
                articleid:articleid
            };

            promptBox.fadeIn(400);
            \$.ajax({
              type: \"POST\",
              url: \"";
        // line 106
        echo twig_escape_filter($this->env, base_url("home/Article/commentContent"), "html", null, true);
        echo "\",
              data: data,
              cache: false,
              dataType: 'json',
              success: function(data) {
                console.log(data.status);
                if(data.status==1){
                  promptBox.css('display','none');
                  promptSuccess.fadeIn(400);
                  promptSuccess.fadeOut(1000);
                  \$('#web_email').val('');
                  \$('#comment-textarea').val('')
                  \$(\"#nickname\").val('');
                  layer.msg(data.message,{
                    icon:1
                  });
                }else{
                  promptBox.fadeOut(400);
                  layer.msg(data.message,{
                    icon:2
                  });
                }
                commentButton.attr('disabled', false);
              }
            });

            return false
          })
        });
      </script>
    </div>
</div>
  <aside class=\"sidebar\">
    <div class=\"widget widget_search\">
      <form class=\"navbar-form\" action=\"/Search\" method=\"post\">
        <div class=\"input-group\">
          <input type=\"text\" name=\"keyword\" class=\"form-control\" size=\"35\" placeholder=\"请输入关键字\" maxlength=\"15\" autocomplete=\"off\">
          <span class=\"input-group-btn\">
          <button class=\"btn btn-default btn-search\" name=\"search\" type=\"submit\">搜索</button>
          </span> </div>
      </form>
    </div>
    <div class=\"widget widget_hot\">
          <h3>随机推荐</h3>
          <ul>            
              ";
        // line 151
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["rands"]) ? $context["rands"] : null), "articles", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            echo "         
                <li><a title=\"";
            // line 152
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, base_url(("detail/" . $this->getAttribute($context["article"], "id", array()))), "html", null, true);
            echo "\" ><span class=\"thumbnail\">
                      <img class=\"thumb\" src=\"";
            // line 153
            echo twig_escape_filter($this->env, base_url($this->getAttribute($context["article"], "cover_img", array())), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
            echo "\"  style=\"display: block;\">
                  </span><span class=\"text\">";
            // line 154
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
            echo "</span><span class=\"muted\"><i class=\"glyphicon glyphicon-time\"></i>
                      ";
            // line 155
            if ($this->getAttribute($context["article"], "publishtime", array())) {
                echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["article"], "publishtime", array()), 0, 10), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["article"], "createtime", array()), 0, 10), "html", null, true);
            }
            // line 156
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
        // line 158
        echo " 
  
          </ul>
     </div>
     <div class=\"widget widget_sentence\">    
        <a href=\"http://web.muzhuangnet.com/\" target=\"_blank\" rel=\"nofollow\" title=\"专业网站建设\" >
        <img style=\"width: 100%\" src=\"http://www.muzhuangnet.com/upload/201610/24/201610241224221511.jpg\" alt=\"专业网站建设\" ></a>    
     </div>
    <div class=\"widget widget_sentence\">
      <h3>友情链接</h3>
      <div class=\"widget-sentence-link\">
        <a href=\"http://web.muzhuangnet.com\" title=\"网站建设\" target=\"_blank\" >网站建设</a>&nbsp;&nbsp;&nbsp;
      </div>
    </div>
  </aside>
</section>
";
    }

    // line 175
    public function block_script($context, array $blocks = array())
    {
        // line 176
        echo "
";
    }

    public function getTemplateName()
    {
        return "Article/detail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  437 => 176,  434 => 175,  414 => 158,  400 => 156,  394 => 155,  390 => 154,  384 => 153,  378 => 152,  372 => 151,  324 => 106,  308 => 93,  295 => 83,  290 => 80,  275 => 78,  268 => 76,  265 => 75,  263 => 74,  243 => 73,  224 => 72,  201 => 51,  193 => 49,  190 => 48,  182 => 46,  180 => 45,  176 => 43,  171 => 40,  159 => 38,  153 => 37,  146 => 32,  143 => 31,  139 => 29,  122 => 27,  118 => 26,  114 => 24,  112 => 23,  107 => 21,  86 => 18,  72 => 17,  67 => 15,  61 => 11,  58 => 10,  53 => 8,  47 => 5,  41 => 4,  33 => 3,  11 => 1,);
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

{% block title %}{{site.sitename}}--{{article.title}}{% endblock %}
{% block keywords %}{{site.keywords}}{% endblock %}
{% block description %}{{site.description}}{% endblock %}


{% block style %}
{% endblock %}
{% block container %}
<section class=\"container\">
<div class=\"content-wrap single\">
    <div class=\"content\" id=\"content\">
      <header class=\"article-header\">
        <h1 class=\"article-title\">{{article.title}}</h1>
        <div class=\"article-meta\"> <span class=\"item article-meta-time\">
          <time class=\"time\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"发表时间：{% if article.publishtime %}{{article.publishtime}}{% else %}{{article.createtime}}{% endif %}\"><i class=\"glyphicon glyphicon-time\"></i> {% if article.publishtime %}{{article.publishtime}}{% else %}{{article.createtime}}{% endif %}</time>
          </span> <span class=\"item article-meta-source\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"{{article.nickname}}\"><i class=\"glyphicon glyphicon-globe\"></i> {{article.nickname}}</span> <span class=\"item article-meta-category\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"{{article.cname}}\"><i class=\"glyphicon glyphicon-list\"></i> <a href=\"javascript:void(0);\" title=\"{{article.cname}}\">{{article.cname}}</a></span> <span class=\"item article-meta-views\" data-toggle=\"tooltip\" data-placement=\"bottom\"><i class=\"glyphicon glyphicon-eye-open\"></i> {% if article.hit_num %}{{article.hit_num}}{% else %}{{article.real_hit_num}}{% endif %}</span> {# <span class=\"item article-meta-comment\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"评论量\"><i class=\"glyphicon glyphicon-comment\"></i> 4</span> #} </div>
      </header>
      <article class=\"article-content\">
        {{article.content|raw}}
      </article>
      {% if article.tags %}
        <div class=\"article-tags\">
          标签：
          {% for tag in article.tags %}
            <a href=\"{{base_url('tags/'~tag.id)}}\" rel=\"tag\" style=\"color:{{tag.fontcolor}};background:{{tag.color}};border:1px solid {{tag.bordercolor}};\">{{tag.name}}</a>
          {% endfor %}
        </div>
      {% endif %}
      {% if about %}
        <div class=\"relates\">
          <div class=\"title\">
            <h3>相关推荐</h3>
          </div>
          <ul>
            {% for article in about %}   
              <li><a href=\"{{base_url('detail/'~article.id)}}\" title=\"{{article.title}}\">{{article.title}}</a></li>
            {% endfor %}
          </ul>
        </div>
      {% endif %}
      <div class=\"article_next_prev\">
        <ul>
          {% if prev_next.prev %}
            <li>上一篇：<a href=\"{{base_url('detail/'~prev_next.prev.id)}}\">{{prev_next.prev.title}}</a></li>
          {% endif %}
          {% if prev_next.next %}
          <li>下一篇：<a href=\"{{base_url('detail/'~prev_next.next.id)}}\">{{prev_next.next.title}}</a></li>
          {% endif %}
        </ul>
      </div>
      <div class=\"title\" id=\"comment\">
        <h3>评论</h3>
      </div>
      <div id=\"respond\">
          <div class=\"comment\">
              <input id=\"nickname\" class=\"form-control\" size=\"22\" placeholder=\"您的昵称（必填）\" maxlength=\"15\" autocomplete=\"off\" tabindex=\"1\" type=\"text\">
              <input id=\"web_email\" class=\"form-control\" size=\"22\" placeholder=\"您的网址或邮箱（非必填）\" maxlength=\"58\" autocomplete=\"off\" tabindex=\"2\" type=\"text\">
              <div class=\"comment-box\">
                  <textarea placeholder=\"您的评论或留言（必填）\" name=\"comment-textarea\" id=\"comment-textarea\" cols=\"100%\" rows=\"3\" tabindex=\"3\"></textarea>
                  <div class=\"comment-ctrl\">
                      <div class=\"comment-prompt\" style=\"display: none;\"> <i class=\"fa fa-spin fa-circle-o-notch\"></i> <span class=\"comment-prompt-text\">评论正在提交中...请稍后</span> </div>
                      <div class=\"comment-success\" style=\"display: none;\"> <i class=\"fa fa-check\"></i> <span class=\"comment-prompt-text\">评论提交成功...</span> </div>
                      <button type=\"button\" name=\"comment-submit\" id=\"comment-submit\" tabindex=\"4\">评论</button>
                  </div>
              </div>
          </div>
        </div>
      <div id=\"postcomments\">
      <ol id=\"comment_list\" class=\"commentlist\"> 
        {% for comment in comments %}  
        <li class=\"comment-content\"><span class=\"comment-f\">#{{loop.index}}</span><div class=\"comment-main\"><p><a class=\"address\" href=\"{% if comment.website %}{{comment.website}}{% else %}javascript:void(0);{% endif %}\" rel=\"nofollow\" {% if comment.website %}target=\"_blank\"{% endif %}>{{comment.nickname}}</a><span class=\"time\">({{comment.createtime}})</span><br>{{comment.content}}
        {% if comment.reply %}
        <br>&nbsp;&nbsp;
          【站长回复({{comment.reply_time}})】：{{comment.reply}}
        {% endif %}
        </p></div></li>
        {% endfor %}
      </ol>
      </div>
      <script type=\"text/javascript\">
        create_element('js', \"{{base_url('public/home/js/detail.min.js')}}\");
        \$(function() {
          \$(\"#comment-submit\").click(function() {
            var nickname = \$(\"#nickname\").val();
            var commentButton = \$(\"#comment-submit\");
            var web_email = \$('#web_email').val();
            var promptText = \$('#comment-textarea').val();
            var promptBox = \$('.comment-prompt');
            var promptSuccess = \$('.comment-success');
            
            var articleid = \"{{article.id}}\";
            commentButton.attr('disabled', true);
            commentButton.addClass('disabled');
             var data = {
                nickname:nickname,
                web_email:web_email,
                promptText:promptText,
                articleid:articleid
            };

            promptBox.fadeIn(400);
            \$.ajax({
              type: \"POST\",
              url: \"{{base_url('home/Article/commentContent')}}\",
              data: data,
              cache: false,
              dataType: 'json',
              success: function(data) {
                console.log(data.status);
                if(data.status==1){
                  promptBox.css('display','none');
                  promptSuccess.fadeIn(400);
                  promptSuccess.fadeOut(1000);
                  \$('#web_email').val('');
                  \$('#comment-textarea').val('')
                  \$(\"#nickname\").val('');
                  layer.msg(data.message,{
                    icon:1
                  });
                }else{
                  promptBox.fadeOut(400);
                  layer.msg(data.message,{
                    icon:2
                  });
                }
                commentButton.attr('disabled', false);
              }
            });

            return false
          })
        });
      </script>
    </div>
</div>
  <aside class=\"sidebar\">
    <div class=\"widget widget_search\">
      <form class=\"navbar-form\" action=\"/Search\" method=\"post\">
        <div class=\"input-group\">
          <input type=\"text\" name=\"keyword\" class=\"form-control\" size=\"35\" placeholder=\"请输入关键字\" maxlength=\"15\" autocomplete=\"off\">
          <span class=\"input-group-btn\">
          <button class=\"btn btn-default btn-search\" name=\"search\" type=\"submit\">搜索</button>
          </span> </div>
      </form>
    </div>
    <div class=\"widget widget_hot\">
          <h3>随机推荐</h3>
          <ul>            
              {% for article in rands.articles %}         
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
        <a href=\"http://web.muzhuangnet.com/\" target=\"_blank\" rel=\"nofollow\" title=\"专业网站建设\" >
        <img style=\"width: 100%\" src=\"http://www.muzhuangnet.com/upload/201610/24/201610241224221511.jpg\" alt=\"专业网站建设\" ></a>    
     </div>
    <div class=\"widget widget_sentence\">
      <h3>友情链接</h3>
      <div class=\"widget-sentence-link\">
        <a href=\"http://web.muzhuangnet.com\" title=\"网站建设\" target=\"_blank\" >网站建设</a>&nbsp;&nbsp;&nbsp;
      </div>
    </div>
  </aside>
</section>
{% endblock %}
{% block script %}

{% endblock %}
", "Article/detail.twig", "D:\\phpStudy\\WWW\\ici_base\\templates\\home\\default\\Article\\detail.twig");
    }
}
