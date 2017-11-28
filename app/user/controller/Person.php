<?php
namespace app\user\controller;
use think\Controller;
use think\Db;
use think\Input;
use app\user\model\Distributor;
class Person extends Common
{
    public function _initialize(){
        parent::_initialize();
    }

    public function index(){
        $id = session('sid');
        $map['did']=['=',$id];
        $list=Db::table(config('database.prefix').'network')->alias('a')
            ->join(config('database.prefix').'region ag','a.province = ag.id','left')
            ->join(config('database.prefix').'region r','a.city = r.id','left')
            ->join(config('database.prefix').'region rs','a.area = rs.id','left')
            ->field('a.*,ag.name as province,r.name as city,rs.name as area')
            ->where($map)
           ->select();
        $user = db('distributor')->where('id',$id)->find();
        $open = db('member_open')->where('did',$id)->find();
        if($open){
            $open_face = $open['open_face'];
        }else{
            $open_face = "__STATIC__/common/images/personHead.png";
        }
        $this->assign('list',$list);
        $this->assign('user',$user);
        $this->assign('open_face',$open_face);
        return $this->fetch();
    }

    //修改密码
    public function edit(){
        $nikename = input('nikename');
        $tel = input('tel');
        if(request()->isPost()) {
            $admin = new Distributor();
            $data = input('post.');
            $result = $this->validate($data, [
                'nikename|姓名'  => ['require'],
                'tel|手机号码' => ['require', "regex:/^1[34578]{1}[0-9]{9}$/"],
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return json(['code'=>0, 'msg'=>$result,]);
            }
            $user = [
                'id'=>session('sid'),
                'nikename'=>$data['nikename'],
                'tel'=>$data['tel'],
            ];
            $num = $admin->update($user);
            if($num == 1){
                return json(['code' => 1, 'msg' => '修改成功!']);
            }else {
                return json(array('code' => 0, 'msg' => '修改失败!'));
            }
        }
        $this->assign('nikename',$nikename);
        $this->assign('tel',$tel);
        return $this->fetch();
    }

    //修改店面
    public function editTitle(){
        $id = input('id');
        $title = input('title');
        $tel = input('tel');
        if(request()->isPost()) {
            $data = input('post.');
            $result = $this->validate($data, [
                'title|店名'  => ['require'],
                'tel|手机号码' => ['require'],
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return json(['code'=>0, 'msg'=>$result,]);
            }
            $re = db('network')->update($data);
            if($re !== false){
                return json(['code' => 1, 'msg' => '修改成功!']);
            }else {
                return json(array('code' => 0, 'msg' => '修改失败!'));
            }
        }
        $this->assign('id',$id);
        $this->assign('title',$title);
        $this->assign('tel',$tel);
        return $this->fetch();
    }


}