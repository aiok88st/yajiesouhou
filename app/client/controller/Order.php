<?php

namespace app\client\controller;

use think\Controller;
use think\Request;
use app\client\model\Order as OrderModel;

class Order extends Fater
{
    public function add(Request $request,OrderModel $order){
        $param=$request->param();
        $param['client_id']=UID;
        return $order->add($param);
    }
}
