<?php
namespace app\user\controller;
use think\Db;
use think\Exception;
use think\Request;
use think\Controller;
use app\user\model\Order;
use app\user\model\Network;
use app\user\model\Region;
use app\user\model\OrderLog;
use app\user\model\Distributor;
use app\user\model\Club;
class Repair extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }

    public function index(Request $request,Order $order){  //获取数据列表
        $status_name=[
            ['id'=>1,'name'=>'待维修'],
            ['id'=>2,'name'=>'维修中'],
            ['id'=>3,'name'=>'已完成'],
        ];
        $netid=db('network')->where('did',session('sid'))->field('id')->select();
        $status=$request->param('status',1);
        $key=$request->param('key','');
        foreach($netid as $k=>$v){
            $uid[] = $v['id'];
        }
        $where['status'] = ['IN',$status];
        $where['user_id'] = ['IN',$uid];
        if(!empty($key))$where['name|phone']=['LIKE',"%{$key}%"];
        $data=$order->where($where)
            ->order('id desc')
            ->paginate(12);
        $page = $data->render();//获取分页
        $list = $data->all();//获取数组;
        $this->assign('list',$list);
        $this->assign('page',$page);
        $this->assign('status',$status);
        $this->assign('status_name',$status_name);
        return $this->fetch();
    }

    //待审核
    public function audit(Request $request,Order $order){
        $netid=db('network')->where('did',session('sid'))->field('id')->select();
        $status=$request->param('status',0);
        $key=$request->param('key','');
        foreach($netid as $k=>$v){
            $uid[] = $v['id'];
        }
        $where['status'] = ['IN',$status];
        $where['user_id'] = ['IN',$uid];
        if(!empty($key))$where['name|phone']=['LIKE',"%{$key}%"];
        $data=$order->where($where)
            ->order('id desc')
            ->paginate(12);
        $page = $data->render();//获取分页
        $list = $data->all();//获取数组;
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();
    }

    //详情
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

    public function del(Request $request,Order $order){  //订单删除
        try{
            $ids=$request->param()['id'];
            $order::destroy($ids);
            return ['code' => 1, 'msg' => '删除成功!'];
        }catch (Exception $e){
            return ['code' => 0, 'msg' => $e->getMessage()];
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

            if(!empty($param['user_id'])){
                $data->user_id=$param['user_id'];
            }

            $data->save();
            $log_data=[
                'order_id'=>$param['id'],
                'admin_type'=>2,
                'admin_id'=>session('sid'),
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


    public function add(Request $request,Order $order,OrderLog $log){
        $id=$request->param()['id'];
        if (request()->isPost()) {
            $param = input('post.');
            $result = $this->validate($param, [
                'u_logistics|物流公司'  => ['require'],
                'u_logistics_number|物流单号'  => ['require'],
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return json(['code'=>0, 'msg'=>$result,]);
            }
            $data=$order::get($param['id']);
            if(!$data)  return rejson(0,'数据错误');
            $order_data=[
                'id'=>$param['id'],
                'status'=>3,
                'u_logistics'=>$param['u_logistics'],
                'u_logistics_number'=>$param['u_logistics_number'],
            ];
            db('order')->update($order_data);
            $log_data=[
                'order_id'=>$param['id'],
                'admin_type'=>2,
                'admin_id'=>session('sid'),
                'content'=>'维修完成'
            ];
            $log->save($log_data);
            return rejson(1,'保存成功');

        }
        $this->assign('id',$id);
        return $this->fetch();
    }

    public function edit_status(Request $request,Order $order,OrderLog $log){
        try{
            $param=$request->param();
            $data=$order::get($param['id']);
            if(!$data)  return rejson(0,'数据错误');
            $data->status=3;
            $data->save();
            $log_data=[
                'order_id'=>$param['id'],
                'admin_type'=>2,
                'admin_id'=>session('sid'),
                'content'=>'维修完成'
            ];
            $log->save($log_data);
            return rejson(1,'保存成功');
        }catch (Exception $e){
            return rejson(0,$e->getMessage());
        }
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

        $Traces= '[{"AcceptTime": "2014/06/25 08:05:37", "AcceptStation": "正在派件..(派件人:邓裕富,电话:18718866310)[深圳 市]", "Remark": null}, {"AcceptTime": "2014/06/25 04:01:28", "AcceptStation": "快件在 深圳集散中心 ,准备送往下一站 深圳 [深圳市]", "Remark": null}, {"AcceptTime": "2014/06/25 01:41:06", "AcceptStation": "快件在 深圳集散中心 [深圳市]", "Remark": null}, {"AcceptTime": "2014/06/24 20:18:58", "AcceptStation": "已收件[深圳市]", "Remark": null}, {"AcceptTime": "2014/06/24 20:55:28", "AcceptStation": "快件在 深圳 ,准备送往下一站 深圳集散中心 [深圳市]", "Remark": null}, {"AcceptTime": "2014/06/25 10:23:03", "AcceptStation": "派件已签收[深圳市]", "Remark": null}, {"AcceptTime": "2014/06/25 10:23:03", "AcceptStation": "签收人是：已签收[深圳市]", "Remark": null}]';
        $Traces=json_decode($Traces,true);
        $Traces=array_reverse($Traces, true);
//        $Traces=array_reverse($result['Traces'], true);
        $this->assign('Traces',$Traces);
        return $this->fetch();
    }


}