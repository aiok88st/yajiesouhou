<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:50:"F:\wamp\www\yajie/app/home\view\video\details.html";i:1510914323;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1510391119;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
    
<title>视频</title>
<link rel="stylesheet" href="__HOME__/css/details.css" />
<script src="https://cdn.bootcss.com/clipboard.js/1.7.1/clipboard.min.js"></script>

</head>
<body id="vueMain">
<div class="delete"></div>


<!--导航栏-->
<div id = "home">
    <div class="pHead">
        <a href="teachSearch.html" class="back backP"><img src="__HOME__/img/back.png"/></a>
        <p>视频详情</p>
    </div>
    <div class="main">
        <div class="videoBox">
            <ul>
                <li>
                    <iframe frameborder="0" src="<?php echo $data['link']; ?>" allowfullscreen></iframe>
                </li>
                <li>
                    <p><?php echo $data['title']; ?></p>
                </li>
                <li>
                    <p><?php echo date("Y-m-d",$data['createtime']); ?></p>
                    <p><?php echo $data['hits']; ?></p>
                </li>
            </ul>
        </div>
        <div class="content">
            <?php echo $data['content']; ?>
        </div>
    </div>
    <div style="height: 0.8rem;"></div>

</div>




<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript" src="__HOME__/js/public.js" ></script>
<script type="text/javascript" src="__HOME__/js/details.js?v=1" ></script>
