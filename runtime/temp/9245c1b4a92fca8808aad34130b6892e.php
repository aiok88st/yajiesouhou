<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:49:"F:\wamp\www\yajie/app/client\view\common\404.html";i:1511519405;s:52:"F:\wamp\www\yajie/app/client\view\common\header.html";i:1511251355;s:52:"F:\wamp\www\yajie/app/client\view\common\footer.html";i:1511235824;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css?v=1" media="all" />
    <link rel="stylesheet" href="__HOME__/css/ydui.css?rev=@@hash"/>
    <link rel="stylesheet" href="__HOME__/css/demo.css"/>
    <link rel="stylesheet" href="__HOME__/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="__HOME__/css/public.css"/>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="__HOME__/js/ydui.flexible.js"></script>
    <script type="text/javascript" src="__HOME__/js/rem.js" ></script>
    <script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
    <script type="text/javascript" src="__HOME__/js/public.js?v=1" ></script>

    <script type="text/javascript">
        AjaxL=function(url,type,data,call){
            $.ajax({
                type:type,
                url:url,
                data:data,
                dataType:'JSON',
                success:function(res){
                    call(res);

                    if(res.url){
                        window.location.href=res.url;
                    }
                },
                error:function(XMLHttpRequest){
                    console.log(1111);
                }
            })
        }
    </script>
    <style>
        .layui-flow-more{
            padding-bottom: 10px;
        }
        .layui-flow-more a cite{
            color: #999999;
        }
    </style>
    
<title>跳转提示</title>
<link rel="stylesheet" href="http://www.jq22.com/demo/jquery-tsk20150817/msgbox.css" />
<link rel="stylesheet" href="http://www.jq22.com/demo/jquery-SweetAlert20151027/sweetalert.css" />

</head>
<body id="vueMain">
<div class="delete"></div>

<div id="person">
    <div>
        <div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -176px;">
            <div class="sa-icon sa-warning pulseWarning" style="display: block;">
                <span class="sa-body pulseWarningIns"></span>
                <span class="sa-dot pulseWarningIns"></span>
            </div>
            <div class="sa-icon sa-info" style="display: none;">
                <span class="sa-body"></span>
                <span class="sa-dot"></span>
            </div>
            <div class="sa-icon sa-info" style="display: none;"></div>
            <div class="sa-icon sa-custom" style="display: none; width: 80px; height: 80px; background-image: url(http://www.jq22.com/demo/jquery-SweetAlert20151027/images/thumbs-up.jpg);"></div>
            <p style="font-size: 20px;color: #000;margin-bottom: 5px"><?php echo $data['msg']; ?></p>
            <p style="display: block;font-size: 14px">正在跳转，等待时间： <b id="wait">3</b>s</p>
            <fieldset>
                <input type="text" tabindex="3" placeholder="">
                <div class="sa-input-error"></div>
            </fieldset>

            <div class="sa-button-container">
                <button class="cancel" tabindex="2" style="display: none; box-shadow: none;">取消</button>
                <input type="hidden" id="href" value="<?php echo $data['url']; ?>">
                <a href="javascript:;"> <button onclick="goPage()" class="confirm" tabindex="1" style="display: inline-block; box-shadow: rgba(174, 222, 244, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.0470588) 0px 0px 0px 1px inset; background-color: #481c76;">立即跳转</button></a>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>


<script type="text/javascript">

    (function(){
        var wait = document.getElementById('wait'),
        href = document.getElementById('href').value;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                window.location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
    function goPage(){
        var url = $("#href").val();
        window.location.href = url;
    }
</script>
