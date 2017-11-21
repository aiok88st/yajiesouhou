<?php
namespace app\home\controller;
use think\Controller;
use think\Request;
use think\Session;
use think\Db;
class Exam extends Fater
{
    public function _initialize()
    {
        parent::_initialize();
        if (!UID) {
            $this->redirect(url('home/Weixin/index'));
        }
    }

    public function getListOne($where){
        $test = db('test')->where($where)->find();
        $test['content']=json_decode($test['content'],true);
        return $test;
    }

    public function index(){
        if(request()->isAjax()){
            $where['uid'] = ['=',session('did')];
            $data = Db::name('utest')->where($where)->order("addtime desc")->paginate(10)->toArray();
            $list= $data['data'];
            foreach ($list as $k=>$v ){
                $list[$k]['addtime'] = date('Y-m-d',$v['addtime']);
            }
            $arr = [
                'list'=>$list,
                'current_page'=>$data['current_page'],
                'last_page'=>$data['last_page'],
            ];
            return $arr;
        }
        return $this->fetch('mytest');
    }

    public function test(){
        $id = input('id');
        $where['id']=['=',$id];
        $utest = db('utest')->where('uid',session('did'))->where('tid',$id)->find();
        if($utest && $utest['status']==1){
            $this->redirect(url('home/Exam/detail',array('id'=>$utest['id'])));
        }else{
            $test=$this->getListOne($where);
            $this->assign('test',$test);
            return $this->fetch('exam');
        }
    }


    //交卷
    public function add(Request $request){
        $tests = $request->param();
        $where['id']=['=',$tests['id']];
        $test=$this->getListOne($where);
        $tcontent = $test['content'];
        $standard=[];
        foreach($tcontent as $key=>$val){
            $answer=[];
            foreach($val['input'] as $k=>$v){
                if($v['answer']==1){
                    array_push($answer,$v['val']);
                }
            }
            $standard[$key]['score']=$val['score'];
            $standard[$key]['answer']=$answer;
        }
        $standard2=[];
        foreach($tests['content'] as $key=>$val){
            $answer=[];
            foreach($val['input'] as $k=>$v){
                if($v['answer']==1){
                    array_push($answer,$v['val']);
                }
            }
            $standard2[$key]['score']=$val['score'];
            $standard2[$key]['answer']=$answer;
        }
        $score=0;
        foreach($standard2 as $key=>$value){
            if(empty($value['answer'])){
                $blood[$key]=false;
                continue;
            }
            if(empty(array_diff($value['answer'],$standard[$key]['answer']))){
                $score +=$value['score'];
                $blood[$key]=true;
            }else{
                $blood[$key]=false;
            }
        }
        $list = [
            'uid'=>session('did'),
            'tid'=>$tests['id'],
            'score'=>$score,
            'title'=>$tests['title'],
            'f_title'=>$tests['f_title'],
            'content'=>json_encode($tests['content']),
            'answer'=>json_encode($blood),
            'addtime'=>time()
        ];

        $count_num=count($blood);
        $num = 0;
        foreach($blood as $k=>$v){
            if($v == true){
                $num++;
            }
        }
        $res = db('utest')->insert($list);
        $utid = db('utest')->getLastInsID();
        $lists = [
            'score'=>$score,
            'true'=>$num,
            'false'=>$count_num-$num,
            'id'=>$utid
        ];
        if($res){
            return ['code' => 1, 'msg' => '提交成功!','lists'=>$lists];
        }else{
            return ['code' => 0, 'msg' => '提交失败!'];
        }
    }

    //考试结果
    public function detail(){
        $id = input('id');
        $utest = db('utest')->where('id',$id)->find();
        $utest['content']=json_decode($utest['content'],true);
        if($utest['status'] == 1){
            $utest['answer']=json_decode($utest['answer'],true);
            foreach($utest['answer'] as $k=>$v){
                $utest['content'][$k]['answers']=$v;
            }
            $this->assign('test',$utest);
            return $this->fetch('result');
        }else{
            $this->assign('test',$utest);
            return $this->fetch('exam');
        }
    }


}