<?php
return array (
  'status' => 
  array (
    'id' => 172,
    'moduleid' => 2,
    'field' => 'status',
    'name' => '热门问题',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'status',
    'type' => 'radio',
    'setup' => 'array (
  \'options\' => \'加入热门问题|2
取消热门问题|1\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'default\' => \'1\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'thumb_s' => 
  array (
    'id' => 236,
    'moduleid' => 2,
    'field' => 'thumb_s',
    'name' => '缩略图',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'thumb_s',
    'type' => 'image',
    'setup' => 'array (
  \'upload_allowext\' => \'jpg|jpeg|gif|png\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 0,
    'issystem' => 0,
  ),
  'catid' => 
  array (
    'id' => 7,
    'moduleid' => 2,
    'field' => 'catid',
    'name' => '栏目',
    'tips' => '',
    'required' => 1,
    'minlength' => 1,
    'maxlength' => 6,
    'pattern' => '',
    'errormsg' => '必须选择一个栏目',
    'class' => '',
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
    'id' => 8,
    'moduleid' => 2,
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
    'id' => 263,
    'moduleid' => 2,
    'field' => 'f_title',
    'name' => '副标题',
    'tips' => '',
    'required' => 1,
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
    'listorder' => 2,
    'status' => 1,
    'issystem' => 0,
  ),
  'keywords' => 
  array (
    'id' => 9,
    'moduleid' => 2,
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
    'status' => 1,
    'issystem' => 1,
  ),
  'description' => 
  array (
    'id' => 10,
    'moduleid' => 2,
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
  'content' => 
  array (
    'id' => 11,
    'moduleid' => 2,
    'field' => 'content',
    'name' => '内容',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'content',
    'type' => 'editor',
    'setup' => 'array (
  \'edittype\' => \'UEditor\',
)',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 5,
    'status' => 1,
    'issystem' => 1,
  ),
  'createtime' => 
  array (
    'id' => 12,
    'moduleid' => 2,
    'field' => 'createtime',
    'name' => '发布时间',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'date',
    'errormsg' => '',
    'class' => '',
    'type' => 'datetime',
    'setup' => '',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 7,
    'status' => 1,
    'issystem' => 1,
  ),
  'open' => 
  array (
    'id' => 19,
    'moduleid' => 2,
    'field' => 'open',
    'name' => '状态',
    'tips' => '',
    'required' => 1,
    'minlength' => 10,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'open',
    'type' => 'radio',
    'setup' => 'array (
  \'options\' => \'发布|1
定时发布|0\',
  \'fieldtype\' => \'tinyint\',
  \'numbertype\' => \'1\',
  \'default\' => \'1\',
)',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 8,
    'status' => 0,
    'issystem' => 1,
  ),
  'tel' => 
  array (
    'id' => 226,
    'moduleid' => 2,
    'field' => 'tel',
    'name' => '服务热线',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'tel',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 9,
    'status' => 1,
    'issystem' => 0,
  ),
  'hits' => 
  array (
    'id' => 227,
    'moduleid' => 2,
    'field' => 'hits',
    'name' => '浏览量',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'hits',
    'type' => 'number',
    'setup' => 'array (
  \'numbertype\' => \'1\',
  \'decimaldigits\' => \'0\',
  \'default\' => \'0\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 10,
    'status' => 1,
    'issystem' => 0,
  ),
  'clicknum' => 
  array (
    'id' => 264,
    'moduleid' => 2,
    'field' => 'clicknum',
    'name' => '点赞数',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'clicknum',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'0\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 11,
    'status' => 1,
    'issystem' => 0,
  ),
  'posid' => 
  array (
    'id' => 17,
    'moduleid' => 2,
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
    'listorder' => 14,
    'status' => 0,
    'issystem' => 1,
  ),
  'template' => 
  array (
    'id' => 18,
    'moduleid' => 2,
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
    'listorder' => 15,
    'status' => 0,
    'issystem' => 1,
  ),
);
?>