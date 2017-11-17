<?php
namespace app\user\controller;
use think\Controller;
use think\Db;
use think\Input;
class Collect extends Common
{
    public function _initialize(){
        parent::_initialize();
    }

    public function index(){
        $name = input('key');
        $where = array();
        if($name){
            $where['title|date_num|keywords'] = array('like', "%$name%");
        }
        $map['uid']=['=',session('sid')];
        $data=Db::table(config('database.prefix').'collect')->alias('a')
            ->join(config('database.prefix').'tvd ag','a.tid = ag.id','left')
            ->field('a.*,ag.*')
            ->where($where)
            ->where($map)
            ->order("createtime desc")
            ->paginate(12);
        $page = $data->render();//获取分页
        $list = $data->all();//获取数组;
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();
    }
    //详情
    public function detail(){
        $id = input('id');
        $data = db('tvd')->where('id',$id)->find();
        //浏览量自增
        $hits=[
            'hits'=>$data['hits']+1,
        ];
        $res = db('tvd')->where('id',$id)->update($hits);
        $data['hits'] = FormatMoney($data['hits']);
        $this->assign('data',$data);
        return $this->fetch();
    }

    //取消收藏
    public function clearCollect(){
        $tid = input('tid');
        $res = db('collect')->where('tid',$tid)->delete();
        if($res){
            return ['code' => 1, 'msg' => '取消成功!'];
        }else{
            return ['code' => 0, 'msg' => '取消失败!'];
        }
    }

}