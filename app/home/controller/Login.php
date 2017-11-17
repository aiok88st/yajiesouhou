<?php
namespace app\home\controller;
use think\Controller;
use think\Request;
use think\Db;
class Login extends Fater
{
    public function _initialize(){
        parent::_initialize();
        if(!UID) {
            $this->redirect(url('home/Weixin/index'));
        }
    }

    public function getCode(){
        $phone = input('phone');
        require_once ALIDAYU_PATH . '/api_demo/SmsDemo.php';
        $signName = "恒帝科技";
        //模板
        $templateCode = "SMS_89745011";
        //生成随机的六位数的字符串
        $phonecode = rand(100000,999999);
        //session存储字符串和生成的时间
        $makeTime = time();
        $codeArr=session('codeArr');
//        if($codeArr['time']+60<time() && !empty($codeArr['time'])){
//            return json(['code' => 0, 'msg' => '请不要频繁发送验证码!']);
//        }
        //带变量的模板
        $templateParam = ['number'=>$phonecode];
        //流水账号
        $outId = "1234";
        $response = \SmsDemo::sendSms($signName, $templateCode, $phone, $templateParam, $outId);
        $codeArr = ['pcode'=>$phonecode,'time'=>$makeTime];
        session('codeArr',$codeArr);
        var_dump($response);
        if($response->Code == 'OK'){
            return json(['code' => 1, 'msg' => '短信发送成功!']);
        }else{
            return json(['code' => 0, 'msg' => '短信发送失败!']);
        }
    }

    public function index(){
        if (request()->isPost()) {
            $data = input('post.');
            $result = $this->validate($data, [
                'tel|手机号码' => ['require', "regex:/^1[34578]{1}[0-9]{9}$/"],
                'code|验证码'=>['require']
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return json(['code'=>0, 'msg'=>$result,]);
            }
            $codeArr=session('codeArr');
            if($data['code'] == '' || $data['code'] != $codeArr['pcode']) {
                return json(['code' => 0, 'msg' => '验证码不正确，请重新输入!']);
            }
            $user=db('distributor')->where('tel',$data['tel'])->where('is_open',1)->find();
            if($user){
                $d = ['did'=>$user['id']];
                $data = db('member_open')->where('id',UID)->update($d);
                return json(['code' => 1, 'msg' => '登录成功!','url'=>url('home/User/index')]);
            }else{
                return json(['code' => 0, 'msg' => '登录失败!']);
            }
        }
        return $this->fetch('login');
    }

    public function logout(){
        $this->redirect(url('home/Login/index'));
    }


}