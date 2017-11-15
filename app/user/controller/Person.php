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
        $username = session('uname');
        $id = session('sid');
        $map['did']=['=',$id];
        $list=Db::table(config('database.prefix').'network')->alias('a')
            ->join(config('database.prefix').'region ag','a.province = ag.id','left')
            ->join(config('database.prefix').'region r','a.city = r.id','left')
            ->join(config('database.prefix').'region rs','a.area = rs.id','left')
            ->field('a.*,ag.name as province,r.name as city,rs.name as area')
            ->where($map)
           ->select();
        $this->assign('list',$list);
        $this->assign('username',$username);
        return $this->fetch();
    }

    //修改密码
    public function edit(){
        if(request()->isPost()) {
            $admin = new Distributor();
            $data = input('post.');
            $result = $this->validate($data, [
                'password|密码'  => ['require','max:15','min:6','confirm'],
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return json(['code'=>0, 'msg'=>$result,]);
            }
            $user = [
                'id'=>session('sid'),
                'password'=>$data['password']
            ];
            $num = $admin->change($user);
            if($num == 1){
                return json(['code' => 1, 'msg' => '修改成功!']);
            }else {
                return json(array('code' => 0, 'msg' => '修改失败!'));
            }
        }
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