<?php
namespace app\user\controller;
use think\Controller;
use think\Db;
use think\Input;
use think\Request;
use app\user\model\Club as ClubModel;
use app\user\model\Client;
class Club extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }

    public function index(Client $client){
        $clientId=db('club')->where('did',session('sid'))->select();
        foreach($clientId as $k=>$v){
            $cId[]=$v['client_id'];
        }
        $name = input('key');
        $where = array();
        if($name){
            $where['name|phone'] = array('like', "%$name%");
        }
        $map['id']=['IN',$cId];
        $data=$client->where($where)->where($map)->order('id desc')->paginate(12);
        $page = $data->render();//获取分页
        $list = $data->all();//获取数组;
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();
    }

    //删除
    public function listDel(){
        $id = input('id');
        $re = db('club')->where('client_id',$id)->where('did',session('sid'))->delete();
        if($re){
            return $result = ['code' => 1, 'msg' => '删除成功!'];
        }else{
            return $result = ['code' => 0, 'msg' => '删除失败!'];
        }
    }
}