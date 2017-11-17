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
       
        return $this->fetch();
    }

    public function test(){
        $where['id']=['=',8];
        $test=$this->getListOne($where);
        $this->assign('test',$test);
        return $this->fetch('exam');
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
        $res = db('utest')->insert($list);
        if($res){
            return ['code' => 1, 'msg' => '提交成功!', 'url' => url('user/index')];
        }else{
            return ['code' => 0, 'msg' => '提交失败!'];
        }
    }
}