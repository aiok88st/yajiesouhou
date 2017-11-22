<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:46:"F:\wamp\www\yajie/app/admin\view\test\add.html";i:1511333600;}*/ ?>
<html>
<head>
    <meta charset="utf-8">
    <title>雅洁后台</title>
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css?v=1" media="all" />
    <link rel="stylesheet" type="text/css" href="__ADMIN__/qu/css/wenjuan_ht.css">
    <script src="http://www.jq22.com/jquery/jquery-1.7.1.js"></script>
    <script src="https://cdn.bootcss.com/layer/3.0.3/layer.min.js"></script>
    <script src="__ADMIN__/qu/js/index.js?v=2"></script>
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
    <fieldset class="layui-elem-field layui-field-title">
        <legend><?php echo $title; ?></legend>
    </fieldset>
    <div class="layui-form-item" style="margin-left: 50px">
        <label class="layui-form-label">标题</label>
        <div class="layui-input-block">
            <input type="text" id="title" name="title" <?php if($info['id'] != ''): ?>value="<?php echo $info['title']; ?>"<?php endif; ?> required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" style="width: 650px;">
        </div>
    </div>
    <div class="layui-form-item" style="margin-left: 50px">
        <label class="layui-form-label">期数</label>
        <div class="layui-input-block">
            <input type="text" id="f_title" name="f_title" <?php if($info['id'] != ''): ?>value="<?php echo $info['f_title']; ?>"<?php endif; ?> required  lay-verify="required" placeholder="请输入期数" autocomplete="off" class="layui-input" style="width: 650px;">
        </div>
    </div>
    <div class="layui-form-item" style="margin-left: 50px">
        <label class="layui-form-label">答案</label>
        <input type="hidden" name="answer" id="logo" value="<?php echo $info['answer']; ?>">
        <div class="layui-input-block">
            <div class="layui-upload">
                <button type="button" class="layui-btn layui-btn-primary" id="logoBtn"><i class="icon icon-upload3"></i>点击上传</button>
                <div class="layui-upload-list">
                    <img class="layui-upload-img" id="cltLogo">
                    <p id="demoText"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="all_660" style="margin-left: 50px">
        <div id="content" class="yd_box" style="margin-left: 110px;margin-top: 20px;width: 650px"></div>
        <div class="but" style="padding-top: 20px">
            <label class="layui-form-label">请选择题型</label>
            <select id="addquerstions" class="addquerstions" name="type">
                <option value="-1">请选择</option>
                <option value="0">单选</option>
                <option value="1">多选</option>
                <option value="2">判断</option>
                <!--<option value="3">填空</option>-->
            </select>
            <button class="btu" id="addClick" >添加题目</button>
        </div>

        <!--选项卡区域  模板区域---------------------------------------------------------------------------------------------------------------------------------------->
        <div class="xxk_box">
            <div class="xxk_conn hide">
                <!--单选----------------------------------------------------------------------------------------------------------------------------------------->
                <div class="xxk_xzqh_box dxuan ">
                    <textarea name="subject" cols="" rows="" class="input_wenbk btwen_text btwen_text_dx" placeholder="单选题目"></textarea>
                    <div class="title_itram">
                        <div class="kzjxx_iteam">
                            <input name="answer" type="radio" value="1" class="dxk">
                            <input name="optiond" type="text" class="input_wenbk" value="" placeholder="选项">
                            <label>
                                <!--<input name="" type="checkbox" value="" class="fxk"> <span>可填空</span>-->
                            </label> <a href="javascript:void(0);" class="del_xm">删除</a>
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="zjxx">增加选项</a>
                    <div style="margin-top: 10px">
                        <div style="float: left;width: 48%;">
                            <label>此题分数：</label>
                            <input name="score" type="number" class="input_wenbk score" value="" placeholder="分数" style="width: 50%;">
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!--完成编辑-->
                    <div class="bjqxwc_box">
                        <a href="javascript:void(0);" class="qxbj_but">取消编辑</a>
                        <a href="javascript:void(0);" class="swcbj_but"> 完成编辑</a>
                    </div>
                </div>
                <!--多选----------------------------------------------------------------------------------------------------------------------------------------->
                <div class="xxk_xzqh_box duoxuan hide">
                    <textarea name="subject" cols="" rows="" class="input_wenbk btwen_text btwen_text_duox" placeholder="多选题目"></textarea>
                    <div class="title_itram">
                        <div class="kzjxx_iteam">
                            <input name="answer" type="checkbox" value="1" class="dxk">
                            <input name="optiond" type="text" class="input_wenbk" value="" placeholder="选项">
                            <label>
                                <!--<input name="" type="checkbox" value="" class="fxk"> <span>可填空</span></label>-->
                                <a href="javascript:void(0);" class="del_xm">删除</a>
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="zjxx">增加选项</a>
                    <div style="margin-top: 10px">
                        <div style="float: left;width: 48%;">
                            <label>此题分数：</label>
                            <input name="score" type="number" class="input_wenbk score" value="" placeholder="分数" style="width: 50%;">
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!--完成编辑-->
                    <div class="bjqxwc_box">
                        <a href="javascript:void(0);" class="qxbj_but">取消编辑</a>
                        <a href="javascript:void(0);" class="swcbj_but"> 完成编辑</a>
                    </div>
                </div>
                <!--判断----------------------------------------------------------------------------------------------------------------------------------------->
                <div class="xxk_xzqh_box dxuan ">
                    <textarea name="subject" cols="" rows="" class="input_wenbk btwen_text btwen_text_dx" placeholder="判断题目"></textarea>
                    <div class="title_itram">
                        <div class="kzjxx_iteam">
                            <input name="answer" type="radio" value="1" class="dxk">
                            <input name="optiond" type="text" class="input_wenbk" value="" placeholder="选项">
                            <label>
                                <!--<input name="" type="checkbox" value="" class="fxk"> <span>可填空</span>-->
                            </label> <a href="javascript:void(0);" class="del_xm">删除</a>
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="zjxx">增加选项</a>
                    <div style="margin-top: 10px">
                        <div style="float: left;width: 48%;">
                            <label>此题分数：</label>
                            <input name="score" type="number" class="input_wenbk score" value="" placeholder="分数" style="width: 50%;">
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <!--完成编辑-->
                    <div class="bjqxwc_box">
                        <a href="javascript:void(0);" class="qxbj_but">取消编辑</a>
                        <a href="javascript:void(0);" class="swcbj_but"> 完成编辑</a>
                    </div>
                </div>
                <!-- 填空----------------------------------------------------------------------------------------------------------------------------------------->
                <div class="xxk_xzqh_box tktm hide">
                    <textarea name="subject" cols="" rows="" class="input_wenbk btwen_text btwen_text_tk" placeholder="答题区"></textarea>
                    <div>
                        <div style="margin-top: 10px">
                            <label>此题分数：</label>
                            <input name="score" type="number" class="input_wenbk score" value="" placeholder="分数" style="width: 20%;">
                        </div>
                    </div>
                    <!--完成编辑-->
                    <div class="bjqxwc_box">
                        <a href="javascript:void(0);" class="qxbj_but">取消编辑</a>
                        <a href="javascript:void(0);" class="swcbj_but"> 完成编辑</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both;margin-top: 100px;"></div>

    <div class="layui-input-block" style="margin-left: 160px;margin-top: 20px">
        <button class="btu" onclick="smit()">提交</button>
        <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary"><?php echo lang('back'); ?></a>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/common/js/common.js"></script>
<script type="text/javascript">
    <?php if(ACTION_NAME=='add'): ?>
    var urls= "<?php echo url('add'); ?>";
    <?php else: ?>
    var urls= "<?php echo url('edit'); ?>";
    <?php endif; ?>

    layui.use(['form', 'layer','upload'], function () {
        var form = layui.form,layer = layui.layer,upload = layui.upload,$ = layui.jquery;
        //普通图片上传
        var uploadInst = upload.render({
            elem: '#logoBtn'
            ,url: '<?php echo url("UpFiles/upload"); ?>'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#cltLogo').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //上传成功
                if(res.code>0){
                    $('#logo').val(res.url);
                }else{
                    //如果上传失败
                    return layer.msg('上传失败');
                }
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });
    });

    function smit(){
        layui.use('layer', function(){
            var layer = layui.layer;
            layer.load(1);
        });
        var titles = $('#title').val();
        var f_title = $('#f_title').val();
        var content = getTest();
        $.ajax({
            url:"<?php echo url('add'); ?>",
            type:'post',
            data:{"title":titles,"content":content,"f_title":f_title},
            success:function(res){
                layer.closeAll();
                if (res.code > 0) {
                    layer.msg(res.msg, {time: 1800, icon: 1}, function () {
                        location.href = res.url;
                    });
                } else {
                    layer.msg(res.msg, {time: 1800, icon: 2});
                }
            }
        });
    }
</script>
