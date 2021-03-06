<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"F:\wamp\www\yajie/app/client\view\product\repair.html";i:1512116781;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>我的产品</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css?v=1" media="all" />
    <link rel="stylesheet" href="__HOME__/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="__HOME__/css/public.css"/>
    <link rel="stylesheet" href="__HOME__/css/demo.css" />
    <link rel="stylesheet" href="__HOME__/css/ydui.css" />
    <link rel="stylesheet" href="__HOME__/css/rProduce.css" />
    <script type="text/javascript" src="__HOME__/js/photoClip/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="__HOME__/js/rem.js" ></script>
    <script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
    <style>
        .layui-flow-more{
            padding-bottom: 10px;
        }
        .layui-flow-more a cite{
            color: #999999;
            background-color: #f4f4f4 !important;
        }
        .back_home{
            position: absolute;
            right: 0%;
            top: 0;
            height: 0.32rem;
            margin-left: 85%;
        }
    </style>
    <script type="text/javascript">
        var data = <?php echo $list; ?>;
    </script>
</head>
<body>
<div class="detl"></div>
<div id="quickRepair" style="position: relative;left: 0;overflow-x: hidden;">
    <div class="pHead">
        <a class="backPerson"><img src="__HOME__/img/back.png"/></a>
        <p>一键维修</p>
        <a class="back_home" href="<?php echo url('client/index'); ?>"><img src="__HOME__/img/home.png"/></a>
    </div>
    <div class="repairBox">
        <div class="repairIn">
            <ul>
                <li>
                    <div class="type">
                        <p>维修类型</p>
                        <span></span>
                        <select name="type" id="selt">
                            <option value="">请选择</option>
                            <option value="1">快递至维修点</option>
                            <option value="2">上门服务</option>
                        </select>
                        <img src="__HOME__/img/moreOrder.png" />
                    </div>
                </li>
                <li>
                    <p>故障描述</p>
                    <textarea placeholder="描述产品故障" id="msg"></textarea>
                </li>
            </ul>
            <div class="imgOut">
                <div class="imgUp">
                    <div class="upBtn floatl upBtn0">
                        <img src="__HOME__/img/add.png"/>
                        <input type="file" id="file"/>
                    </div>
                    <div class="clearl"></div>
                </div>
            </div>
            <ul>
                <li>
                    <p>联系人</p>
                    <input placeholder="请输入您的姓名" id="cust_name" value="<?php echo $data['cust_name']; ?>" />
                </li>
                <li>
                    <p>联系电话</p>
                    <input placeholder="请输入您的联系电话" id="cust_tel" maxlength="11" value="<?php echo $data['cust_tel']; ?>"/>
                </li>
                <li>
                    <p>选择地区</p>
                    <input placeholder="地区信息" id="city" value="<?php echo $data['province']['name']; ?> <?php echo $data['city']['name']; ?> <?php echo $data['zone']['name']; ?>"/>
                    <img src="__HOME__/img/eAddress.png" />
                </li>
                <li>
                    <p>详细地址</p>
                    <textarea placeholder="街道门牌信息" id="addra" ><?php echo $data['cust_addr']; ?></textarea>
                </li>
            </ul>
        </div>
    </div>
    <div class="st" style="margin-bottom: 10px;">
        <input type="hidden" id="token" value="<?php echo $token; ?>">
        <input type="hidden" id="pro_id" value="<?php echo $data['id']; ?>">
        <button onclick="addOrder()">提交</button>
    </div>
</div>
<div id="clipArea" style="display: none;">
    <button id="clipBtn">截取</button>
</div>
<div id="showAll" style="display: none;">
    <img src="" />
</div>
<script type="text/javascript" src="__HOME__/js/photoClip/iscroll-zoom.js"></script>
<script type="text/javascript" src="__HOME__/js/photoClip/hammer.js"></script>
<script type="text/javascript" src="__HOME__/js/photoClip/jquery.photoClip.min.js"></script>
<script type="text/javascript" src="__HOME__/js/ydui.flexible.js" ></script>
<script type="text/javascript" src="__HOME__/js/ydui.js" ></script>
<script>
    $('.backPerson').bind('click',function(){
        window.history.go(-1);
    });
    //选择类型
    $('.type select').change(function(){
        $(this).prev('span').html($(this).children('option:selected').text());
    });

    ! function() {
        var citys = [];
        for(var i=0;i<data.length;i++){
            var k = data[i].name;
            var id = data[i].id;
            var c = [];
            for(var j=0;j<data[i].city.length;j++)
            {
                var cv = data[i].city[j].name;
                var a = [];
                var cid = data[i].city[j].id;
                var aid = [];
                for(var l=0;l<data[i].city[j].area.length;l++) {
                    var av = data[i].city[j].area[l].name;
                    var aaid = data[i].city[j].area[l].id;
                    a.push(av);
                    aid.push(aaid);
                }
                var cj = {
                    "a":a,
                    "id":cid,
                    "n":cv,
                    "aid":aid
                }
                c.push(cj);
            }
            var j = {
                "n":k,
                "id":id,
                "c":c
            }
            citys.push(j);
        }

        if(typeof define === "function") {
            define(citys)
        } else {
            window.YDUI_CITYS = citys
        }
    }();

    !function () {
        var $target = $('#city');
        $target.citySelect();
        $target.on('click', function (event) {
            event.stopPropagation();
            $target.citySelect('open');
        });
        $target.on('done.ydui.cityselect', function (ret) {
            $(this).val(ret.provance+' ' + ret.city + ' ' + ret.area+' ');
        });
    }();


    var imgN = 0;
    //document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
    $("#clipArea").photoClip({
        width: 200,
        height: 200,
        file: "#file",
        view: ".view",
        ok: "#clipBtn",
        loadStart: function() {
            $('#clipArea').show();
            //开启加载页面
        },
        loadComplete: function() {
            console.log("照片读取完成");
            //关闭加载页面
        },
        clipFinish: function(dataURL) {
            imgN++;
            $('#clipArea').hide();
            if(imgN==4)
            {
                $('.upBtn0').hide();
            }
            $('.upBtn0').before('<div class="upBtn allimg floatl"><img src="'+dataURL+'" /><a href="###"><img src="__HOME__/img/pClose.png"/></a><input type="hidden" name="images" value="'+dataURL+'"></div>');
            $('.upBtn').find('a').bind('click',function(){
                $(this).parent('.upBtn').remove();
                imgN--;
                if(imgN<4){
                    $('.upBtn0').show();
                }
            });
            $('.allimg').on('click',function(){
                $('#showAll').stop().fadeIn(500);
                $('#showAll').find('img').attr('src',$(this).children('img').attr('src'));
            });
        }
    });
    layui.use('layer', function(){
        var layer = layui.layer;
    });
    function addOrder(){
        var type = $('#selt').val();
        var msg = $('#msg').val();
        var name = $('#cust_name').val();
        var phone = $('#cust_tel').val();
        var J_Address = $('#city').val();
        var addra = $('#addra').val();
        var token = $('#token').val();
        var pro_id = $('#pro_id').val();
        var img = [];
        $('[name="images"]').each(function(){
            if($(this).val() != ''){
                var imge = $(this).val();
                img.push(imge.substr(22));
            }
        });
        $.ajax({
            url:"<?php echo url('order/add'); ?>",
            type:'post',
            data:{"type":type,"msg":msg,"name":name,"phone":phone,"J_Address":J_Address,"addra":addra,"__token__":token,"pro_id":pro_id,"images":img},
            success:function(re){
                if(re.code == 1){
                    layer.msg(re.msg,{time:3000});
                    window.location.href=re.url;
                }else{
                    layer.msg(re.msg,{time:3000});
                }
            }
        });
    }

</script>
</body>
</html>

