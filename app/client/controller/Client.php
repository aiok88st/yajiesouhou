<?php

namespace app\client\controller;

use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use think\Controller;
use think\Request;
use app\client\controller\Faters;
use app\client\model\Client as ClientModel;
class Client extends Faters   //客户首页
{
    public function _initialize()
    {
        parent::_initialize();
        if(!UID){
            $this->redirect('weixin/index');
        }
    }

    public function index(ClientModel $client){  //首页用来展示个人信息
        $data=$client::get(UID);
        $list = $this->get_region();
        $orders = $this->gerOrderNum();
        $system = $this->getSystem();
        $this->assign('system',$system);
        $this->assign('list',$list);
        $this->assign('orders',$orders);
        $this->assign('client',$data);
        return view();
    }

    public function gerOrderNum(){
        $order = db('order');
        $num1 = $order->where('client_id',UID)->where('status',1)->count();
        $num2 = $order->where('client_id',UID)->where('status',2)->count();
        $num3 = $order->where('client_id',UID)->where('status',3)->count();
        $orders = [
            'num1'=>$num1,
            'num2'=>$num2,
            'num3'=>$num3,
        ];
        return $orders;
    }

    public function get_region(){  //三级分类
        if(is_file('region.json')){
            $region= file_get_contents('region.json');
            return $region;
        }else{
            $list = getLocation('region',1,1);
            foreach($list as $k=>$v){
                $list[$k]['city'] = getLocation('region',$v['id'],2);
                foreach($list[$k]['city'] as $key=>$val){
                    $list[$k]['city'][$key]['area'] = getLocation('region',$val['id'],3);
                }
            }
            $region = json_encode($list);
            file_put_contents('region.json',$region);
            return $region;
        }
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
        $re = db('client')->where('id',UID)->update($c);
        $user = db('client')->where('id',UID)->field('name')->find();
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
        $signName = "雅洁";
        //模板
        $templateCode = "SMS_114380178";
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
        $re = db('client')->where('id',UID)->update($c);
        $user = db('client')->where('id',UID)->field('phone')->find();
        $list = $user['phone'];
        if($re !== false){
            return json(['code' => 1, 'msg' => '修改成功!','list'=>$list]);
        }else{
            return json(['code' => 0, 'msg' => '修改失败!']);
        }
    }

    public function editA(ClientModel $client){
        $data = input('post.');
        $result = $this->validate($data, [
            'J_Address|地区'  => 'require',
            'addr|详细地址'  => 'require',
        ]);
        if(true !== $result){
            // 验证失败 输出错误信息
            return json(['code'=>0, 'msg'=>$result,]);
        }
        $list = explode(' ',$data['J_Address']);
        $arr = [
            'id'=>UID,
            'province'=>$list[0],
            'city'=>$list[1],
            'area'=>$list[2],
        ];
        $re = $client->allowField(true)->update($arr);
        $zone=['zone'=>$data['addr']];
        $client->where('id',UID)->update($zone);
        if($re !== false){
            return json(['code' => 1, 'msg' => '修改成功!']);
        }else{
            return json(['code' => 0, 'msg' => '修改失败!']);
        }
    }
}
