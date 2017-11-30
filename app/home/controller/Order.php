<?php
namespace app\home\controller;
use think\Db;
use think\Exception;
use think\Request;
use think\Controller;
use app\home\model\Order as OrderModel;
use app\home\model\Client;
use app\home\model\Network;
use app\home\model\OrderLog;
use app\home\model\Club;
class Order extends Fater
{
    public function _initialize()
    {
        parent::_initialize();
        if (!UID) {
            $this->redirect(url('home/Weixin/index'));
        }
    }

    public function index(Request $request,OrderModel $order){
        $status=$request->param('status',0);
        $status_name=[
            ['id'=>0,'name'=>'全部'],
            ['id'=>1,'name'=>'待维修'],
            ['id'=>2,'name'=>'维修中'],
            ['id'=>3,'name'=>'已完成'],
        ];
        if(request()->isAjax()){
            $netid=db('network')->where('did',session('did'))->field('id')->select();
            foreach($netid as $k=>$v){
                $uid[] = $v['id'];
            }
            $where['user_id'] = ['IN',$uid];
            if($status == 0){
                $where['status'] = ['>=',-1];
            }elseif($status == 1){
                $where['status'] = ['IN',[0,1]];
            }else{
                $where['status'] = ['=',$status];
            }
            $data=$order->where($where)->order("id desc")->paginate(10)->toArray();
            $arr = [
                'list'=> $data['data'],
                'current_page'=>$data['current_page'],
                'last_page'=>$data['last_page'],
            ];
            return $arr;
        }
        $this->assign('status',$status);
        $this->assign('status_name',$status_name);
        return $this->fetch();
    }

    public function getList(Request $request,OrderModel $order){
        $netid=db('network')->where('did',session('did'))->field('id')->select();
        foreach($netid as $k=>$v){
            $uid[] = $v['id'];
        }
        $where['user_id'] = ['IN',$uid];
        $status=$request->param('status');
        if($status == 0){
            $where['status'] = ['>=',-1];
        }elseif($status == 1){
            $where['status'] = ['IN',[0,1]];
        }else{
            $where['status'] = ['=',$status];
        }
        $data=$order->where($where)->order("id desc")->paginate(10)->toArray();
        $arr = [
            'list'=> $data['data'],
            'current_page'=>$data['current_page'],
            'last_page'=>$data['last_page'],
        ];
        return $arr;
    }

    public function detail(Request $request,OrderModel $order,Network $network){
        $id=$request->param()['id'];
        $data=$order::get($id);
        if(!$data)$this->error('您查询的数据不存在');
        $uid = db('order')->where('id',$id)->field('user_id,images,type')->find();
        if($uid['images'])  $img=unserialize($uid['images']);

        $net=$network::get($uid['user_id']);
        $p=$net->province;
        $c=$net->city;
        $a=$net->area;

        $list = $this->didList();
        return view('',[
            'data'=>$data,
            'net'=>$net,
            'p'=>$p,
            'c'=>$c,
            'a'=>$a,
            'img'=>$img,
            'type'=>$uid['type'],
            'list'=>$list,
            'user_id'=>$uid['user_id'],
        ]);
    }

    public function didList(){  //获取门店列表
        $where['did']=['=',session('did')];
        $list=db('network')->where($where)->order('id desc')->select();
        return $list;
    }

    public function noTong(Request $request,OrderModel $order,OrderLog $log){
        try{
            $param=$request->param();
            $data=$order::get($param['id']);
            if(!$data)  return rejson(0,'数据错误');
            if(empty($param['audit'])) return rejson(0,'请填写审核不通过的原因');
            $content="审核不通过，原因：".$param['audit'];
            $o = [
                'id'=>$param['id'],
                'status'=>-1,
                'audit'=>$param['audit'],
            ];
            db('order')->update($o);
            $log_data=[
                'order_id'=>$param['id'],
                'admin_type'=>2,
                'admin_id'=>session('did'),
                'content'=>$content
            ];
            $log->save($log_data);
            return rejson(1,'保存成功',false,url('order/detail',array('id'=>$param['id'])));
        }catch (Exception $e){
            return rejson(0,$e->getMessage());
        }
    }

    public function tong(Request $request,OrderModel $order,OrderLog $log){
        try{
            $param=$request->param();
            $data=$order::get($param['id']);
            if(!$data)  return rejson(0,'数据错误');
            if(empty($param['user_id'])) return rejson(0,'请选择跟进门店');
            $content="审核通过";
            $client_id = $data->client_id;

            $this->addClub($param['user_id'],$client_id);
            $o = [
                'id'=>$param['id'],
                'status'=>1,
                'user_id'=>$param['user_id'],
            ];
            db('order')->update($o);
            $log_data=[
                'order_id'=>$param['id'],
                'admin_type'=>2,
                'admin_id'=>session('did'),
                'content'=>$content
            ];
            $log->save($log_data);
            return rejson(1,'保存成功',false,url('order/detail',array('id'=>$param['id'])));
        }catch (Exception $e){
            return rejson(0,$e->getMessage());
        }
    }

    public function addClub($did,$client_id){
        $net = db('network')->where('id',$did)->field('did')->find();
        $club = [
            'client_id'=>$client_id,
            'did'=>$net['did']
        ];
        $c=new Club();
        $c->add($club);
    }

    public function changeStatus(Request $request,OrderModel $order){
        try{
            $param=$request->param();
            $data=$order::get($param['id']);
            if(!$data)  return rejson(0,'数据错误');
            $data->status=2;
            $data->save();
            return rejson(1,'保存成功',false,url('order/detail',array('id'=>$param['id'])));
        }catch (Exception $e){
            return rejson(0,$e->getMessage());
        }
    }

    public function changeSwan(Request $request,OrderModel $order,OrderLog $log){
        try{
            $param=$request->param();
            $data=$order::get($param['id']);
            if(!$data)  return rejson(0,'数据错误');
            $data->status=3;
            $data->save();
            $log_data=[
                'order_id'=>$param['id'],
                'admin_type'=>2,
                'admin_id'=>session('did'),
                'content'=>'维修完成'
            ];
            $log->save($log_data);
            return rejson(1,'保存成功',false,url('order/detail',array('id'=>$param['id'])));
        }catch (Exception $e){
            return rejson(0,$e->getMessage());
        }
    }

    public function wanC(Request $request,OrderModel $order,OrderLog $log){
        try{
            $param=$request->param();
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
                'admin_id'=>session('did'),
                'content'=>'维修完成'
            ];
            $log->save($log_data);
            return rejson(1,'保存成功',false,url('order/detail',array('id'=>$param['id'])));
        }catch (Exception $e){
            return rejson(0,$e->getMessage());
        }
    }

    //查看物流
    public function express(Request $request,OrderModel $order){
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