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
            $page =input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $list = db('product_img')
                ->order('add_time desc')
                ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
                ->toArray();
            $lists = $list['data'];
            return $result = ['code' => 0, 'msg' => '获取成功!', 'data' => $lists, 'rel' => 1,'count'=>$list['total']];
        }
        return $this->fetch();
    }

    public function edit(){
        $img = db('product_img')->where('id',input('id'))->find();
        $this->assign('img',$img);
        return $this->fetch();
    }

    public function update(){
        $id = input('id');
        $img = input('img');
        $product = db('product_img')->where('id',$id)->find();
        if($img != ''){
            $data['img']=$img;
        }else{
            $data['img']=$product['img'];
        }
        $re = db('product_img')->where('id',$id)->update($data);
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