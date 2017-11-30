<?php

namespace app\client\controller;

use think\Controller;
use think\Request;
use app\client\model\Client;
use think\Session;
class Faters extends Controller
{
    public function _initialize()
    {
        $member_id=session('user')['user_id'];
//        define('UID', 1);//用户ID
        define('UID',$member_id);//用户ID
        if(!UID){
            $this->redirect('weixin/index');
        }
        $open=Client::get(UID);
        if(empty($open)){
            Session::clear();
            $this->redirect('login/index');
        }

        if(Request::instance()->isPost()){

            $result = $this->validate(
                [
                    '__token__'=>input('post.__token__')
                ],
                [
                    '__token__|令牌数据'=>'require|token'
                ]);

            if(true !== $result){
                return ['code'=>0,'msg'=>$result];
            }
        }
    }
    public function get_token(){
        return rejson(1,'获取成功',true);
    }

    public function messge(){
        $data = [
            'msg'=>'请先绑定手机！',
            'url'=>url('Login/index')
        ];
        $this->assign('data',$data);
        return $this->fetch('common/404');
    }

    public function getSystem(){
        $data = db('system')->where('id',1)->find();
        return $data;
    }

}
