<?php
namespace app\home\controller;
use think\Controller;
use think\Request;
use think\Cookie;
use think\Db;
class Teach extends Fater
{
    public function _initialize()
    {
        parent::_initialize();
        if (!UID) {
            $this->redirect(url('home/Weixin/index'));
        }
    }
    public function getList($where){
        $data=Db::table(config('database.prefix').'tvd')
            ->where($where)
            ->order("createtime desc")
            ->paginate(10)
            ->toArray();
        $list= $data['data'];
        foreach ($list as $k=>$v ){
            $list[$k]['createtime'] = date('Y-m-d',$v['createtime']);
            $list[$k]['hits'] = FormatMoney($v['hits']);
            if($v['images'] == ''){
                $list[$k]['images']='/static/home/img/videoBox.jpg';
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
        return $this->fetch('teachSearch');
    }

    //搜索
    public function search(){
        $key = input('key');
        if(request()->isAjax()){
            $key = input('key');
            $this->setHistory($key);
            $where = array();
            if($key){
                $where['title|date_num|keywords'] = array('like', "%$key%");
            }
            $data = $this->getList($where);
            return $data;
        }
        $this->assign('key',$key);
        return $this->fetch();
    }

    //历史记录
    public function teachHistory(){
        $history = Cookie::get('histories');
        $this->assign('history',$history);
        return $this->fetch();
    }

    //保存历史记录
    public function setHistory($key){
        $history = Cookie::get('histories');
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
            Cookie::set('histories',$rows,time()+3600*24*30,'/');
        }else{
            if($key != ''){
                $data[] = $key;
            }
            Cookie::set('histories',$data,time()+3600*24*30,'/');
        }
    }
    //清空历史记录
    public function clear(){
        Cookie::clear('histories');
        return $this->fetch('teachHistory');
    }

    //详情页
    public function details(){
        $id = input('id');
        $data = db('tvd')->where('id',$id)->find();
        //浏览量自增
        $hits=[
            'hits'=>$data['hits']+1,
        ];
        $res = db('tvd')->where('id',$id)->update($hits);
        $data['hits'] = FormatMoney($data['hits']);
        $click=db('collect')->where('uid',session('did'))->where('tid',$id)->find();
        if($click){
            $data['click'] = false;
        }else{
            $data['click'] = true;
        }
        $this->assign('data',$data);
        return $this->fetch();
    }

    //收藏
    public function click(){
        $uid = session('did');
        $tid = input('id');
        $type = input('type');
        if($type == 1){
            $data = [
                'uid'=>$uid,
                'tid'=>$tid,
            ];
            $re = db('collect')->insert($data);
            if($re){
                return ['code' => 1, 'msg' => '收藏成功!'];
            }else{
                return ['code' => 0, 'msg' => '收藏失败!'];
            }
        }else{
            $res = db('collect')->where('tid',$tid)->delete();
            if($res){
                return ['code' => 1, 'msg' => '取消成功!'];
            }else{
                return ['code' => 0, 'msg' => '取消失败!'];
            }
        }

    }
}