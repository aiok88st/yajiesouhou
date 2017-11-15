<?php
namespace app\home\controller;
use think\Controller;
use app\home\controller\Fater;
use think\Request;
use think\Db;
use app\home\model\Uplome;
class Article extends Fater
{
    public function _initialize(){
        parent::_initialize();
    }

    public function getList($where){
        $data = Db::name('article')->where($where)->order("hits desc")->paginate(10)->toArray();
        $list= $data['data'];
        foreach ($list as $k=>$v ){
            $list[$k]['createtime'] = date('Y-m-d',$v['createtime']);
        }
        $arr = [
            'list'=>$list,
            'current_page'=>$data['current_page'],
            'last_page'=>$data['last_page'],
        ];
        return $arr;
    }

    public function index(){
        if(request()->isAjax()){
            $where['status'] = ['=',2];
            $data = $this->getList($where);
            return $data;
        }
        return $this->fetch();
    }

    public function search(){
        $key = input('key');
        if(request()->isAjax()){
            $where['keywords'] = array('like', "%$key%");
            $data = $this->getList($where);
            return $data;
        }
        $this->assign('key',$key);
        return $this->fetch();
    }

    public function detail(){
        $id = input('id');
        $data = db('article')->where('id',$id)->find();
        $cate = db('category')->where('id',$data['catid'])->field('catname')->find();
        //浏览量自增
        $hits=[
            'hits'=>$data['hits']+1,
        ];
        $res = db('article')->where('id',$id)->update($hits);
        $this->assign('data',$data);
        $this->assign('cate',$cate);
        return $this->fetch();
    }

    //点赞
    public function click(){
        $id = input('id');
        $type = input('type');
        $data = db('article')->where('id',$id)->find();
        if($type == 1){
            $clicknum=[
                'clicknum'=>$data['clicknum']+1,
            ];
        }else{
            $clicknum=[
                'clicknum'=>$data['clicknum']-1,
            ];
        }
        $res = db('article')->where('id',$id)->update($clicknum);
        $list = db('article')->where('id',$id)->field('clicknum')->find();
        if($res){
            return json(['code'=>1, 'clicknum'=>$list['clicknum']]);
        }else{
            return json(['code'=>0, 'clicknum'=>$list['clicknum']]);
        }
    }

    //全部问题一
    public function problemFirst(){
        $cate = db('category')->where('parentid',4)->field('id,parentid,catname')->select();
        foreach($cate as $k=>$v){
            $cate[$k]['childen'] = db('category')->where('parentid',$v['id'])->field('id,parentid,catname')->select();
        }
        $this->assign('cate',$cate);
        return $this->fetch();
    }
    //全部问题二
    public function problemSecond(){
        $catid = input('catid');
        if(request()->isAjax()){
            $catids = db('category')->where('parentid',input('catid'))->column('id');
            if($catids){
                $catid = input('catid').','.implode(',',$catids);
            }else{
                $catid = input('catid');
            }
            $where['catid']=array('in',$catid);
            $data=$this->getList($where);
            return $data;
        }
        $catname = input('catname');
        $this->assign('catid',$catid);
        $this->assign('catname',$catname);
        return $this->fetch();
    }

    //意见反馈
    public function feedBack(){
        $cate=getTree2('category',4,1,0);
        $this->assign('cate',$cate);
        return $this->fetch();
    }

    public function add(Request $request){
        try {
            $data = $request->param();
            $result = $this->validate(
                $data,
                [
                    'username|姓名' => 'require|max:25',
                    'phone|手机号码' => ['require', "regex:/^1[34578]{1}[0-9]{9}$/"],
                    'catid|类型' => 'require',
                    'content|问题描述' => 'require|min:10,max:255',
                    'img|图片' => 'require',
                ]);
            if (true !== $result) {
                // 验证失败 输出错误信息
                return json(['code' => 0, 'msg' => $result]);
            }
            $user = new Uplome;
            $data['addtime'] = time();
            $imge = "";
            foreach($data['img'] as $k=>$v){
                $tp=$this->upload($v);
                $real = $tp['code']==1?$tp['thumb']:'';
                $imge .= $real.';';
            }
            $data['image'] = $imge;
            $re = $user->allowField(true)->save($data);
            if($re){
                return json(['code' => 1, 'msg' => "提交成功！"]);
            }else{
                return json(['code' => 0, 'msg' => "提交失败！"]);
            }
        } catch (\Exception $e) {
            return json([
                'code' => 0,
                'msg' => $e->getMessage(),
            ]);
        }
    }

}
