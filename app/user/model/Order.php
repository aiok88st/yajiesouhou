<?php

namespace app\user\model;

use think\Exception;
use think\Model;
use app\common\upload\Upload;
class Order extends Model
{
    //
    protected $pk = 'id';
    protected $table = 'clt_order';
    protected $field = [
        'client_id','pro_id','type','name','phone','province','city','zone','addra','msg',
        'status','audit','user_id'
    ];
    protected $veri=[
        'client_id|用户ID'   => 'require',
        'pro_id|产品ID'   => 'require',
        'type|售后类型'   => 'require|in:1,2',
        'name|姓名'   => 'require|max:100',
        'phone|手机号码'   => 'require|regex:/^1[34578]\d{9}$/',
        'province|省份'=>'require',
        'city|城市'=>'require',
        'zone|区/县'=>'require',
        'addra|详细地址'=>'require|max:255',
        'msg|问题描述'=>'require|min:10',
    ];

    public function getProIdAttr($value)
    {
        $pro=Product::get($value);
        return [
            'id'=>$value,
            'name'=>$pro['model']['model'],
            'img'=>$pro['model']['img']
        ];
    }
    public function getTypeAttr($value){
        $attr=[
            1=>'快递到维修点',
            2=>'上门服务'
        ];
        return ['id'=>$value,'name'=>$attr[$value]];
    }
    public function getProvinceAttr($value){
        $p=Region::get($value);
        return [
            'id'=>$value,
            'name'=>$p['name']
        ];
    }
    public function getCityAttr($value){
        $p=Region::get($value);
        return [
            'id'=>$value,
            'name'=>$p['name']
        ];
    }

    public function getZoneAttr($value){
        $p=Region::get($value);
        return [
            'id'=>$value,
            'name'=>$p['name']
        ];
    }
    public function getUserIdAttr($value){
        $dis=Network::get($value);
        return [
            'shopame'=>$dis['title'],
            'dis'=>$dis['did'],
        ];
    }
    public function getStatusAttr($value){
        $status=[
            '-1'=>'审核不通过',
            '0'=>'审核中',
            '1'=>'待维修',
            '2'=>'维修中',
            '3'=>'已完成',
        ];
        return [
            'id'=>$value,
            'name'=>$status[$value]
        ];
    }

}
