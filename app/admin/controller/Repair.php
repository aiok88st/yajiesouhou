<?php
namespace app\admin\controller;
use think\Db;
use think\Exception;
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
        $name=$request->param('name','');
        $phone=$request->param('phone','');
        $where=[
            'status'=>$status
        ];
        if(!empty($name))$where['name']=['LIKE',"%{$name}%"];
        if(!empty($phone))$where['phone']=['LIKE',"%{$phone}%"];
        $page =input('page')?input('page'):1;
        $pageSize =input('limit')?input('limit'):config('pageSize');
        $list=$order->where($where)
            ->order('id desc')
            ->paginate(['list_rows'=>$pageSize,'page'=>$page])
            ->toArray();
        return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list['data'],'count'=>$list['total'],'rel'=>1];

    }
    public function show(Request $request,Order $order){
        $id=$request->param()['id'];
        $data=$order::get($id);
        if(!$data)$this->error('您查询的数据不存在');
        if($data['images'])  $data['images']=unserialize($data['images']);

        return view('',[
            'data'=>$data
        ]);
    }
    public function dele(Request $request,Order $order){
        try{
            $ids=$request->param()['ids'];
            if(is_array($ids)){
                $ids=implode(',',$ids);
            }
            $order::destroy($ids);
            return rejson(1,'删除成功');
        }catch (Exception $e){
            return rejson(0,$e->getMessage());
        }
    }
}
?>