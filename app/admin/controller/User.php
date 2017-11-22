<?php
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Controller;
class User extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }

    public function index(){
        return $this->fetch();
    }
}