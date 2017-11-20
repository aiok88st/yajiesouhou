<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:51:"F:\wamp\www\yajie/app/home\view\article\detail.html";i:1510226834;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1510391119;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
    
<title>详细信息</title>
<link rel="stylesheet" href="__HOME__/css/head.css" />
<link rel="stylesheet" href="__HOME__/css/problemDetails.css" />

</head>
<body id="vueMain">
<div class="delete"></div>


<!--导航栏-->
<div id = "home">
    <div id="head">
        <div class="hleft floatl">
            <a class="back" href="###"></a>
        </div>
        <div class="hmiddle floatl">
            <p><?php echo $cate['catname']; ?></p>
        </div>
        <div class="hright floatl">
            <a href="index.html"><img src="__HOME__/img/home.png"/></a>
            <div class="clearr"></div>
        </div>
        <div class="clearl"></div>
    </div>
    <div class="null"></div>
    <div class="detailsBox">
        <div class="detailsIn">
            <ul>
                <li>
                    <p><?php echo $data['title']; ?></p>
                </li>
                <li>
                    <p><?php echo date("Y-m-d",$data['createtime']); ?></p>
                </li>
                <li>
                    <div class="content">
                        <p><?php echo $data['content']; ?></p>
                    </div>
                </li>
                <li>
                    <div class="goodAndBad">
                        <span></span>
                        <div class="gbLeft floatl">
                            <button hasClick='true'>已解决<span class="clicknum_<?php echo $data['id']; ?>"><?php echo $data['clicknum']; ?></span><p>+1</p></button>
                        </div>
                        <div class="gbRight floatr">
                            <button hasClick='true'>未解决<span></span></button>
                        </div>
                        <div class="clearBoth"></div>
                    </div>
                    <input type="hidden" name="id" id="aid" value="<?php echo $data['id']; ?>">
                </li>
                <li>
                    <a href="<?php echo url('article/feedBack'); ?>">意见反馈</a>
                </li>
            </ul>
        </div>
    </div>
    <!--<div class="bottomText">-->
        <!--<p>ARCHIE 雅洁五金</p>-->
        <!--<p>www.archie.com</p>-->
    <!--</div>-->
</div>



<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript" src="__HOME__/js/public.js" ></script>
<script type="text/javascript" src="__HOME__/js/problemDetails.js" ></script>
