<?php
namespace app\user\controller;
use think\Db;
use think\Exception;
use think\Request;
use think\Controller;
use app\user\model\Network as NetworkModel;
class Network extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }

    public function index(Request $request,NetworkModel $network){
        $key=$request->param('key','');
        if($key) {
            $map['title|tel'] = array('like', "%" . $key . "%");
        }
        $data=$network->where($map)->where('did',session('sid'))->order('id desc')->paginate(12);
        $page = $data->render();//获取分页
        $list = $data->all();//获取数组;
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();
    }

    public function add(NetworkModel $network){
        if (request()->isPost()) {
            $data = input('post.');
            $result = $this->validate($data, [
                'title|门店名'  => ['require'],
                'tel|电话'  => ['require'],
                'province|省'  => ['require'],
                'city|市' => ['require'],
                'area|区' => ['require'],
                'addr|详细地址' => ['require'],
                'location|经纬度' => ['require'],
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return json(['code'=>0, 'msg'=>$result,]);
            }
            $tel = db('network')->where('tel',$data['tel'])->value('tel');
            if($tel){
                return ['msg'=>'该号码已经存在','code'=>0];
            }

            $data['did'] = session('sid');
            $data['createtime'] = time();
            $re = db('network')->insert($data);
            if($re){
                return json(['code' => 1, 'msg' => '添加成功!','url'=>url('index')]);
            }else{
                return json(['code' => 0, 'msg' => '添加失败!']);
            }
        }
        $province = db('region')->where('pid',1)->select();
        $this->assign('province',$province);
        return $this->fetch();
    }

    public function edit(NetworkModel $network){
        $id = input('id');
        if (request()->isPost()) {
            $data = input('post.');
            $result = $this->validate($data, [
                'title|门店名'  => ['require'],
                'tel|电话'  => ['require',],
                'province|省'  => ['require'],
                'city|市' => ['require'],
                'area|区' => ['require'],
                'addr|详细地址' => ['require'],
                'location|经纬度' => ['require'],
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return json(['code'=>0, 'msg'=>$result,]);
            }

            $data['updatetime'] = time();
            $re = db('network')->update($data);
            if($re){
                return json(['code' => 1, 'msg' => '修改成功!','url'=>url('index')]);
            }else{
                return json(['code' => 0, 'msg' => '修改失败!']);
            }
        }
        $info = $network::get($id);
        $this->assign('info',$info);
        $province = db('region')->where('pid',1)->select();
        $this->assign('province',$province);
        return $this->fetch();
    }

    //删除
    public function listDel(){
        $id = input('id');
        $re = db('network')->where('id',$id)->delete();
        if($re){
            return $result = ['code' => 1, 'msg' => '删除成功!'];
        }else{
            return $result = ['code' => 0, 'msg' => '删除失败!'];
        }
    }

    //省市区三级联动
    public function getAddrs(){
        $list = getLocation('region',input('pid'),input('type'));
        echo json_encode($list);
    }
}