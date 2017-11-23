<?php
namespace app\user\controller;
use think\Controller;
use think\Db;
use think\Input;
use think\Request;
class Exam extends Common
{
    public function _initialize(){
        parent::_initialize();
    }
    public function getListOne($where){
        $test = db('test')->where($where)->find();
        $test['content']=json_decode($test['content'],true);
        return $test;
    }

    public function index(){
        $name = input('key');
        $where = array();
        if($name){
            $where['title|f_title'] = array('like', "%$name%");
        }
        $data=Db::table(config('database.prefix').'utest')->alias('a')
            ->join(config('database.prefix').'test ag','a.tid = ag.id','left')
            ->field('a.*,ag.title,ag.id as testid')
            ->where($where)
            ->order("addtime desc")
            ->paginate(12);
        $page = $data->render();//获取分页
        $list = $data->all();//获取数组;
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();
    }

    public function test(){
        $id = input('id');
        $where['id']=['=',$id];
        $test=$this->getListOne($where);
        $this->assign('test',$test);
        return $this->fetch();
    }

    public function getDetail(){
        $id = input('id');
        $utest = db('utest')->where('uid',session('sid'))->where('id',$id)->find();
        $utest['content']=json_decode($utest['content'],true);
        $utest['answer']=json_decode($utest['answer'],true);
        foreach($utest['answer'] as $k=>$v){
            $utest['content'][$k]['answers']=$v;
        }
        $this->assign('test',$utest);
        return $this->fetch('detail');
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
            'uid'=>session('sid'),
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
            return ['code' => 1, 'msg' => '提交成功!', 'url' => url('index')];
        }else{
            return ['code' => 0, 'msg' => '提交失败!'];
        }
    }

    public function getTest(){
        $id = input('id');
        $utest = db('utest')->where('uid',session('sid'))->where('tid',$id)->order("addtime desc")->find();
        if($utest && $utest['status']==1){
            $this->redirect(url('Exam/getDetail',array('id'=>$utest['id'])));
        }else{
            $this->redirect(url('Exam/test',array('id'=>$id)));
        }
    }

    public function edit(Request $request){
        $tests = $request->param();
        $where['id']=['=',$tests['tid']];
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
            'score'=>$score,
            'title'=>$tests['title'],
            'f_title'=>$tests['f_title'],
            'content'=>json_encode($tests['content']),
            'answer'=>json_encode($blood),
            'status'=>1
        ];
        $res = db('utest')->where('id',$tests['id'])->update($list);
        if($res !== false){
            return ['code' => 1, 'msg' => '提交成功!', 'url' => url('index')];
        }else{
            return ['code' => 0, 'msg' => '提交失败!'];
        }
    }
}