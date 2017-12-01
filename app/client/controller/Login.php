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
            $this->redirect('client/weixin/index');
        }
    }
    public function index(Request $request)
    {
        $data = db('system')->where('id',1)->find();
        return view('',[
            'data'=>$data,
            'token'=>$request->token()
        ]);
    }
    public function login(Request $request,Client $client){
        try{
            $param=$request->param();
            $result = $this->validate($param, [
                'phone|手机号码'  => 'require|regex:/^1[34578]\d{9}$/',
                'code|短信验证码'  => 'require',
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return json(['code'=>0, 'msg'=>$result,]);
            }
            $codeArr=session('codeArr');
            if($param['code'] == '' || $param['code'] != $codeArr['pcode']) {
                return json(['code' => 0, 'msg' => '验证码不正确，请重新输入!']);
            }
            //短信验证码验证通过后进行注册
            $open=session('user');
            $phone['phone']=$param['phone'];
            $client->where('id',$open['user_id'])->update($phone);
            return json([
                'code'=>1,
                'msg'=>'绑定成功',
                'url'=>url('client/client/index')
            ]);
        }catch (\Exception $e){
            return rejson(0,$e->getMessage());
        }
    }
}
