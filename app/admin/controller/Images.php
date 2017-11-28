<?php
namespace app\admin\controller;
use think\Db;
use think\Request;
use clt\Leftnav;
use think\Validate;
class Images extends Common
{
    public function index() {
        if (request()->isPost()){
            $key = input('key');
            if ($key) {
                $map['model'] = array('like', "%" . $key . "%");
            }
            $page =input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $list = db('product_img')
                ->where($map)
                ->order('add_time desc')
                ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
                ->toArray();
            $lists = $list['data'];
            return $result = ['code' => 0, 'msg' => '获取成功!', 'data' => $lists, 'rel' => 1,'count'=>$list['total']];
        }
        return $this->fetch();
    }
    public function add(){
        if (request()->isPost()){
            $data = input('post.');
            $result = $this->validate($data, [
                'model|产品型号'  => ['require'],
                'name|产品名称'  => ['require'],
                'img|产品图片'  => ['require'],
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return json(['code'=>0, 'msg'=>$result,]);
            }
            $data['add_time']=date('Y-m-d H:i:s',time());
            $re = db('product_img')->insert($data);
            if($re){
                return ['code' => 1, 'msg' => '添加成功!', 'url' => url('index')];
            }else{
                return ['code' => 0, 'msg' => '添加失败!'];
            }
        }
        return $this->fetch();
    }

    public function edit(){
        $img = db('product_img')->where('id',input('id'))->find();
        $this->assign('img',$img);
        return $this->fetch();
    }

    public function update(){
        $data = input('post.');
        $result = $this->validate($data, [
            'model|产品型号'  => ['require'],
            'name|产品名称'  => ['require'],
            'img|产品图片'  => ['require'],
        ]);
        if(true !== $result){
            // 验证失败 输出错误信息
            return json(['code'=>0, 'msg'=>$result,]);
        }
        $product = db('product_img')->where('id',$data['id'])->find();
        if($data['img'] != ''){
            $arr['img']=$data['img'];
        }else{
            $arr['img']=$product['img'];
        }
        $arr['name']=$data['name'];
        $arr['model']=$data['model'];
        $re = db('product_img')->where('id',$data['id'])->update($arr);
        if($re!==false){
            return ['code' => 1, 'msg' => '修改成功!', 'url' => url('index')];
        }else{
            return ['code' => 0, 'msg' => '修改失败!'];
        }
    }

    //删除
    public function listDel(){
        $id = input('id');
        $re = db('product_img')->where('id',$id)->delete();
        if($re){
            return $result = ['code' => 1, 'msg' => '删除成功!'];
        }else{
            return $result = ['code' => 0, 'msg' => '删除失败!'];
        }
    }


    //批量删除
    public function delAll(){
        $map['id'] =array('in',input('param.ids/a'));
        $model = db('product_img');
        $model->where($map)->delete();
        $result['code'] = 1;
        $result['msg'] = '删除成功！';
        $result['url'] = url('lists');
        return $result;
    }
}