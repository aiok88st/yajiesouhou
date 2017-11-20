<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"/Users/Web/archie/yajiesouhou/app/client/view/product/repair.html";i:1511160022;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>报修页欢迎您</title>

    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div>

</div>
<div>
    <div class="form">
        <form action="<?php echo url('order/add'); ?>">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <input type="hidden" name="pro_id" value="<?php echo $data['id']; ?>">
            <select name="type" id="">
                <option value="1">快递至维修点</option>
                <option value="2">上门服务</option>
            </select>
            <br />
            <input type="text" name="name" value="<?php echo $data['cust_name']; ?>"> <br />
            <input type="text" name="phone" value="<?php echo $data['cust_tel']; ?>"> <br />
            <input type="text" name="province" value="<?php echo $data['province']; ?>"> <br />
            <input type="text" name="city" value="<?php echo $data['city']; ?>"> <br />
            <input type="text" name="zone" value="<?php echo $data['zone']; ?>"> <br />
            <input type="text" name="addra" value="<?php echo $data['cust_addr']; ?>"> <br />
            <input type="text" name="msg" value=""> <br />
            <input type="submit" value="提交">
        </form>

    </div>
</div>

</body>
</html>