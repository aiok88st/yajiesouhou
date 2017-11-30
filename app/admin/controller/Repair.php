<?php
namespace app\admin\controller;
use think\Db;
use think\Exception;
use think\Request;
use think\Controller;
use app\admin\model\Order;
use app\admin\model\Network;
use app\admin\model\Region;
use app\admin\model\OrderLog;
use app\admin\model\Club;
class Repair extends Common{
    public function index(Request $request){  //订单列表
        $status=$request->param('status',1);

        $status_name=[
            ['id'=>1,'name'=>'待维修'],
            ['id'=>2,'name'=>'维修中'],
            ['id'=>3,'name'=>'已完成'],
        ];
        return view('',[
            'status'=>$status,
            'status_name'=>$status_name
        ]);
    }

    public function audit(Request $request){  //待审核列表
        $status=$request->param('status','0');
        return view('',[
            'status'=>$status
        ]);
    }

    public function getList(Request $request,Order $order){  //获取数据列表
        $status=$request->param('status');
        $name=$request->param('name','');
        $phone=$request->param('phone','');
        $key=$request->param('key','');
        $where=[
            'status'=>['IN',$status],
            'user_id'=>($status==0 || $status==-1)? null:['>','0']
        ];

        if(!empty($name))$where['name']=['LIKE',"%{$name}%"];
        if(!empty($phone))$where['phone']=['LIKE',"%{$phone}%"];
        if(!empty($key))$where['name|phone']=['LIKE',"%{$key}%"];
        $page =input('page')?input('page'):1;
        $pageSize =input('limit')?input('limit'):config('pageSize');
        $list=$order->where($where)
            ->order('id desc')
            ->paginate(['list_rows'=>$pageSize,'page'=>$page])
            ->toArray();
        return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list['data'],'count'=>$list['total'],'rel'=>1];
    }

    public function show(Request $request,Order $order,Region $region,OrderLog $log){  //订单详情
        $id=$request->param()['id'];
        $data=$order::get($id);
        if(!$data)$this->error('您查询的数据不存在');
        if($data['images'])  $data['images']=unserialize($data['images']);
        $p=$region->where('pid',1)->select();
        $c=$region->where('pid',$data['province']['id'])->select();
        $a=$region->where('pid',$data['city']['id'])->select();
        $log_list=$log->where('order_id',$id)->select();

        return view('',[
            'data'=>$data,
            'p'=>$p,
            'c'=>$c,
            'a'=>$a,
            'log_list'=>$log_list
        ]);
    }
    public function dele(Request $request,Order $order){  //订单删除
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
    public function didList(Request $request,Network $network){  //获取门店列表
        $name=$request->param('title','');
        $phone=$request->param('tle','');
        $where=[
            'province'=>$request->param()['province'],
            'city'=>$request->param()['city'],
            'area'=>$request->param()['area']
        ];
        if(!empty($name))$where['title']=['LIKE',"%{$name}%"];
        if(!empty($phone))$where['tle']=['LIKE',"%{$phone}%"];
        $page =input('page')?input('page'):1;
        $pageSize =input('limit')?input('limit'):config('pageSize');
        $list=$network->where($where)
            ->order('id desc')
            ->paginate(['list_rows'=>$pageSize,'page'=>$page])
            ->toArray();
        return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list['data'],'count'=>$list['total'],'rel'=>1];
    }
    public function get_region(Request $request,Region $region){  //三级分类
        $pid=$request->param()['pid'];
        $res=$region->where('pid',$pid)->select();
        return $res;
    }
    public function edit(Request $request,Order $order,OrderLog $log){ //修改订单状态
        try{
            $param=$request->param();
            $data=$order::get($param['id']);
            if(!$data)  return rejson(0,'数据错误');

            switch ($param['status']){
                case -1:
                    if(empty($param['audit'])) return rejson(0,'请填写审核不通过的原因');
                    $content="审核不通过，原因：".$param['audit'];
                    break;
                case 1:
                    if(empty($param['user_id'])) return rejson(0,'请选择跟进门店');
                    $content="审核通过";
                    $client_id = $data->client_id;
                    $this->addClub($param['user_id'],$client_id);
                    break;
                default:
                    break;
            }

            $data->status=$param['status'];
            $data->audit=$param['audit'];
            $data->user_id=$param['user_id'];
            $data->save();
            $log_data=[
                'order_id'=>$param['id'],
                'admin_type'=>1,
                'admin_id'=>session('aid'),
                'content'=>$content
            ];
            $log->save($log_data);
            return rejson(1,'保存成功');
        }catch (Exception $e){
            return rejson(0,$e->getMessage());
        }
    }

    public function addClub($did,$client_id){
        $network=new Network();
        $net = $network::get($did);
        $d= $net->did;
        $club = [
            'client_id'=>$client_id,
            'did'=>$d['id']
        ];
        $c=new Club();
        $c->add($club);
    }

    //查看物流
    public function express(Request $request,Order $order){
        $param=$request->param();
        $data=$order::get($param['id']);
        if($param['status']==3){
            $name=$data->u_logistics;
            $num=$data->u_logistics_number;
        }else{
            $name=$data->c_logistics;
            $num=$data->c_logistics_number;
        }

        $where['name'] = array('like', "%$name%");
        $code = db('express')->where($where)->field('code')->find();

        $express=new \org\Express;
        $result=$express->getOrderTracesByJson($code['code'], $num);
        $result=json_decode($result,true);
        $Traces=array_reverse($result['Traces'], true);
        $this->assign('Traces',$Traces);
        return $this->fetch();
    }
}
