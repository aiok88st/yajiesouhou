<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:50:"F:\wamp\www\yajie/app/home\view\order\express.html";i:1512108152;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1512116852;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1511235824;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css?v=1" media="all" />
    <link rel="stylesheet" href="__HOME__/css/reset.css" />
    <link rel="stylesheet" href="__HOME__/css/public.css?v=1" />
    <link rel="stylesheet" href="__HOME__/css/webShopList.css" />
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
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
            background-color: #f4f4f4 !important;
        }
    </style>
    
<title>订单详情</title>
<link rel="stylesheet" href="__HOME__/css/indexOrOrder.css" />
<link rel="stylesheet" href="__HOME__/css/order.css" />
<link rel="stylesheet" href="__HOME__/css/rDetails.css" />
<style>
    /*#mohe-kuaidi_new ::-webkit-scrollbar {
        width: 10px;
    }

    #mohe-kuaidi_new ::-webkit-scrollbar-track-piece {
        background-color: #eee;
    }

    #mohe-kuaidi_new ::-webkit-scrollbar-thumb {
        background-color: #ccc;
        border: 1px solid #ccc;
    }*/

    #mohe-kuaidi_new .mh-wrap {
        margin: 6px 0;
    }

    #mohe-kuaidi_new .mh-wrap a {
        text-decoration: none;
    }

    #mohe-kuaidi_new .mh-wrap a:hover {
        text-decoration: underline;
    }

    #mohe-kuaidi_new .mh-form-wrap {
        padding: 5px 15px;
    }

    #mohe-kuaidi_new .mh-form-wrap p {
        margin: 10px 0;
    }

    #mohe-kuaidi_new .mh-form-wrap p label {
        margin-right: 10px;
        vertical-align: middle;
        padding: 6px 0;
    }

    #mohe-kuaidi_new .mh-form-wrap p input, #mohe-kuaidi_new .mh-form-wrap p select {
        width: 186px;
        line-height: normal;
        border: 1px solid #ccc;
        padding: 6px;
        box-sizing: border-box;
        margin: 0;
    }

    #mohe-kuaidi_new .mh-form-wrap p button {
        width: 80px;
        height: 28px;
        border: 1px solid #ccc;
        margin-left: 10px;
        text-align: center;
        color: #333;
        font-family: "Microsoft Yahei";
        font-size: 14px;
        cursor: pointer;
        background: #f7f7f7;
        background: -moz-linear-gradient(top,#f7f7f7,#ececec);
        background: -webkit-gradient(linear,left top,left bottom,color-stop(#f7f7f7),color-stop(#ececec));
        background: -ms-linear-gradient(top,#f7f7f7,#ececec);
        background: linear-gradient(to bottom,#f7f7f7,#ececec);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7f7f7',endColorstr='#ececec',GradientType=0);
    }

    #mohe-kuaidi_new .mh-form-wrap p button:hover {
        background: -moz-linear-gradient(top,#ececec,#f7f7f7);
        background: -webkit-gradient(linear,left top,left bottom,color-stop(#ececec),color-stop(#f7f7f7));
        background: -ms-linear-gradient(top,#ececec,#f7f7f7);
        background: linear-gradient(to bottom,#ececec,#f7f7f7);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ececec',endColorstr='#f7f7f7',GradientType=0);
    }

    #mohe-kuaidi_new .mh-form-wrap p button:active {
        background: -moz-linear-gradient(top,#f3f3f3,#fff);
        background: -webkit-gradient(linear,left top,left bottom,color-stop(#f3f3f3),color-stop(#fff));
        background: -ms-linear-gradient(top,#f3f3f3,#fff);
        background: linear-gradient(to bottom,#f3f3f3,#fff);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3f3f3',endColorstr='#ffffff',GradientType=0);
    }

    #mohe-kuaidi_new .mh-form-wrap form.mh-loading p button {
        position: relative;
        color: transparent;
        pointer-events: none;
    }

    #mohe-kuaidi_new .mh-form-wrap form.mh-loading p button::after {
        background: url(http://p1.qhimg.com/d/inn/1b1cc057/loading_s.gif) no-repeat center;
        content: '';
        display: inline-block;
        width: 4em;
        height: 20px;
        position: absolute;
        left: 50%;
        top: 50%;
        margin-left: -2em;
        margin-top: -10px;
    }

    #mohe-kuaidi_new .mh-form-wrap .mh-error {
        display: none;
        color: #c00;
    }

    #mohe-kuaidi_new .mh-form-wrap .mh-error label {
        visibility: hidden;
    }

    #mohe-kuaidi_new .mh-list-wrap {
        max-height: 0;
        _height: 0;
        --overflow: hidden;
    }

    #mohe-kuaidi_new .mh-list-wrap.mh-unfold {
        max-height: 281px;
        _height: 281px;
    }

    #mohe-kuaidi_new .mh-list-wrap .mh-list {
        margin: 0 15px;
        padding: 15px 0;
    }

    #mohe-kuaidi_new .mh-list-wrap .mh-list ul {
        max-height: 255px;
        _height: 255px;
        padding-left: 75px;
        padding-right: 20px;
        --overflow: auto;
        height: 626px;
    }

    #mohe-kuaidi_new .mh-list-wrap .mh-list li {
        position: relative;
        border-bottom: 1px solid #f5f5f5;
        margin-bottom: 8px;
        padding-bottom: 8px;
        color: #666;
    }

    #mohe-kuaidi_new .mh-list-wrap .mh-list li.first {
        color: #3eaf0e;
    }

    #mohe-kuaidi_new .mh-list-wrap .mh-list li p {
        line-height: 20px;
    }

    #mohe-kuaidi_new .mh-list-wrap .mh-list li .before {
        position: absolute;
        left: -13px;
        top: 2.2em;
        height: 82%;
        width: 0;
        border-left: 2px solid #ddd;
    }

    #mohe-kuaidi_new .mh-list-wrap .mh-list li .after {
        position: absolute;
        left: -16px;
        top: 1.2em;
        width: 8px;
        height: 8px;
        background: #ddd;
        border-radius: 6px;
    }

    #mohe-kuaidi_new .mh-list-wrap .mh-list li.first .after {
        background: #3eaf0e;
    }

    #mohe-kuaidi_new .mh-kd-wrap {
        position: relative;
        border-top: 1px solid #eee;
        padding: 15px;
        padding-bottom: 25px;
        background: #fafafa;
    }

    #mohe-kuaidi_new .mh-kd-wrap li {
        display: none;
    }

    #mohe-kuaidi_new .mh-kd-wrap li.mh-selected {
        display: block;
    }

    #mohe-kuaidi_new .mh-kd-wrap .mh-img-wrap {
        float: left;
        width: 50px;
        height: 50px;
        margin-right: 10px;
        overflow: hidden;
    }

    #mohe-kuaidi_new .mh-kd-wrap .mh-img-wrap img {
        width: 50px;
    }

    #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap {
        font-size: 13px;
        margin-left: 60px;
    }

    #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap p {
        margin-bottom: 8px;
    }

    #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap .mh-info-name {
        font-family: "Microsoft Yahei";
        font-size: 14px;
    }

    #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap .mh-info-link a {
        text-decoration: none;
        margin-right: 10px;
        padding: 2px 10px;
        border: 1px solid #ccc;
        color: #333;
    }

    #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap .mh-info-link a:hover {
        background: white;
    }

    #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap .mh-info-link a:active {
        background: -moz-linear-gradient(top,#f3f3f3,#fff);
        background: -webkit-gradient(linear,left top,left bottom,color-stop(#f3f3f3),color-stop(#fff));
        background: -ms-linear-gradient(top,#f3f3f3,#fff);
        background: linear-gradient(to bottom,#f3f3f3,#fff);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3f3f3',endColorstr='#ffffff',GradientType=0);
    }

    #mohe-kuaidi_new .mh-slogan {
        position: absolute;
        right: 20px;
        bottom: 0;
        cursor: pointer;
    }

    #mohe-kuaidi_new .mh-slogan-hover {
        color: #3eaf0e;
    }

    #mohe-kuaidi_new .mh-slogan span {
        vertical-align: middle;
    }

    #mohe-kuaidi_new .mh-qrcode-wrap {
        position: absolute;
        right: 0;
        bottom: -1px;
        width: 96px;
        margin-right: -110px;
        border: 1px solid #d6d6d6;
        color: #999;
        padding: 6px;
        box-shadow: 0 1px 1px #efefef;
    }

    #mohe-kuaidi_new .mh-icon {
        background: url(http://p9.qhimg.com/d/inn/f2e20611/kuaidi_new.png) no-repeat 0 0;
    }

    #mohe-kuaidi_new .mh-icon-qr {
        background-position: 0 -17px;
        display: inline-block;
        *zoom: 1;
        width: 13px;
        height: 13px;
        vertical-align: middle;
        margin-left: 10px;
    }

    #mohe-kuaidi_new .mh-slogan-hover .mh-icon-qr {
        background-position: 0 0;
    }

    #mohe-kuaidi_new .mh-icon-t {
        position: absolute;
        left: -9px;
        bottom: 14px;
        width: 10px;
        height: 16px;
        background-position: 0 -34px;
        background-color: white;
    }

    #mohe-kuaidi_new .mh-icon-new {
        position: absolute;
        left: -20px;
        top: 1.5em;
        width: 41px;
        height: 18px;
        margin-left: -41px;
        margin-top: -9px;
        background-position: 0 -58px;
    }

    #mohe-kuaidi_new .mh-wrap .mb-search {
        text-decoration: underline;
        margin-left: 20px;
    }

    #mohe-kuaidi_new .mh-wrap .mb-search .mh-new {
        display: inline-block;
        width: 21px;
        height: 9px;
        margin: -1px 0 0 3px;
        background: url(http://p0.qhimg.com/t01a3bd62f6db66463c.png) no-repeat;
    }

    #mohe-kuaidi_new .mh-identcode {
        border-top: 1px solid #f5f5f5;
        padding: 10px 15px;
        display: none;
    }

    #mohe-kuaidi_new .mh-identcode .mh-img-wrap {
        float: left;
        width: 54px;
        height: 54px;
        padding: 6px;
        border: 1px solid #ccc;
        overflow: hidden;
    }

    #mohe-kuaidi_new .mh-identcode .mh-img-wrap img {
        width: 54px;
    }

    #mohe-kuaidi_new .mh-identcode .mh-img-tip {
        margin-left: 78px;
    }

    #mohe-kuaidi_new .mh-identcode .mh-tip-txt {
        font-size: 13px;
        line-height: 38px;
        color: #666;
    }

    #mohe-kuaidi_new .mh-identcode .mh-btn-install {
        text-decoration: none;
        margin-right: 10px;
        padding: 2px 10px;
        border: 1px solid #ccc;
        color: #333;
    }

    #mohe-kuaidi_new .mh-identcode .mh-btn-install:hover {
        text-decoration: none;
    }
    .noresult{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        display: -webkit-flex;
        -webkit-align-items: center;
        -webkit-justify-content: center;
        -webkit-flex-direction: column;
    }
    .back_home{
        position: absolute;
        right: 0%;
        top: 0;
        height: 0.32rem;
        margin-left: 85%;
    }
</style>

</head>
<body id="vueMain">
<div class="delete"></div>

<div id="orderDetails">
    <div class="pHead">
        <a class="backP" href="<?php echo url('order/index'); ?>"><img src="__HOME__/img/back.png"/></a>
        <p>物流详情</p>
        <a class="back_home" href="<?php echo url('User/index'); ?>"><img src="__HOME__/img/home.png"/></a>
    </div>
    <div data-mohe-type="kuaidi_new" class="g-mohe " id="mohe-kuaidi_new">
        <div id="mohe-kuaidi_new_nucom">
            <div class="mohe-wrap mh-wrap">
                <div class="mh-cont mh-list-wrap mh-unfold">
                    <div class="mh-list">
                        <?php if(empty($Traces) || (($Traces instanceof \think\Collection || $Traces instanceof \think\Paginator ) && $Traces->isEmpty())): ?>
                        <div class="noresult">
                            <div>
                                <img src="__HOME__/img/noResult.png" width="100px"/>
                            </div>
                            <div>
                                <p style="line-height: 30px;">暂无轨迹信息</p>
                            </div>
                        </div>
                        <script>
                            setTimeout(function(){
                                $('.noresult').height($(window).height()-$('.pHead').height()-42);
                            },200);
                        </script>

                        <?php else: ?>
                        <ul>
                            <?php if(is_array($Traces) || $Traces instanceof \think\Collection || $Traces instanceof \think\Paginator): $k = 0; $__LIST__ = $Traces;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                            <li <?php if($k == 1): ?>class="first"<?php endif; ?> >
                            <p><?php echo $vo['AcceptTime']; ?></p>
                            <p><?php echo $vo['AcceptStation']; ?></p>
                            <span class="before"></span><span class="after"></span><?php if($k == 1): ?><i class="mh-icon mh-icon-new"></i><?php endif; ?>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
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

<script type="text/javascript" src="__HOME__/js/rDetails.js" ></script>
