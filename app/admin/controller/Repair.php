<?php
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Controller;
use app\admin\model\Order;


class Repair extends Common{
    public function index(Request $request){

        $status=$request->param('status',0);
        return view('',[
            'status'=>$status
        ]);
    }
    public function audit(Request $request){
        $status=$request->param('status','0,-1');

        return view('',[
            'status'=>$status
        ]);
    }
    public function getList(Request $request,Order $order){
        $status=$request->param('status');
        $page =input('page')?input('page'):1;
        $pageSize =input('limit')?input('limit'):config('pageSize');
        $list=$order->where('status',$status)
            ->order('id desc')
            ->paginate(['list_rows'=>$pageSize,'page'=>$page])
            ->toArray();
        return $list;
    }
}
?>