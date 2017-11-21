<?php
return array (
  'tid' => 
  array (
    'id' => 255,
    'moduleid' => 23,
    'field' => 'tid',
    'name' => '试题',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'tid',
    'type' => 'select',
    'setup' => 'array (
  \'options\' => \'\',
  \'multiple\' => \'0\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'size\' => \'\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'date_num' => 
  array (
    'id' => 267,
    'moduleid' => 23,
    'field' => 'date_num',
    'name' => '期数',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'date_num',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'keywords' => 
  array (
    'id' => 268,
    'moduleid' => 23,
    'field' => 'keywords',
    'name' => '关键词',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'keywords',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'catid' => 
  array (
    'id' => 270,
    'moduleid' => 23,
    'field' => 'catid',
    'name' => '分类',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'catid',
    'type' => 'catid',
    'setup' => '',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'title' => 
  array (
    'id' => 247,
    'moduleid' => 23,
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
    'id' => 252,
    'moduleid' => 23,
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
  'link' => 
  array (
    'id' => 253,
    'moduleid' => 23,
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
    'listorder' => 4,
    'status' => 1,
    'issystem' => 0,
  ),
  'images' => 
  array (
    'id' => 271,
    'moduleid' => 23,
    'field' => 'images',
    'name' => '视频图片',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'images',
    'type' => 'image',
    'setup' => 'array (
  \'upload_allowext\' => \'jpg|jpeg|gif|png\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 4,
    'status' => 1,
    'issystem' => 0,
  ),
  'weblink' => 
  array (
    'id' => 265,
    'moduleid' => 23,
    'field' => 'weblink',
    'name' => '网盘链接',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'weblink',
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
  'webnum' => 
  array (
    'id' => 266,
    'moduleid' => 23,
    'field' => 'webnum',
    'name' => '网盘提取码',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'webnum',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 6,
    'status' => 1,
    'issystem' => 0,
  ),
  'content' => 
  array (
    'id' => 256,
    'moduleid' => 23,
    'field' => 'content',
    'name' => '视频简介',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'content',
    'type' => 'textarea',
    'setup' => 'array (
  \'fieldtype\' => \'text\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 7,
    'status' => 1,
    'issystem' => 0,
  ),
  'hits' => 
  array (
    'id' => 248,
    'moduleid' => 23,
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
  \'numbertype\' => \'0\',
  \'decimaldigits\' => \'0\',
  \'default\' => \'0\',
)',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 8,
    'status' => 1,
    'issystem' => 0,
  ),
  'createtime' => 
  array (
    'id' => 249,
    'moduleid' => 23,
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
    'listorder' => 97,
    'status' => 1,
    'issystem' => 1,
  ),
  'status' => 
  array (
    'id' => 251,
    'moduleid' => 23,
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
    'listorder' => 98,
    'status' => 1,
    'issystem' => 1,
  ),
  'template' => 
  array (
    'id' => 250,
    'moduleid' => 23,
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
    'listorder' => 99,
    'status' => 0,
    'issystem' => 1,
  ),
);
?>