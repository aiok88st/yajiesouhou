<?php
namespace app\admin\controller;
use think\Db;
use think\Request;
use clt\Leftnav;
use think\Validate;
class Train extends Common
{
    public function getList($key,$page,$pageSize){
        $map = '';
        if ($key) {
            $map['username|title'] = array('like', "%" . $key . "%");
        }
        $list = Db::table(config('database.prefix') . 'utest')->alias('a')
            ->join(config('database.prefix') . 'distributor at', 'a.uid = at.id', 'left')
            ->field('a.*,at.username')
            ->where($map)
            ->order('addtime desc')
            ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
            ->toArray();
        foreach ($list['data'] as $k=>$v){
            $list['data'][$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
        }
        return $list;
    }

    public function index(){
        if(request()->isPost()) {
            $key = input('post.key');
            $page =input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $list = $this->getList($key,$page,$pageSize);
            return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list['data'],'count'=>$list['total'],'rel'=>1];
        }
        return $this->fetch();
    }

    public function detail(){
        $id = input('id');
        $username = input('name');
        $utest = db('utest')->where('id',$id)->find();
        $utest['answer']=json_decode($utest['answer'],true);
        $utest['content']=json_decode($utest['content'],true);
        foreach($utest['answer'] as $k=>$v){
            $utest['content'][$k]['answers']=$v;
        }
        $this->assign('test',$utest);
        $this->assign('username',$username);
        return $this->fetch();
    }

    //删除
    public function listDel(){
        $id = input('id');
        $re = db('utest')->where('id',$id)->delete();
        if($re){
            return $result = ['code' => 1, 'msg' => '删除成功!'];
        }else{
            return $result = ['code' => 0, 'msg' => '删除失败!'];
        }
    }

    //批量删除
    public function delAll(){
        $map['id'] =array('in',input('param.ids/a'));
        $model = db('utest');
        $model->where($map)->delete();
        $result['code'] = 1;
        $result['msg'] = '删除成功！';
        $result['url'] = url('index');
        return $result;
    }

    //重考
    public function remoe(){
        $id = input('id');
        $data['status']=2;
        $utest = db('utest')->where('id',$id)->update($data);
        if($utest !== false){
            return $result = ['code' => 1, 'msg' => '设置成功!'];
        }else{
            return $result = ['code' => 0, 'msg' => '设置失败!'];
        }
    }
}