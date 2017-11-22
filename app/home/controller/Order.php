<?php
namespace app\home\controller;
use think\Controller;
use think\Request;
use think\Session;
use think\Db;
class Order extends Controller
{
    public function _initialize()
    {
        parent::_initialize();
    }

    public function getList($where){
        $data=Db::table(config('database.prefix').'order')
            ->where('user_id',session('did'))
            ->where($where)
            ->order("add_time desc")
            ->paginate(10)
            ->toArray();
        $list= $data['data'];
        $arr = [
            'list'=>$list,
            'current_page'=>$data['current_page'],
            'last_page'=>$data['last_page'],
        ];
        return $arr;
    }

    public function index(){
        $status = input('status');
        $where['status']=['=',$status];
        $order = $this-> getList($where);

        return $this->fetch();
    }




    public function detail(){
        $url = "http://mobile.archie.com.cn/Interface/getPrdtBarcode?MODEL_VIP_CODE=174FD893";
        $data = json_decode(get_curl_contents($url, 'POST', []),true);
        var_dump($data);
    }
}