<?php
namespace app\user\controller;
use think\Controller;
use think\Db;
use think\Input;
class Index extends Common
{
    public function _initialize(){
        parent::_initialize();
    }
    public function index() {
        $pid = session('pid');
        $this->assign('pid',$pid);
        return $this->fetch();
    }

    public function main(){
        return $this->fetch();
    }

    //退出登陆
    public function logout(){
        session('uname',null);
        session('pid',null);
        session('sid',null);
        $this->redirect('user/login/index');
    }

    
}
