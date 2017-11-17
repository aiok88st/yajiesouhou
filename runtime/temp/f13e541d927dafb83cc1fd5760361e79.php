<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:57:"D:\wamp\wamp64\www\yajie/app/admin\view\train\detail.html";i:1510741353;}*/ ?>
<html>
<head>
    <meta charset="utf-8">
    <title>试卷详情</title>
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css?v=1" media="all" />
    <link rel="stylesheet" type="text/css" href="__ADMIN__/qu/css/wenjuan_ht.css">
    <script src="http://www.jq22.com/jquery/jquery-1.7.1.js"></script>
    <script src="https://cdn.bootcss.com/layer/3.0.3/layer.min.js"></script>
    <link rel="stylesheet" href="__USER__/css/font.css">
    <link rel="stylesheet" href="__USER__/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
    <script type="text/javascript" src="__USER__/js/xadmin.js"></script>
    <style>
        #addquerstions{
            width: 30%;
            height: 36px;
            float: left;
            margin-right: 10px;
            border-color: #D2D2D2!important;
        }
        .btu{
            display: inline-block;
            height: 38px;
            line-height: 37px;
            padding: 0 18px;
            background-color: #0099ff;
            color: #fff;
            white-space: nowrap;
            text-align: center;
            font-size: 14px;
            border: none;
            border-radius: 2px;
            cursor: pointer;
        }
        .btwen_text_tk_cos{
            width: 606px;
            height: 60px;
            padding-left: 8px;
            padding-top: 5px;
        }
    </style>
</head>
<body>
<div class="admin-main layui-anim layui-anim-upbit" ng-app="hd" ng-controller="ctrl">

    <div class="all_660" style="margin-left: 50px">
        <div style="margin-top: 10px;margin-left: 115px;">
            <h1 id="tile" style="font-size: 18px;">试题：<?php echo $test['title']; ?></h1>
        </div>
        <div style="margin-top: 10px;margin-left: 115px;">
            <h3 style="font-size: 12px;">答题人：<?php echo $username; ?></h3>
        </div>
        <div id="content" class="yd_box" style="margin-left: 110px;width: 650px">
            <?php if(is_array($test['content']) || $test['content'] instanceof \think\Collection || $test['content'] instanceof \think\Paginator): $k = 0; $__LIST__ = $test['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
            <div class="movie_box" style="border: 1px solid rgb(255, 255, 255);">
                <ul class="wjdc_list">
                    <input type='hidden' class='scot' value='<?php echo $vo['score']; ?>'>
                    <li>
                        <div class="tm_btitlt">
                            <i class="nmb"><?php echo $k; ?></i>
                            .
                            <i class="btwenzi"><?php echo $vo['title']; ?></i>
                            <?php if($vo['type'] == 1): ?>
                            <span class="tip_wz">【单选】</span><span>（<?php echo $vo['score']; ?>分）</span><?php if($vo['answers'] == true): ?><span><img src="__STATIC__/common/images/dui.png" style="width: 30px;"></span><?php else: ?><span><img src="__STATIC__/common/images/cuo.png" style="width: 30px;"></span><?php endif; elseif($vo['type'] == 2): ?>
                            <span class="tip_wz">【多选】</span><span>（<?php echo $vo['score']; ?>分）</span><?php if($vo['answers'] == true): ?><span><img src="__STATIC__/common/images/dui.png" style="width: 30px;"></span><?php else: ?><span><img src="__STATIC__/common/images/cuo.png" style="width: 30px;"></span><?php endif; elseif($vo['type'] == 3): ?>
                            <span class="tip_wz">【判断】</span><span>（<?php echo $vo['score']; ?>分）</span><?php if($vo['answers'] == true): ?><span><img src="__STATIC__/common/images/dui.png" style="width: 30px;"></span><?php else: ?><span><img src="__STATIC__/common/images/cuo.png" style="width: 30px;"></span><?php endif; else: ?>
                            <span class="tip_wz">【问答】</span><span>（<?php echo $vo['score']; ?>分）</span><?php if($vo['answers'] == true): ?><span><img src="__STATIC__/common/images/dui.png" style="width: 30px;"></span><?php else: ?><span><img src="__STATIC__/common/images/cuo.png" style="width: 30px;"></span><?php endif; endif; ?>

                        </div>
                    </li>
                    <?php if(is_array($vo['input']) || $vo['input'] instanceof \think\Collection || $vo['input'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['input'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                    <li class="input">
                        <label>
                            <?php if($vo['type'] == 1): ?>
                            <input name="a<?php echo $k; ?>0" type="radio" <?php if($vv['answer'] == 1): ?>checked="checked"<?php endif; ?> value="<?php echo $vv['val']; ?>" />
                            <?php elseif($vo['type'] == 2): ?>
                            <input name="a<?php echo $k; ?>0" type="checkbox" <?php if($vv['answer'] == 1): ?>checked="checked"<?php endif; ?> value="<?php echo $vv['val']; ?>" />
                            <?php elseif($vo['type'] == 3): ?>
                            <input name="a<?php echo $k; ?>0" type="radio" <?php if($vv['answer'] == 1): ?>checked="checked"<?php endif; ?> value="<?php echo $vv['val']; ?>" />
                            <?php else: ?>
                            <input name="a<?php echo $k; ?>0" type="radio" value="<?php echo $vv['val']; ?>">
                            <?php endif; ?>
                            <span><?php echo $vv['val']; ?></span>
                        </label>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>

            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="layui-input-block" style="margin-left: 117px;margin-top: 20px">
            <input type="hidden" name="id" id="tid" value="<?php echo $test['id']; ?>">
            <button class="btu" onclick="remoe()">重新考试</button>
            <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary">返回</a>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    function remoe(){
        var id = $("#tid").val();
        $.get("<?php echo url('Train/remoe'); ?>?id="+id,function(re){
            if(re.code == 1){
                layer.msg(re.msg);
            }else{
                layer.msg(re.msg);
            }
        });
    }
</script>

