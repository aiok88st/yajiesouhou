<?php

namespace app\client\controller;

use think\Controller;
use think\Request;
use app\client\model\Client;
use think\Session;
class Fater extends Controller
{
    public function _initialize()
    {
        $member_id=session('user')['user_id'];
        define('UID',1);
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

                abort(501,$result);
            }
        }
    }
    public function get_token(){
        return rejson(1,'获取成功',true);
    }

}
