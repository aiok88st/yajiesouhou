<?php

namespace app\client\controller;

use think\Request;
use app\client\model\Product as ProductModel;

use app\client\model\Client;
class Product extends Faters
{
    public function _initialize(){
        parent::_initialize();
        $client=Client::get(UID);
        if(!$client->phone){
            $this->redirect(url('Faters/messge'));
        }
        $product = new ProductModel();
        $product->get_pro_zd($client->phone);
        define('UID',1);
    }

    //产品列表
    public function index(Request $request,ProductModel $product){
        if(request()->isAjax()){
            $data=$product->where('client_id',UID)->order("id desc")->paginate(10)->toArray();
            $arr = [
                'list'=> $data['data'],
                'current_page'=>$data['current_page'],
                'last_page'=>$data['last_page'],
            ];
            return $arr;
        }
        $token = $request->token();
        $this->assign('token',$token);
        return $this->fetch();
    }

    //删除
    public function del(Request $request,ProductModel $product){
        try{
            $id=$request->param()['id'];
            $product::destroy($id);
            return rejson(1,'删除成功!',true);
        }catch (Exception $e){
            return rejson(0,$e->getMessage(),true);
        }
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
