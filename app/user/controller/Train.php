<?php
namespace app\user\controller;
use think\Controller;
use think\Db;
use think\Input;
class Train extends Common
{
    public function _initialize(){
        parent::_initialize();
    }
    //培训资料
    public function tvdList(){
        $name = input('key');
        $where = array();
        if($name){
            $where['title'] = array('like', "%$name%");
        }
        $data = Db::name('tvd')->where($where)->order("createtime desc")->paginate(12);
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

}