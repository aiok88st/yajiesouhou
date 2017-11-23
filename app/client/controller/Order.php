<?php

namespace app\client\controller;

use think\Controller;
use think\Request;
use app\client\model\Order as OrderModel;
use app\client\model\Client;
class Order extends Fater
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $client=Client::get(UID);
        if(!$client->phone){
            abort(505,'请先绑定手机号码');
        }
    }

    public function add(Request $request,OrderModel $order){
        $param=$request->param();
        $param['client_id']=UID;
        $param['user_id']=$param['phone'];

        return $order->add($param);
    }
}
