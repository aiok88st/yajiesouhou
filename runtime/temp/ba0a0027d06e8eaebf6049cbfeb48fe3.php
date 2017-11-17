<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:46:"F:\wamp\www\yajie/app/home\view\exam\exam.html";i:1510830081;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1510391119;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
    
<title>我的测试</title>
<link rel="stylesheet" href="__HOME__/css/exam.css" />

</head>
<body id="vueMain">
<div class="delete"></div>

		<div id="exam">
			<div class="pHead">
				<a href="person.html" class="back backP"><img src="__HOME__/img/back.png"/></a>
				<p>开始测试</p>
			</div>
			<div class="problemBox">
				<div class="pTitle">
					<ul>
						<li>
							<p><?php echo $test['title']; ?></p>
						</li>
						<li>
							<p><?php echo $test['f_title']; ?></p>
						</li>
					</ul>					
				</div>
				<div class="problems">
					<div class="problem dan">
						<p>1.你是否使用过雅洁智能门锁？</p>
						<div class="choice"> 
							<ul>
								<li>
									<label class="radio"><input type="radio" name="radio" value="1" checked>是<i></i></label>  
								</li>
								<li>
									<label class="radio"><input type="radio" value="2" name="radio">否<i></i></label>  
								</li>
							</ul>	
						</div>  							
					</div>
					<div class="problem dan">
						<p>2.你是否使用过雅洁智能门锁？</p>
						<div class="choice"> 
							<ul>
								<li>
									<label class="checkBox"><input type="checkBox" name="check" value="1" checked>是<i></i></label>  
								</li>
								<li>
									<label class="checkBox"><input type="checkbox" value="2" name="check">否<i></i></label>  
								</li>
							</ul>	
						</div>  							
					</div>
				</div>		
			</div>
			<div class="st">
				<button>提交</button>
			</div>
		</div>



<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>


