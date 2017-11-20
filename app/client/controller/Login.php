<?php

namespace app\client\controller;

use think\Controller;
use think\Request;
use app\client\model\Client;
class Login extends Controller
{
    public function _initialize()
    {
        $open_id=session('user')['open_id'];
        if(!$open_id){
            $this->redirect('weixin/index');
        }
    }
    public function index(Request $request)
    {
        //
        return view('',[
            'token'=>$request->token()
        ]);
    }
    public function login(Request $request,Client $client){
        try{
            $param=$request->param();
            $result = $this->validate(  //验证手机号码
                $param,
                [
                    'phone|手机号码'  => 'require|regex:/^1[34578]\d{9}$/',
                    ''
                ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return rejson(0,$result);
            }
            //验证短信验证码
            if($param['verified']!==session('verified')){
                return rejson(0,'验证码错误');
            }
            //短信验证码验证通过后进行注册
            $open=session('user');
            $open['phone']=$param['phone'];
            $client->allowField(true)->save($open);
            $open['user_id']=$client->id;
            session('user',$open);
            return json([
                'code'=>1,
                'msg'=>'登录成功',
                'url'=>url('client/index')
            ]);
        }catch (\Exception $e){
            return rejson(0,$e->getMessage());
        }
    }
}
