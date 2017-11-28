<?php
namespace app\admin\controller;
use think\Db;
use think\Exception;
use think\Request;
use think\Controller;
use app\admin\model\Client;
class User extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }

    public function index(Request $request,Client $client){
        if(request()->isPost()){
            $key=$request->param('key','');
            if ($key) {
                $map['name|phone'] = array('like', "%" . $key . "%");
            }
            $page =input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $list=$client->where($map)
                ->order('id desc')
                ->paginate(['list_rows'=>$pageSize,'page'=>$page])
                ->toArray();
            return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list['data'],'count'=>$list['total'],'rel'=>1];
        }
        return $this->fetch();
    }

    //删除
    public function listDel(){
        $id = input('id');
        $re = db('client')->where('id',$id)->delete();
        if($re){
            return $result = ['code' => 1, 'msg' => '删除成功!'];
        }else{
            return $result = ['code' => 0, 'msg' => '删除失败!'];
        }
    }


    //批量删除
    public function delAll(){
        $map['id'] =array('in',input('param.ids/a'));
        $model = db('client');
        $model->where($map)->delete();
        $result['code'] = 1;
        $result['msg'] = '删除成功！';
        $result['url'] = url('lists');
        return $result;
    }
}