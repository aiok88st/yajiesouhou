<?php
namespace app\home\controller;
use think\Controller;
use app\home\controller\Fater;
use think\Request;
use think\Db;
use think\Cookie;
class Video extends Fater
{
    public function _initialize()
    {
        parent::_initialize();
    }
    public function getList($where){
        $data = Db::name('video')->where($where)->order("hits desc")->paginate(10)->toArray();
        $list= $data['data'];
        foreach ($list as $k=>$v ){
            $list[$k]['createtime'] = date('Y-m-d',$v['createtime']);
            $list[$k]['hits'] = FormatMoney($v['hits']);
            if($v['thumb'] == ''){
                $list[$k]['thumb']='/static/home/img/videoBox.jpg';
            }
        }
        $arr = [
            'list'=>$list,
            'current_page'=>$data['current_page'],
            'last_page'=>$data['last_page'],
        ];
        return $arr;
    }

    public function index(){
        $childen = db('category')->where('parentid',3)->field('id,parentid,catname')->select();
        $video = db('video')->where('catid',3)->where('tag',4)->order('hits desc')->limit(6)->select();
        $cate = db('category')->where('parentid',1)->field('id,parentid,catname')->select();
        foreach($video as $k=>$v){
            $video[$k]['hits'] = FormatMoney($v['hits']);
        }
        $this->assign('video',$video);
        $this->assign('childen',$childen);
        $this->assign('cate',$cate);
        $this->assign('catid',3);
        return $this->fetch('help');
    }

    public function cats(){
        $catid = input('catid');
        $video = db('video')->where('catid',$catid)->where('tag',4)->order('hits desc')->limit(6)->select();
        $childen = db('category')->where('parentid',$catid)->field('id,parentid,catname')->select();
        foreach($video as $k=>$v){
            $video[$k]['hits'] = FormatMoney($v['hits']);
        }
        $data = [
            'video'=>$video,
            'childen'=>$childen,
        ];
        return $data;
    }

    //搜索
    public function helpHistory(){
        $history = Cookie::get('history');
        $this->assign('history',$history);
        return $this->fetch();
    }

    //搜索结果
    public function search(){
        $key = input('key');
        $catid = input('catid');
        if(request()->isAjax()){
            $this->setHistory($key);
            if($catid != ''){
                $where['catid'] = ['=',$catid];
            }
            $where['title'] = array('like', "%$key%");
            $data = $this->getList($where);
            return $data;
        }
        $this->assign('key',$key);
        $this->assign('catid',$catid);
        return $this->fetch('helpSearch');
    }

    //保存历史记录
    public function setHistory($key){
        $history = Cookie::get('history');
        if($history){
            if($key != ''){
                array_unshift($history, $key); //在记录顶部加入
            }
            /* 去除重复记录 */
            $rows = array();
            foreach ($history as $v){
                if(in_array($v, $rows)){
                    continue;
                }
                $rows[] = $v;
            }
            /* 如果记录数量多余10则去除 */
            while (count($rows) > 10){
                array_pop($rows); //弹出
            }
            Cookie::set('history',$rows,time()+3600*24*30,'/');
        }else{
            if($key != ''){
                $data[] = $key;
            }
            Cookie::set('history',$data,time()+3600*24*30,'/');
        }
    }
    //清空历史记录
    public function clear(){
        Cookie::clear('history');
        return $this->fetch('helpHistory');
    }

    //详情页
    public function details(){
        $id = input('id');
        $data = db('video')->where('id',$id)->find();
        //浏览量自增
        $hits=[
            'hits'=>$data['hits']+1,
        ];
        $res = db('video')->where('id',$id)->update($hits);
        $data['hits'] = FormatMoney($data['hits']);
        $this->assign('data',$data);
        return $this->fetch();
    }
}