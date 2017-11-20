<?php

namespace app\client\controller;

use think\Request;
use app\client\model\Product as ProductModel;
class Product extends Fater
{
    public function index(Request $request,ProductModel $product)
    {
        //
        $list=$product->where('client_id',UID)->paginate(10);
        return view('',[
            'token'=>$request->token(),
            'list'=>$list
        ]);
    }
    public function add(Request $request,ProductModel $product){
        $param=$request->param();
        return $product->get_pro($param);
    }
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
