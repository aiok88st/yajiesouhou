<?php
namespace app\admin\controller;
use think\Db;
use clt\Leftnav;
use app\admin\model\Distributor as DistributorModel;
use think\Validate;
class Distributor extends Common
{
    public function getList($key,$where,$page,$pageSize){
        $map = '';
        if ($key) {
            $map['username|tel|nikename'] = array('like', "%" . $key . "%");
        }
        $list = Db::table(config('database.prefix') .'distributor')
            ->where($map)
            ->where($where)
            ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
            ->toArray();
        foreach ($list['data'] as $k=>$v ){
            $list['data'][$k]['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
        }
        return $list;
    }

    //经销商列表
    public function lists() {
        if (request()->isPost()) {
            $key = input('key');
            $page =input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $where['pid'] = ['=',0];
            $list = $this->getList($key,$where,$page,$pageSize);
            return $result = ['code' => 0, 'msg' => '获取成功!', 'data' => $list['data'], 'rel' => 1,'count'=>$list['total']];
        }
        return $this->fetch('list');
    }
    //分销商列表
    public function list2(){
        if (request()->isPost()) {
            $key = input('key');
            $page =input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $where['pid'] = ['>',0];
            $list = $this->getList($key,$where,$page,$pageSize);
            foreach($list['data'] as $k=>$v){
                $list[$k]['pname'] = db('distributor')->where('id',$v['pid'])->field('username')->find();
            }
            return $result = ['code' => 0, 'msg' => '获取成功!', 'data' => $list['data'], 'rel' => 1,'count'=>$list['total']];
        }
        return $this->fetch();
    }

    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $result = $this->validate($data, [
                'username|账号名'  => ['require'],
                'pwd|密码'  => ['require','max:15','min:6'],
                'nikename|姓名'  => ['require'],
                'tel|手机号码' => ['require', "regex:/^1[34578]{1}[0-9]{9}$/"],
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return json(['code'=>0, 'msg'=>$result,]);
            }
            if($data['pid'] != 0){
                $url = url('list2');
            }else{
                $url = url('lists');
            }

            $check_user = DistributorModel::get(['username' => $data['username']]);
            if ($check_user) {
                return $result = ['code' => 0, 'msg' => '账号已存在，请重新输入账号名!'];
            }
            $data['pwd'] = input('post.pwd', '', 'md5');
            $data['add_time'] = time();
            $data['ip'] = request()->ip();
            //添加
            if (DistributorModel::create($data)) {
                return ['code' => 1, 'msg' => '添加成功!', 'url' => $url];
            } else {
                return ['code' => 0, 'msg' => '添加失败!'];
            }
        } else {
            $p = db('distributor')->where('pid',0)->select();
            $this->assign('p',$p);
            $this->assign('title', lang('add') . lang('客户'));
            return $this->fetch('add');
        }
    }

    //删除管理员
    public function adminDel()
    {
        $id = input('post.id');
        DistributorModel::destroy(['id' => $id]);
        return $result = ['code' => 1, 'msg' => '删除成功!'];
    }

    //修改管理员状态
    public function adminState()
    {
        $id = input('post.id');
        if (empty($id)) {
            $result['status'] = 0;
            $result['info'] = '用户ID不存在!';
            $result['url'] = url('lists');
            exit;
        }
        $status = db('distributor')->where('id=' . $id)->value('is_open');//判断当前状态情况
        if ($status == 1) {
            $data['is_open'] = 0;
            db('distributor')->where('id=' . $id)->update($data);
            $result['status'] = 1;
            $result['open'] = 0;
        } else {
            $data['is_open'] = 1;
            db('distributor')->where('id=' . $id)->update($data);
            $result['status'] = 1;
            $result['open'] = 1;
        }
        return $result;
    }

    //更新管理员信息
    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $result = $this->validate($data, [
                'username|账号名'  => ['require'],
                'nikename|姓名'  => ['require'],
                'tel|手机号码' => ['require', "regex:/^1[34578]{1}[0-9]{9}$/"],
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return json(['code'=>0, 'msg'=>$result,]);
            }
            $pwd = input('post.pwd');
            $map['id'] = array('neq', input('post.id'));
            $where['id'] = input('post.id');
            if($data['pid'] != 0){
                $url = url('list2');
            }else{
                $url = url('lists');
            }
            if (input('post.username')) {
                $map['username'] = input('post.username');
                $check_user = DistributorModel::get($map);
                if ($check_user) {
                    return $result = ['code' => 0, 'msg' => '账号已存在，请重新输入账号名!'];
                }
            }
            if ($pwd) {
                $data['pwd'] = input('post.pwd', '', 'md5');
            } else {
                unset($data['pwd']);
            }
            DistributorModel::update($data);
            return $result = ['code' => 1, 'msg' => '修改成功!', 'url' => $url];
        } else {
            $p = db('distributor')->where('pid',0)->select();
            $this->assign('p',$p);
            $info = DistributorModel::get(['id' => input('id')]);
            $this->assign('info', $info->toJson());
            $this->assign('title', lang('edit') . lang('客户'));
            return view('edit');
        }
    }
    //批量删除
    public function delAll(){
        $map['id'] =array('in',input('param.ids/a'));
        $model = db('distributor');
        $model->where($map)->delete();
        $result['code'] = 1;
        $result['msg'] = '删除成功！';
        return $result;
    }


}