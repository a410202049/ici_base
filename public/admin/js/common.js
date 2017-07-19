Date.prototype.Format = function (fmt) { 
    var fmt = fmt||"yyyy-MM-dd";
    var o = {
        "M+": this.getMonth() + 1, //月份 
        "d+": this.getDate(), //日 
        "h+": this.getHours(), //小时 
        "m+": this.getMinutes(), //分 
        "s+": this.getSeconds(), //秒 
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
        "S": this.getMilliseconds() //毫秒 
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}
// window.addEventListener('error', function(msg){
//     console.log(msg)
// }, true)
$.getUrlParam = function(name){
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");  
    var r = window.location.search.substr(1).match(reg);  
    if (r != null) return unescape(r[2]); return null;
} 
// window.onerror = function(msg,url,line,col,error){
//     setTimeout(function(){
//         var data = {};
//         //不一定所有浏览器都支持col参数
//         col = col || (window.event && window.event.errorCharacter) || 0;
 
//         data.url = url;
//         data.line = line;
//         data.col = col;
//         data.lang = navigator.language;

//         if (!!error && !!error.stack){
//             data.msg = error.stack.toString();
//         }else if (!!arguments.callee){
//             //尝试通过callee拿堆栈信息
//             var ext = [];
//             var f = arguments.callee.caller, c = 3;
//             //这里只拿三层堆栈信息
//             while (f && (--c>0)) {
//                ext.push(f.toString());
//                if (f  === f.caller) {
//                     break;//如果有环
//                }
//                f = f.caller;
//             }
//             ext = ext.join(",");
//             data.msg = ext;
//         }
//         console.info(data)
//         //把data上报到后台
//     },0);
//     return true;
// }
var common = {
	init:function(){
		this.listnerBinder();
	},
    /*公用事件*/
    listnerBinder:function(){
        $('.tooltip-content').tooltip();
        $('table').stickyTableHeaders();
        $(document).on('click','.btn-toggle',function(e){
            $(this).addClass('active').siblings('.btn-toggle').removeClass('active')
        });
        $(document).on('keyup', '.numberInput,.number-input', function(e) {
            var key=window.event?e.keyCode:e.which;
            if (key == 8 || key == 9 || key == 46 || key == 37 || key == 39 ) {
                return;
            }//释放方向键
            this.value = this.value.replace(/\D/g,'');
        });//数字输入
        $(document).on('input', '.noBlank', function(e) {
            this.value = this.value.replace(/\s/g,'');
        });//数字输入
        $(document).on('click','.close-layer',function(){
            layer.closeAll();
        })
        $(document).on('focus', '.form-control', function(event) {
            $(this).parent('.form-group').removeClass('has-error')
            /* Act on the event */
        });
        $(document).on('dblclick',"#identity_key,.identity_key",function(){
            $(this).removeAttr('readonly')
        })  
        $(document).on('click', ".collapse-link", function(event) {
            var o = $(this).closest("div.ibox")
              , e = $(this).find("i")
              , i = o.find("div.ibox-content");
            i.slideToggle(200),
            e.toggleClass("fa-chevron-up").toggleClass("fa-chevron-down"),
            o.toggleClass("").toggleClass("border-bottom"),
            setTimeout(function() {
                o.resize(),
                o.find("[id^=map-]").resize()
            }, 50)
        });             
        $(document).on('keydown',function(e){
            if (e.keyCode==116) {
                e.preventDefault()
                if (self==top) {
                    if (document.querySelectorAll('iframe').length==0) {
                        window.location.reload();
                        return false;
                    }
                    var index = $(".J_menuTab.active").index()
                    var src = $('.J_mainContent iframe').eq(index).attr("src") 
                    $('.J_mainContent iframe').eq(index).get(0).contentWindow.location.reload();

                }else{
                    self.window.location.reload()
                }
            }
        });//F5事件
        $(document).on('click', '.btn-switcher', function(event) {
            $(this).toggleClass('active');
            /* Act on the event */
        });//开关按钮
        $(document).on('focus','.domain-input',function(){
            if ($(this).val()!="") return false;
            $(this).val("http://")
        })//域名输入
        $(document).on('click', '.call-media-center', function(event) {
            // call-media-center
            // uploader-list
            // uploader-input
            event.preventDefault();
            var _this = $(this)
            var target = _this.data("target");
            var url = _this.attr("href")
            var openLayer = layer.open({
                type: 2,
                closeBtn:1,
                title:'Media Center',
                shadeClose: false, //开启遮罩关闭
                area: ['600px', 'auto'],
                maxmin:true,            
                content:url+'?choose='+(_this.data("choose")||1)+'&folder='+target,
                success:function(){
                    common.imgDOM = _this.closest('.uploader-container');
                }
            });
            layer.full(openLayer)            
            /* Act on the event */
        });
    },
    mediaChooseImage:function(url,src){
        var dom = '';
        for (var i = url.length - 1; i >= 0; i--) {
            dom+='<div class="uploaded-img"><img src="'+url[i]+'" alt="" /></div>'
        }
        common.imgDOM.find('.uploader-list').html(dom);
        common.imgDOM.find('.uploader-input').val(src.join(""));

    },
	/*公用正则表达式*/
	commonReg: {
        email: /^([a-zA-Z0-9]+[_|\_|\.|-]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/,//邮件正则
        number: /^\d+$/,//数字正则
        phone: /^(13|14|15|18|17)[0-9]{9}$/,
        telphone:/^0\d{2,3}-?\d{8}$/,
        authCode: /^[0-9a-zA-Z]{4}$/,  //图形验证码
        phoneAuthCode: /^[0-9a-zA-Z]{6}$/,  //手机验证码
        pass: /((?=.*\d)(?=.*\D)|(?=.*[a-zA-Z])(?=.*[^a-zA-Z]))^.{6,20}$/,//密码正则
        name: /^[A-Za-z\u4E00-\u9FA5]{2,16}$/,//姓名正则
        identify: /^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/,//身份证正则
        bankCard: /^[0-9]{4,40}$/,//银行卡正则
        validTime: /^[1-9]\d{3}((0\d)|(1[0-2]))$/,
        safe: /[~#$￥ˇ<>（）\s\?\*\&\\\|\/\[\]\{\}\\^%]/,
        decimalLimit:/^\d+(?:\.\d{2})?$/,//两位小数
        negativeDecimalLimit:/^(-|\d)+(?:\.\d{2})?$/,//负数两位金额
        originFlowNo:/^[0-9]{22}[\-]{1}[0-9]{3}[\-]{1}[0-9]{2}$/,
    },
    /*
    	检查是否匹配正则 参数 待检查的值 正则名
    	返回值 true||false
     */
    check: function(val, reg) {
        return this.commonReg[reg].test(val);
    },
    checkForm:function(selector,tips,func){
        var dom = typeof(selector)=="string"?$(selector):selector;
        dom.find('.form-control').each(function(index, el) {
            var $this = $(this)
            switch ($this[0].nodeName.toLowerCase()) {
                case "div":
                    var v = $this.summernote('code').replace("script","p")
                    break;
                case "textarea":
                    var v = $this.val();
                    break;
                default:
                    var v  = $this.val();
                    break;
            }            
            if(v==""||v==undefined||v==null){
                $this.parent().addClass('has-error');
                if (func) {func();throw "nullValueException"}
                layer.msg(tips||"please fill up required fileds");
                throw "nullValueException"
            } 
        });
    },
    ajaxError:function(e){
        var error = e.message;
        if (!e.message) {
            switch (e.status) {
                case 200:
                    error = "200 No response"
                    break;
                case 404:
                    error = "404 Not Found"
                    break;
                case 500:
                    error = "500 Unexpected server error"
                    break;
                default:
                    error = e.statusText+" error,please try again."
                    break;
            }
        }
        layer.msg(error,{
            icon:2
        })
    },
    /**
     * [getAnalytic description]
     * @param  {[type]} option [description]
     * @return {[type]}        [description]
     */
    getMetrics:function(option,func){
        if (!option.hasOwnProperty("url")||option.url=="") {
            console.error("Url is required");
            return false;
        }
        var options = {
            metrics:["sessions"],
            range:"today",
        }
        if (option&&option.constructor==Object) {
            for(var prop in option){
                if (options.hasOwnProperty(prop)) {
                    options[prop] = option[prop];
                }
            }
        }        
        var data = {};
        $.extend(data,options);
        var now = new Date();
        switch(options.range){
            case "today":
                data.range = now.Format();
                break;
            case "yesterday":
                data.range = new Date(now.getTime() - (1000*60*60*24)).Format() + "/" + now.Format();
                break;
            case "this_week":
                data.range = new Date(now.getTime() - (now.getDay()-1)*(1000*60*60*24)).Format() + "/" + now.Format();
            default:
                data.range = option.range;
                break;    
        }
        var result;
        $.ajax({
            url: option.url,
            type: 'POST',
            dataType: 'json',
            data: data,
            timeout:10000,
            beforeSend:option.beforeSend
        })
        .done(function(e) {
            if (e.status!=1) {
                if(option.fail)option.fail();
                common.ajaxError(e);
                return false;
            }    
            result = e.data;
            if (typeof(func)=="function")func(result);
            if (option.success)option.success(result);
                
        })
        .fail(function(e) {
           if(option.fail)option.fail();
           common.ajaxError(e);
           return false;
        })
        .always(function() {
           layer.closeAll("loading");
           if(option.always)option.always();
           
        })
        return result;
    },
    /**
     * [getChart description]
     * @param  {[type]} option [description]
     * @param  {[type]} func   [description]
     * @return {[type]}        [description]
     */
    getChart:function(option,func){
        if (!option.hasOwnProperty("url")||option.url=="") {
            console.error("Url is required");
            return false;
        }
        var options = {
            metrics:["sessions"],
            range:"today",
            dimensions:['nthDay'],
        }
        if (option&&option.constructor==Object) {
            for(var prop in option){
                    options[prop] = option[prop];
            }
        }        
        var data = {};
        $.extend(data,options);
        var now = new Date();
        switch(options.range){
            case "today":
                data.range = now.Format();
                break;
            case "yesterday":
                data.range = new Date(now.getTime() - (1000*60*60*24)).Format() + "/" + now.Format();
                break;
            case "this_week":
                data.range = new Date(now.getTime() - (now.getDay()-1)*(1000*60*60*24)).Format() + "/" + now.Format();
            default:
                data.range = option.range;
                break;    
        }
        var result;
        $.ajax({
            url: option.url,
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend:function(){
                layer.load(2);
            }
        })
        .done(function(e) {
            if (e.status!=1) {
                common.ajaxError(e);
                return false;
            }    
            result = e.data;
            if (typeof(func)=="function"){
                func(result)
            }
        })
        .fail(function(e) {
           common.ajaxError(e);
           return false;
        })
        .always(function() {
           layer.closeAll("loading")
        })
        return result;       
    },
    /**
     * [getDate description]
     * @param  {number,string} date [description]
     * @param  {string} type [如果date是个数字，type必须传，ago,later]
     * @param  {[type]} func [description]
     * @return {[type]}      [description]
     */
    getDate:function(){
        var date = arguments[0]||"now";
        var now = new Date().getTime();
        var nowdays = new Date();
        var hasFunc = (typeof(arguments[1])=="function");
        if ((typeof(date)=="number")) {
            var type = hasFunc?"default":arguments[1]
                ,func = hasFunc?arguments[1]:arguments[arguments.length-1]
                ,result = (Number(date)*1000*3600*24)
            switch(type){
                case "ago":
                    result = (new Date(now-result)).Format()
                    break
                case "later":
                default :
                    result = (new Date(now+result)).Format()
                    break
            }
            if(typeof(func)=="function")func(result)
            return result
        }
        var date = (date!=""?date:"last-week"),
            result;           
        switch (date){
            case "now":
                result = (new Date()).Format()
                break
            case "today":
                result = [this.getDate(),this.getDate()]
                break;
            case "last-7-days":
                result = [this.getDate(-6),nowdays.Format()]
                break
            case "yesterday":
                result = [this.getDate(-1),this.getDate(-1)]
                break
            case "this-week":
                result=[(new Date(now-((nowdays.getDay()-1)*1000*3600*24))).Format(),nowdays.Format()]
                break;
            case "last-week":
                var prevDay =  new Date(now-(7000*3600*24));
                var startDay = prevDay.getTime()-((prevDay.getDay()-1)*1000*3600*24);
                result = [new Date(startDay).Format(),new Date(startDay+(6*1000*3600*24)).Format()]
                break;
            case "last-month": {
                var year = nowdays.getFullYear();
                var month = nowdays.getMonth();
                if(month==0)
                {
                    month=12;
                    year=year-1;
                }
                if (month < 10) {
                    month = "0" + month;
                }
                var myDate = new Date(year, month, 0);
                result=[(year + "-" + month + "-" + "01"),(year + "-" + month + "-" + myDate.getDate())]               
                break
            }
            case "this-month": {
                var year = nowdays.getFullYear();
                var month = nowdays.getMonth()+1;
                if (month < 10) {
                    month = "0" + month;
                }                
                var firstDay = year + "-" + month + "-" + "01";//这个月的第一天
                var myDate = new Date(year, month, 0);
                var lastDay = year + "-" + month + "-" + nowdays.getDate();//今天                
                $("#filter-date-range-start").val(firstDay);
                $("#filter-date-range-end").val(lastDay);
                result=[firstDay,lastDay]               
                break
            }
            default:
                result=false;
                console.warn("Invalid Date Range Argument Value: "+date)
                break                
        }
        var func = hasFunc?arguments[1]:arguments[arguments.length-1];
        if(typeof(func)=="function")func(result)
        return result;

    }
}

window.onload = function(){
	common.init();
}
$.fn.loading = function(options) {
    var $this = $(this)
    $this.attr("data-loading",$this.html()).attr("disabled","disabled");
    $this.addClass("disabled").html('<i class="loading fa fa-refresh fa-spin"></i>')
}
$.fn.loaded = function(placeholder) {
    var $this = $(this)
    if(placeholder==null||placeholder==undefined||placeholder==""){
        $this.html($this.data("loading")).find(".loading").remove();
    }else{
        $this.html(placeholder);
    }
    $this.removeClass("disabled").removeAttr("data-loading").removeAttr("disabled");

}
