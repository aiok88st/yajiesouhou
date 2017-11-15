<?php
namespace app\home\controller;
use think\Controller;
use app\home\controller\Fater;
use think\Request;
use think\Db;
class Index extends Fater
{
    public function _initialize(){
        parent::_initialize();
    }

    public function index(){
        $province = db('region')->where('pid',1)->select();
        $this->assign('area',json_encode([1]));
        $this->assign('province',$province);

        $this->assign('locate',json_encode([]));
        return $this->fetch('webShop');
    }
    public function getRegion(Request $request){
        $param=$request->param();
        $p=str_replace('省','',$param['province']);
        $c=str_replace('市','',$param['city']);
        $pid=db('region')->where('name',$p)->value('id');
        $cpid=db('region')->where('name',$c)->where('pid',$pid)->value('id');
        $region=db('region')->where('name',$param['district'])->where('pid',$cpid)->value('id');

        $url=url('index/webShop')."?region=".$region."&city=".$c."&lats=".$param['lats']."&longs=".$param['longs'];
        $this->redirect($url);
    }
    //获取地理位置
    public function getJs(){
        $wxapi=new \org\Wxapi;
        $url=$_SERVER['HTTP_REFERER'];
        $data = $wxapi->getSignPackage($url);
        return $data;
    }

    //省市区三级联动
    public function getAddrs(){
        $list = getLocation('region',input('pid'),input('type'));
        return json($list);
    }
    //搜索
    public function sousuo(){
        $data = [
            'province'=>input('province'),
            'city'=>input('cy'),
            'area'=>input('area'),
        ];
        $this->assign('locate',json_encode($data));
        return $this->fetch('webShop');
    }

    //售后网点
    public function webShop(){
        $data = [
            'province'=>input('pro'),
            'city'=>input('city'),
            'area'=>input('ar'),
        ];
        $this->assign('locate',json_encode($data));

        $city = input('city');
        $lats = input('lats');
        $longs = input('longs');
        $regionId = input('region');

        $region=db('region')->where('id',$regionId)->field('type,pid')->find();
        $net = db('network');
        $order = "listorder asc";
        switch($region['type']){
            case 3:
                $type=3;
                $map['area']=['=',$regionId];
                $area =$this->getNetwork($map,$order);
                break;
            case 2:
                $type=2;
                $map['city']=['=',$regionId];
                $area =$this->getNetwork($map,$order);
                break;
            case 1:
                $type=1;
                $map['province']=['=',$regionId];
                $area =$this->getNetwork($map,$order);
                break;
            case 0:
                $area = '';
                break;
        }
        foreach($area as $k=>$v){
            $latlng=explode(',',$v['location']);
            $area[$k]['distance'] = getDistance($longs,$lats,$latlng[1],$latlng[0],2);
        }
        $this->assign('pid',$region['pid']);
        $this->assign('areas',$area);
        $this->assign('area',json_encode($area));
        $this->assign('city',$city);
        $this->assign('type',$type);
        $this->assign('lats',$lats);
        $this->assign('longs',$longs);
        return $this->fetch('webShop');
    }

    public function shopList(Request $request){
        $param=$request->param();
        $p=str_replace('省','',$param['province']);
        $c=str_replace('市','',$param['city']);
        $this->assign('p',$p);
        $this->assign('c',$c);
        $this->assign('d',$param['area']);
        $this->assign('latitude',$param['latitude']);
        $this->assign('longitude',$param['longitude']);
        $province = db('region')->where('pid',1)->select();
        $this->assign('province',$province);
        return $this->fetch('webShopList');
    }


}
