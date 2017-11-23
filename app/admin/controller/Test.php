<?php
namespace app\admin\controller;
use think\Db;
use think\Request;
use clt\Leftnav;
use app\admin\model\Test as TestModel;
use think\Validate;
class Test extends Common
{
    public function index() {
        if (request()->isPost()){
            $key = input('key');
            $page =input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $map = '';
            if ($key) {
                $map['title|f_title'] = array('like', "%" . $key . "%");
            }
            $list = db('test')
                ->where($map)
                ->order('createtime desc')
                ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
                ->toArray();
            $lists = $list['data'];
            foreach ($lists as $k=>$v ){

                $lists[$k]['pnum'] = db('utest')->where('tid',$v['id'])->group('uid')->count();
                $lists[$k]['pass'] = db('utest')->where('tid',$v['id'])->where('score','>=','60')->group('uid')->count();
                $lists[$k]['fail'] = db('utest')->where('tid',$v['id'])->where('score','<','60')->group('uid')->count();

                $lists[$k]['createtime'] = date('Y-m-d H:i:s',$v['createtime']);
            }

            return $result = ['code' => 0, 'msg' => '获取成功!', 'data' => $lists, 'rel' => 1,'count'=>$list['total']];
        }
        return $this->fetch();
    }


    public function add(Request $request)
    {
        if (request()->isPost()) {
            $tests = $request->param();
            $result = $this->validate(
                $tests,
                ['title|标题' => 'require', 'content|题目' => 'require','f_title|期数' => 'require',]);
            if (true !== $result) {
                // 验证失败 输出错误信息
                return json(['code' => 0, 'msg' => $result,]);
            }
            $data = [
                'title'=>$tests['title'],
                'f_title'=>$tests['f_title'],
                'content'=>json_encode($tests['content']),
                'createtime'=>time(),
            ];
            $re = db('test')->insert($data);
            if($re){
                return ['code' => 1, 'msg' => '添加成功!', 'url' => url('index')];
            }else{
                return ['code' => 0, 'msg' => '添加失败!'];
            }

        } else {
            $this->assign('title', lang('add') . lang('试题'));
            return view('add');
        }
    }


    public function edit(Request $request){
        if (request()->isPost()) {
            $tests = $request->param();
            $result = $this->validate(
                $tests,
                ['title|标题' => 'require', 'content|题目' => 'require','f_title|期数' => 'require',]);
            if (true !== $result) {
                // 验证失败 输出错误信息
                return json(['code' => 0, 'msg' => $result,]);
            }
            $tests['content'] = json_encode($tests['content']);
            $re = db('test')->update($tests);
            if($re !== false){
                return ['code' => 1, 'msg' => '修改成功!', 'url' => url('index')];
            }else{
                return ['code' => 0, 'msg' => '修改失败!'];
            }

        }else {
            $info = TestModel::get(['id' => input('id')]);
            $info = $info->toArray();
            $content = json_decode($info['content'],true);
            $this->assign('info',$info);
            $this->assign('content',$content);
            $this->assign('title', lang('edit') . lang('试题'));
            return view('edit');
        }
    }

    //删除
    public function listDel(){
        $id = input('id');
        $re = db('test')->where('id',$id)->delete();
        if($re){
            return $result = ['code' => 1, 'msg' => '删除成功!'];
        }else{
            return $result = ['code' => 0, 'msg' => '删除失败!'];
        }
    }


    //批量删除
    public function delAll(){
        $map['id'] =array('in',input('param.ids/a'));
        $model = db('test');
        $model->where($map)->delete();
        $result['code'] = 1;
        $result['msg'] = '删除成功！';
        $result['url'] = url('lists');
        return $result;
    }



}