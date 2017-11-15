<?php
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Controller;
class Uplome extends Common
{
    public function _initialize(){
        parent::_initialize();
    }

    public function getList($key,$page,$pageSize){
        $map = '';
        if ($key) {
            $map['username|phone'] = array('like', "%" . $key . "%");
        }
        $list = Db::table(config('database.prefix') . 'uplome')->alias('a')
            ->join(config('database.prefix') . 'category at', 'a.catid = at.id', 'left')
            ->field('a.*,at.catname')
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
        $id=input('id');
        $list = Db::table(config('database.prefix') . 'uplome')->alias('a')
            ->join(config('database.prefix') . 'category at', 'a.catid = at.id', 'left')
            ->field('a.*,at.catname')
            ->where("a.id=$id")
            ->find();
        $img = explode(';',rtrim($list['image'],';'));
        $this->assign('img',$img);
        $this->assign('list',$list);
        return $this->fetch();
    }

    //删除
    public function listDel(){
        $id = input('id');
        $re = db('uplome')->where('id',$id)->delete();
        if($re){
            return $result = ['code' => 1, 'msg' => '删除成功!'];
        }else{
            return $result = ['code' => 0, 'msg' => '删除失败!'];
        }
    }

    //批量删除
    public function delAll(){
        $map['id'] =array('in',input('param.ids/a'));
        $model = db('uplome');
        $model->where($map)->delete();
        $result['code'] = 1;
        $result['msg'] = '删除成功！';
        $result['url'] = url('lists');
        return $result;
    }
}