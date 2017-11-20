<?php
namespace app\home\controller;
use think\Controller;
use think\Request;
use think\Session;
use think\Db;
class Collect extends Fater
{
    public function _initialize()
    {
        parent::_initialize();
        if (!UID) {
            $this->redirect(url('home/Weixin/index'));
        }
    }

    public function index(){
        $catid = input('catid')?input('catid'):27;
        $catids=explode(',',rtrim(getTreeNum('category',26),','));
        if(request()->isAjax()){
            $where['catid'] = ['=',$catid];
            $list = $this->getList($where);
            return $list;
        }
        $count_num = count($catids);
        $this->assign('catids',$catids);
        $this->assign('catid',$catid);
        $this->assign('count_num',$count_num);
        return $this->fetch('collect');
    }

    public function getList($where){
        $map['uid']=['=',session('did')];
        $data=Db::table(config('database.prefix').'collect')->alias('a')
            ->join(config('database.prefix').'tvd ag','a.tid = ag.id','left')
            ->field('a.*,ag.*')
            ->where($where)
            ->where($map)
            ->order("createtime desc")
            ->paginate(10)
            ->toArray();
        $list= $data['data'];
        foreach ($list as $k=>$v ){
            $list[$k]['createtime'] = date('Y-m-d',$v['createtime']);
            $list[$k]['hits'] = FormatMoney($v['hits']);
            if($v['thumb'] == ''){
                $list[$k]['thumb']='/static/home/img/pImg.jpg';
            }
        }
        $arr = [
            'list'=>$list,
            'current_page'=>$data['current_page'],
            'last_page'=>$data['last_page'],
        ];
        return $arr;
    }


}