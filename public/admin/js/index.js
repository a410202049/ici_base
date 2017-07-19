;var index = {
	init:function(){
		this.listnerBinder()
	},
	listnerBinder:function(){
		//双击关闭
		$(document).on('dblclick', '.J_menuTab', function(event) {
			if ($(this).attr('data-type')=='home') return false;
			$(this).find('.fa-times-circle').click()
		});
		$('.J_menuItem').one('click', function(event) {
			$(this).find(".badge-notify").empty();
		});		
        $('.change-lang').click(function(){
            var lang = $(this).data('lang');
            $.cookie('site_lang', lang,{ path: "/"}); // 存储 cookie
            window.location.reload()
        });
        $('.J_tabRefresh').on('click', function(event) {
        	$('.J_mainContent .J_iframe:visible').get(0).contentWindow.location.reload();
        	/* Act on the event */
        });	

	},
}

index.init()
