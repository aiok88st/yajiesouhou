<?php

namespace app\client\controller;

use think\Controller;
use think\Request;
use app\client\model\Client as ClientModel;
class Client extends Fater   //客户首页
{
    public function _initialize()
    {
        if(!UID){
            $this->redirect('weixin/index');
        }
    }

    public function index(){  //首页用来展示个人信息
        $client = db('client')->where('id',1)->find();
        $list = $this->get_region();
        $this->assign('list',json_encode($list));
        $this->assign('client',$client);
        return view();
    }

    public function get_region(){  //三级分类
        $list = getLocation('region',1,1);
        foreach($list as $k=>$v){
            $list[$k]['city'] = getLocation('region',$v['id'],2);
            foreach($list[$k]['city'] as $key=>$val){
                $list[$k]['city'][$key]['area'] = getLocation('region',$val['id'],3);
            }
        }
        return $list;
    }

    public function edit_name(){
        $data = input('post.');
        $result = $this->validate($data, [
            'name|姓名'  => ['require'],
        ]);
        if(true !== $result){
            // 验证失败 输出错误信息
            return json(['code'=>0, 'msg'=>$result,]);
        }
        $c = ['name'=>$data['name']];
        $re = db('client')->where('id',1)->update($c);
        $user = db('client')->where('id',1)->field('name')->find();
        $list = $user['name'];
        if($re !== false){
            return json(['code' => 1, 'msg' => '修改成功!','list'=>$list]);
        }else{
            return json(['code' => 0, 'msg' => '修改失败!']);
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
        if($response->Code == 'OK'){
            return json(['code' => 1, 'msg' => '短信发送成功!']);
        }else{
            return json(['code' => 0, 'msg' => '短信发送失败!']);
        }
    }

    public function edit_phone(){
        $data = input('post.');
        $result = $this->validate($data, [
            'phone|手机号码'  => 'require|regex:/^1[34578]\d{9}$/',
            'code|短信验证码'  => 'require',
        ]);
        if(true !== $result){
            // 验证失败 输出错误信息
            return json(['code'=>0, 'msg'=>$result,]);
        }
        $codeArr=session('codeArr');
        if($data['code'] == '' || $data['code'] != $codeArr['pcode']) {
            return json(['code' => 0, 'msg' => '验证码不正确，请重新输入!']);
        }

        $c = ['phone'=>$data['phone']];
        $re = db('client')->where('id',1)->update($c);
        $user = db('client')->where('id',1)->field('phone')->find();
        $list = $user['phone'];
        if($re !== false){
            return json(['code' => 1, 'msg' => '修改成功!','list'=>$list]);
        }else{
            return json(['code' => 0, 'msg' => '修改失败!']);
        }
    }
}
