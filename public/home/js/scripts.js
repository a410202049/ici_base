// NProgress.start();
// setTimeout(function() {
// 	NProgress.done();
// 	$('.fade').removeClass('out')
// }, 1000);


if(typeof Pjax != 'undefined'){
    pjax_init();
}
//初始化pjax
function pjax_init(){
    document.addEventListener('pjax:send', function() {
        NProgress.start();
    });

    document.addEventListener('pjax:complete', function() {
	    NProgress.done();
		$('.fade').removeClass('out')
    });

    document.addEventListener('pjax:error', function() {

    });

    document.addEventListener('pjax:success', function() {

    });

    document.addEventListener('DOMContentLoaded', function() {
        var pjax = new Pjax({
            elements: 'a.pjax',
            selectors: [
                'title',
                '.content-wrap'
            ]
        });
    });
}

//创建dom element,暂时只支持创建js和css
function create_element(type, url){
    var head = document.head || document.getElementsByTagName('head')[0];
    var element = '';
    if(type == 'js'){
        element = document.createElement('script');
        element.type = 'text/javascript';
        element.src = url;
    }
    else if(type == 'css'){
        var element = document.createElement('link');
        element.href = url;
        element.rel = 'stylesheet';
        element.type = 'text/css';
    }
    head.appendChild(element);
}

function setCookie(name, value, time) {
	var strsec = getsec(time);
	var exp = new Date();
	exp.setTime(exp.getTime() + strsec * 1);
	document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString()
}

function getCookie(name) {
	var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
	if (arr = document.cookie.match(reg)) {
		return unescape(arr[2])
	} else {
		return null
	}
}
$.fn.navSmartFloat = function() {
	var position = function(element) {
			var top = element.position().top,
				pos = element.css("position");
			$(window).scroll(function() {
				var scrolls = $(this).scrollTop();
				if (scrolls > top) {
					$('.header-topbar').fadeOut(0);
					if (window.XMLHttpRequest) {
						element.css({
							position: "fixed",
							top: 0
						}).addClass("shadow")
					} else {
						element.css({
							top: scrolls
						})
					}
				} else {
					$('.header-topbar').fadeIn(500);
					element.css({
						position: pos,
						top: top
					}).removeClass("shadow")
				}
			})
		};
	return $(this).each(function() {
		position($(this))
	})
};
$("#navbar").navSmartFloat();
$("#gotop").hide();
$(window).scroll(function() {
	if ($(window).scrollTop() > 100) {
		$("#gotop").fadeIn()
	} else {
		$("#gotop").fadeOut()
	}
});
$("#gotop").click(function() {
	$('html,body').animate({
		'scrollTop': 0
	}, 500)
});
$("img.thumb").lazyload({
	placeholder: "../images/occupying.png",
	effect: "fadeIn"
});
$(".single .content img").lazyload({
	placeholder: "../images/occupying.png",
	effect: "fadeIn"
});


$(window).scroll(function() {
	var sidebar = $('.sidebar');
	var sidebarHeight = sidebar.height();
	var windowScrollTop = $(window).scrollTop();
	if (windowScrollTop > sidebarHeight - 60 && sidebar.length) {
		$('.fixed').css({
			'position': 'fixed',
			'top': '70px',
			'width': '360px'
		})
	} else {
		$('.fixed').removeAttr("style")
	}
});


// $(function() {
// 	$("#comment-submit").click(function() {
// 		var commentContent = $("#comment-textarea");
// 		var commentButton = $("#comment-submit");
// 		var promptBox = $('.comment-prompt');
// 		var promptText = $('.comment-prompt-text');
// 		var articleid = $('.articleid').val();
// 		promptBox.fadeIn(400);
// 		if (commentContent.val() === '') {
// 			promptText.text('正在提交您的评论...');
// 			return false
// 		}
// 		commentButton.attr('disabled', true);
// 		commentButton.addClass('disabled');
// 		promptText.text('正在提交...');
// 		$.ajax({
// 			type: "POST",
// 			url: "test.php?id=" + articleid,
// 			data: "commentContent=" + replace_em(commentContent.val()),
// 			cache: false,
// 			success: function(data) {
// 				alert(data);
// 				promptText.text('评论成功!');
// 				commentContent.val(null);
// 				$(".commentlist").fadeIn(300);
// 				commentButton.attr('disabled', false);
// 				commentButton.removeClass('disabled')
// 			}
// 		});
// 		promptBox.fadeOut(100);
// 		return false
// 	})
// });

