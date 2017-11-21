<?php
namespace app\home\controller;
use think\Controller;
use think\Request;
use think\Session;
use think\Db;
class User extends Fater
{
    public function _initialize(){
        parent::_initialize();
        if(!UID) {
            $this->redirect(url('home/Weixin/index'));
        }
    }

    public function index(){
        $data = db('member_open')->where('id',UID)->field('did,open_face,open_name')->find();
        $system = $this->getSystem();
        $this->assign('system',$system);
        if($data['did'] == ''){
            $this->redirect(url('home/Login/index'));
        }else{
            $utest_num = db('utest')->where('uid',$data['did'])->count();
            $collect_num = db('collect')->where('uid',$data['did'])->count();
            $user=db('distributor')->where('id',$data['did'])->where('is_open',1)->find();
            $this->assign('user',$user);
            $this->assign('open',$data);
            $this->assign('utest_num',$utest_num);
            $this->assign('collect_num',$collect_num);
            session('did',$user['id']);
            return $this->fetch('person');
        }
    }
    //修改姓名和手机
    public function change(){
        $type = input('type');
        $content = input('content');
        $dist = db('distributor');
        if($type == 1){
            $data = ['nikename'=>$content];
            $re = $dist->where('id',session('did'))->update($data);
            $user = $dist->where('id',session('did'))->field('nikename')->find();
            $list = $user['nikename'];
        }else{
            $data = ['tel'=>$content];
            $re = $dist->where('id',session('did'))->update($data);
            $user = $dist->where('id',session('did'))->field('tel')->find();
            $list = $user['tel'];
        }
        if($re !== false){
            return json(['code' => 1, 'msg' => '修改成功!','list'=>$list,'type'=>$type]);
        }else{
            return json(['code' => 0, 'msg' => '修改失败!']);
        }
    }
    //修改密码一
    public function changePwd(){
        $data = input('post.');
        $result = $this->validate($data, [
            'oldpwd|旧密码'  => ['require','max:15','min:6'],
            'newpwd|新密码'  => ['require','max:15','min:6'],
        ]);
        if(true !== $result){
            // 验证失败 输出错误信息
            return json(['code'=>0, 'msg'=>$result,]);
        }
        $user = db('distributor')->where('id',session('did'))->where('pwd',md5($data['oldpwd']))->find();
        if($user){
            $pwd = ['pwd'=>md5($data['newpwd'])];
            $re = db('distributor')->where('id',session('did'))->update($pwd);
            if($re !== false){
                return json(['code' => 1, 'msg' => '修改成功!']);
            }else{
                return json(['code' => 0, 'msg' => '修改失败!']);
            }
        }else{
            return json(['code' => 0, 'msg' => '您输入的旧密码不正确!']);
        }
    }
    //验证码
    public function checkCode(){
        $data = input('post.');
        $result = $this->validate($data, [
            'code|验证码'=>['require']
        ]);
        if(true !== $result){
            // 验证失败 输出错误信息
            return json(['code'=>0, 'msg'=>$result,]);
        }
        $codeArr=session('codeArr');
        if($data['code'] == '' || $data['code'] != $codeArr['pcode']) {
            return json(['code' => 0, 'msg' => '验证码不正确，请重新输入!']);
        }else{
            return json(['code' => 1, 'msg' => '验证码正确!']);
        }
    }
    //修改密码二
    public function changePwdTwo(){
        $data = input('post.');
        $result = $this->validate($data, [
            'password|密码'  => ['require','max:15','min:6','confirm'],
        ]);
        if(true !== $result){
            // 验证失败 输出错误信息
            return json(['code'=>0, 'msg'=>$result,]);
        }
        $pwd = ['pwd'=>md5($data['password'])];
        $re = db('distributor')->where('id',session('did'))->update($pwd);
        if($re !== false){
            return json(['code' => 1, 'msg' => '修改成功!']);
        }else{
            return json(['code' => 0, 'msg' => '修改失败!']);
        }
    }


}