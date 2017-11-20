<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"/Users/Web/archie/yajiesouhou/app/client/view/product/index.html";i:1511159952;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>产品页欢迎您</title>

    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div>
    <ul>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>

            <li>
                <div><?php echo $v['model']['model']; ?></div>
                <div>
                    <img src="<?php echo $v['model']['img']; ?>" width="70" alt="">
                </div>
                <?php if($v['status'] == 0): ?>
                    <a href="<?php echo url('product/repair',['id'=>$v['id']]); ?>">申请维修</a>
                <?php elseif($v['status'] == 1): ?>
                    <a href="">已申请维修</a>
                <?php else: ?>
                    <span>不在维修范围内</span>
                <?php endif; ?>
            </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>

    </ul>
</div>
<div>
    <div>
        <input type="hidden" name="token" value="{$token}">
        <input type="text" name="code" id="code">
        <button onclick="add()">提交</button>
    </div>
</div>
<script type="text/javascript">

    function add(){
        var url="<?php echo url('Product/add'); ?>";
        var token=$('[name="token"]').val();
        var code=$('#code').val();
        $.ajax({
            type:'POST',
            url:url,
            data:{
                "__token__":token,
                "code":code
            },
            dataType:'JSON',
            success:function(res){
                $('[name="token"]').attr('value',res.token);
                alert(res.msg);
                if(res.code==1){
                    window.location.reload();
                }
            },
            error:function(xml,XMLHttpRequest, textStatus, errorThrown){
                alert('网络链接错误');
                if(xml.status==501){
                    get_token();
                }

            }
        })
    }
    function get_token(){
        var url="<?php echo url('fater/get_token'); ?>";
        $.ajax({
            type:'GET',
            url:url,
            dataType:'JSON',
            success:function(res){
                $('[name="token"]').attr('value',res.token);
            },
            error:function(xml,XMLHttpRequest, textStatus, errorThrown){
                alert('网络链接错误');

            }
        })
    }
</script>
</body>
</html>