<?php
namespace app\user\controller;
use think\Controller;
use think\Db;
use think\Input;
use think\Request;
use app\user\model\Distributor;
class Distrit extends Common
{
    public function _initialize(){
        parent::_initialize();
    }

    public function index(){
        $name = input('key');
        $where = array();
        if($name){
            $where['username|tel'] = array('like', "%$name%");
        }
        $data = Db::name('distributor')->where($where)->where('pid',session('sid'))->order("add_time desc")->paginate(12);
        $page = $data->render();//获取分页
        $list = $data->all();//获取数组;
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();
    }

    //添加分销商
    public function add(){
        if (request()->isPost()) {
            $data = input('post.');
            $result = $this->validate($data, [
                'username|用户名'  => ['require'],
                'password|密码'  => ['require','max:15','min:6','confirm'],
                'tel|手机号码' => ['require', "regex:/^1[34578]{1}[0-9]{9}$/"],
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return json(['code'=>0, 'msg'=>$result,]);
            }
            $check_user = Distributor::get(['username' => $data['username']]);
            if ($check_user) {
                return $result = ['code' => 0, 'msg' => '用户已存在，请重新输入用户名!'];
            }
            $user = [
                'username'=>$data['username'],
                'pwd'=>md5($data['password']),
                'ip'=>request()->ip(),
                'add_time'=>time(),
                'is_open'=>0,
                'pid'=>session('sid'),
                'tel'=>$data['tel'],
            ];
            $re = db('distributor')->insert($user);
            if($re){
                return json(['code' => 1, 'msg' => '添加成功!']);
            }else{
                return json(['code' => 0, 'msg' => '添加失败!']);
            }
        }
        return $this->fetch();
    }
}