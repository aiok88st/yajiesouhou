<?php
return array (
  'catid' => 
  array (
    'id' => 205,
    'moduleid' => 19,
    'field' => 'catid',
    'name' => '分类',
    'tips' => '',
    'required' => 1,
    'minlength' => 1,
    'maxlength' => 6,
    'pattern' => 'defaul',
    'errormsg' => '必须选择一个栏目',
    'class' => 'catid',
    'type' => 'catid',
    'setup' => '',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 1,
    'status' => 1,
    'issystem' => 1,
  ),
  'title' => 
  array (
    'id' => 206,
    'moduleid' => 19,
    'field' => 'title',
    'name' => '标题',
    'tips' => '',
    'required' => 1,
    'minlength' => 1,
    'maxlength' => 80,
    'pattern' => '',
    'errormsg' => '标题必须为1-80个字符',
    'class' => '',
    'type' => 'title',
    'setup' => 'array (
  \'thumb\' => \'1\',
  \'style\' => \'1\',
  \'size\' => \'55\',
)',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 2,
    'status' => 1,
    'issystem' => 1,
  ),
  'f_title' => 
  array (
    'id' => 219,
    'moduleid' => 19,
    'field' => 'f_title',
    'name' => '副标题',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'f_title',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 3,
    'status' => 1,
    'issystem' => 0,
  ),
  'keywords' => 
  array (
    'id' => 207,
    'moduleid' => 19,
    'field' => 'keywords',
    'name' => '关键词',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 80,
    'pattern' => '',
    'errormsg' => '',
    'class' => '',
    'type' => 'text',
    'setup' => 'array (
  \'size\' => \'55\',
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 3,
    'status' => 0,
    'issystem' => 1,
  ),
  'tag' => 
  array (
    'id' => 218,
    'moduleid' => 19,
    'field' => 'tag',
    'name' => '视频标签',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'tag',
    'type' => 'select',
    'setup' => 'array (
  \'options\' => \'发布视频|1
在线视频|2
视频仓库|3
热门视频|4\',
  \'multiple\' => \'0\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'size\' => \'\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 4,
    'status' => 1,
    'issystem' => 0,
  ),
  'description' => 
  array (
    'id' => 208,
    'moduleid' => 19,
    'field' => 'description',
    'name' => 'SEO简介',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => '',
    'errormsg' => '',
    'class' => '',
    'type' => 'textarea',
    'setup' => 'array (
  \'fieldtype\' => \'mediumtext\',
  \'rows\' => \'4\',
  \'cols\' => \'55\',
  \'default\' => \'\',
)',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 4,
    'status' => 0,
    'issystem' => 1,
  ),
  'link' => 
  array (
    'id' => 220,
    'moduleid' => 19,
    'field' => 'link',
    'name' => '视频链接',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'link',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 5,
    'status' => 1,
    'issystem' => 0,
  ),
  'contnet' => 
  array (
    'id' => 221,
    'moduleid' => 19,
    'field' => 'contnet',
    'name' => '内容',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'contnet',
    'type' => 'textarea',
    'setup' => 'array (
  \'fieldtype\' => \'text\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 6,
    'status' => 1,
    'issystem' => 0,
  ),
  'createtime' => 
  array (
    'id' => 210,
    'moduleid' => 19,
    'field' => 'createtime',
    'name' => '发布时间',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'date',
    'errormsg' => '',
    'class' => 'createtime',
    'type' => 'datetime',
    'setup' => '',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 7,
    'status' => 1,
    'issystem' => 1,
  ),
  'status' => 
  array (
    'id' => 211,
    'moduleid' => 19,
    'field' => 'status',
    'name' => '状态',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => '',
    'errormsg' => '',
    'class' => '',
    'type' => 'radio',
    'setup' => 'array (
  \'options\' => \'发布|1
定时发布|0\',
  \'fieldtype\' => \'tinyint\',
  \'numbertype\' => \'1\',
  \'labelwidth\' => \'75\',
  \'default\' => \'1\',
)',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 7,
    'status' => 1,
    'issystem' => 1,
  ),
  'hits' => 
  array (
    'id' => 214,
    'moduleid' => 19,
    'field' => 'hits',
    'name' => '浏览量',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 8,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'hits',
    'type' => 'number',
    'setup' => 'array (
  \'numbertype\' => \'1\',
  \'decimaldigits\' => \'0\',
  \'default\' => \'0\',
)',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 10,
    'status' => 1,
    'issystem' => 0,
  ),
  'posid' => 
  array (
    'id' => 216,
    'moduleid' => 19,
    'field' => 'posid',
    'name' => '推荐位',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => '',
    'errormsg' => '',
    'class' => '',
    'type' => 'posid',
    'setup' => '',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 12,
    'status' => 0,
    'issystem' => 1,
  ),
  'template' => 
  array (
    'id' => 217,
    'moduleid' => 19,
    'field' => 'template',
    'name' => '模板',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => '',
    'errormsg' => '',
    'class' => '',
    'type' => 'template',
    'setup' => '',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 13,
    'status' => 0,
    'issystem' => 1,
  ),
);
?>