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
        $version = Db::query('SELECT VERSION() AS ver');
        $config  = [
            'url'             => $_SERVER['HTTP_HOST'],
            'document_root'   => $_SERVER['DOCUMENT_ROOT'],
            'server_os'       => PHP_OS,
            'server_port'     => $_SERVER['SERVER_PORT'],
            'server_ip'       => $_SERVER['SERVER_ADDR'],
            'server_soft'     => $_SERVER['SERVER_SOFTWARE'],
            'php_version'     => PHP_VERSION,
            'mysql_version'   => $version[0]['ver'],
            'max_upload_size' => ini_get('upload_max_filesize')
        ];
        $this->assign('config', $config);
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
