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

    public function index(){
        $url = "http://mobile.archie.com.cn/Interface/getRepairDate?CUST_TEL=13556071153";
        $data = json_decode(get_curl_contents($url, 'POST', []),true);
        var_dump($data) ;
    }

    public function detail(){
        $url = "http://mobile.archie.com.cn/Interface/getPrdtBarcode?MODEL_VIP_CODE=174FD893";
        $data = json_decode(get_curl_contents($url, 'POST', []),true);
        var_dump($data);
    }
}