<?php

namespace app\client\controller;

use think\Request;
use app\client\model\Product as ProductModel;

use app\client\model\Client;
class Product extends Fater
{
    public function _initialize(){
        parent::_initialize();
        $client=Client::get(UID);
        if(!$client->phone){
            $this->error(505,'请先绑定手机号码');
        }
        $product = new ProductModel();
        $product->get_pro_zd($client->phone);
    }
    //产品列表
    public function index(Request $request,ProductModel $product){
        $list=$product->where('client_id',UID)->paginate(10);
//        $data = $list->all();
        return view('',[
            'token'=>$request->token(),
            'list'=>$list
        ]);
    }

    //手动添加产品
    public function add(Request $request,ProductModel $product){
        $param=$request->param();
        return $product->get_pro($param);
    }
    //申请报修
    public function repair(Request $request){
        $id=$request->param()['id'];
        $pro=ProductModel::get($id);
        if($pro->status!=0){
            $this->error('此产品不可申请维修');
        }
        return view('',[
            'token'=>$request->token(),
            'data'=>$pro
        ]);
    }

}
