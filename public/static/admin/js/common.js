/** common.js By Beginner Emain:zheng_jinfan@126.com HomePage:http://www.zhengjinfan.cn */
layui.define(['layer'], function(exports) {
	"use strict";

	var $ = layui.jquery, layer = layui.layer;
	var common = {
		/**
		 * 抛出一个异常错误信息
		 * @param {String} msg
		 */
		throwError: function(msg) {
			throw new Error(msg);
			return;
		},
		/**
		 * 弹出一个错误提示
		 * @param {String} msg
		 */
		msgError: function(msg) {
			layer.msg(msg, {
				icon: 5
			});
			return;
		}
	};
	exports('common', common);
});
/*通用ajax*/
function AjaxP(url,method,data,callback){
    var load = layer.load(2, {time: 10*1000});
    $.ajax({
        url: url,
        cache: false,
        dataType: 'JSON',
        type: method,
        data: data,
        success: function(data) {
            layer.close(load);
            if (data == null || data == undefined || data == '') {
                layer.msg('数据返回错误', {icon: 5 ,time:1000});
                return false;
            }

            if (data.code == 1) {
                if (typeof(callback) == 'function') {
                    callback(data);
                }else {
                    layer.alert(data.msg, {icon: 6});
                }
                return true;
            }else {
                layer.msg(data.msg, {icon: 5,time:1000});
                return false;
            }
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            switch(XMLHttpRequest.status) {
                case 404 : layer.msg("404错误", {icon: 5}); break;
                case 500 : layer.msg("505错误", {icon: 5}); break;
            }
            return false;
        }
    });
}

function x_admin_show(title,url,w,h){
    if (title == null || title == '') {
        title=false;
    };
    if (url == null || url == '') {
        url="404.html";
    };
    if (w == null || w == '') {
        w=($(window).width()*0.9);
    };
    if (h == null || h == '') {
        h=($(window).height() - 50);
    };
    layer.open({
        type: 2,
        area: [w+'px', h +'px'],
        fix: false, //不固定
        maxmin: true,
        shadeClose: true,
        shade:0.4,
        title: title,
        content: url
    });
}

