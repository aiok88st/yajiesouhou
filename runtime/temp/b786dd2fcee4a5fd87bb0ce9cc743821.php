<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:47:"F:\wamp\www\yajie/app/user\view\index\main.html";i:1511511776;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="__USER__/css/bootstrap.min.css">
    <link href="__USER__/css/metisMenu.min.css" rel="stylesheet">
    <link rel="stylesheet" href="__USER__/css/sb-admin-2.css">
    <link rel="stylesheet" href="__USER__/css/font.css">
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css?v=1" media="all" />
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <title>会员中心</title>
</head>

<body>

    <div id="wrapper">
     <block name="erwai"></block>  
        <div id="page-wrapper" style="margin-left: 0;">
            <!-- 内容区 -->
            <block name="con">
                
                    <div class="row">
                        <div class="col-lg-12" style="margin-top: 20px">
                            <blockquote class="layui-elem-quote">欢迎登录雅洁售后系统！</blockquote>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    

                    <div class="row" style="margin-top: 20px">
                    
                    <!-- 个人中心 -->
                        <div class="col-lg-3 col-md-6" style="width:13%;">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="layui-icon" style="font-size: 5rem">&#xe612;</i>
                                        </div>
                                    
                                    </div>
                                </div>
                                <a href="<?php echo url('user/Person/index'); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">个人中心</span>
                                        <span class="pull-right"><i class="layui-icon" style="font-size: 1rem">&#xe65b;</i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <!-- 维修订单 -->
                        <div class="col-lg-3 col-md-6" style="width:13%;">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="layui-icon" style="font-size: 5rem">&#xe698;</i>
                                        </div>
                                        
                                    </div>
                                </div>
                                <a href="<?php echo url('Repair/audit'); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">待审核订单</span>
                                        <span class="pull-right"><i class="layui-icon" style="font-size: 1rem">&#xe65b;</i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- 维修订单 -->
                        <div class="col-lg-3 col-md-6" style="width:13%;">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="layui-icon" style="font-size: 5rem">&#xe698;</i>
                                        </div>

                                    </div>
                                </div>
                                <a href="<?php echo url('Repair/index'); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">维修订单</span>
                                        <span class="pull-right"><i class="layui-icon" style="font-size: 1rem">&#xe65b;</i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <!-- 视频资料 -->
                         <div class="col-lg-3 col-md-6" style="width:13%;">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="layui-icon" style="font-size: 5rem">&#xe6ed;</i>
                                        </div>
                                        
                                    </div>
                                </div>
                                <a href="<?php echo url('Train/tvdList'); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">视频资料</span>
                                        <span class="pull-right"><i class="layui-icon" style="font-size: 1rem">&#xe65b;</i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <!-- 我的收藏 -->
                      <div class="col-lg-3 col-md-6" style="width:13%;">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="layui-icon" style="font-size: 5rem">&#xe622;</i>
                                        </div>
                                        
                                    </div>
                                </div>
                                <a href="<?php echo url('Collect/index'); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">我的收藏</span>
                                        <span class="pull-right"><i class="layui-icon" style="font-size: 1rem">&#xe65b;</i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <!-- 我的试卷 -->
                      <div class="col-lg-3 col-md-6" style="width:13%;">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="layui-icon" style="font-size: 5rem">&#xe60a;</i>
                                        </div>
                                        
                                    </div>
                                </div>
                                <a href="<?php echo url('Exam/index'); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">我的试卷</span>
                                        <span class="pull-right"><i class="layui-icon" style="font-size: 1rem">&#xe65b;</i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    
                    </div>

            </block>
            <div class="admin-main layui-anim layui-anim-upbit">
                <div class="table-responsive">
                    <table class="layui-table" lay-even lay-skin="line">
                        <colgroup>
                            <col width="40%">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th class="text-center" colspan="2">系统信息</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>网站域名</td>
                            <td><?php echo $config['url']; ?></td>
                        </tr>
                        <tr>
                            <td>网站目录</td>
                            <td><?php echo $config['document_root']; ?></td>
                        </tr>
                        <tr>
                            <td>服务器操作系统</td>
                            <td><?php echo $config['server_os']; ?></td>
                        </tr>
                        <tr>
                            <td>服务器端口</td>
                            <td><?php echo $config['server_port']; ?></td>
                        </tr>
                        <tr>
                            <td>服务器IP</td>
                            <td><?php echo $config['server_ip']; ?></td>
                        </tr>
                        <tr>
                            <td>WEB运行环境</td>
                            <td><?php echo $config['server_soft']; ?></td>
                        </tr>
                        <tr>
                            <td>MySQL数据库版本</td>
                            <td><?php echo $config['mysql_version']; ?></td>
                        </tr>
                        <tr>
                            <td>运行PHP版本</td>
                            <td><?php echo $config['php_version']; ?></td>
                        </tr>

                        <tr>
                            <td>最大上传限制</td>
                            <td><?php echo $config['max_upload_size']; ?></td>
                        </tr>
                        <tr>
                            <td>CLTPHP版本</td>
                            <td><?php echo config('version'); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
    <script src="__USER__/js/bootstrap.min.js"></script>
    <script src="__USER__/js/metisMenu.min.js"></script>
    <script src="__USER__/js/sb-admin-2.js"></script>
</body>
</html>
