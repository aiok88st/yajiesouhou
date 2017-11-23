<?php

namespace app\user\model;

use think\Model;

class Network extends Model
{
    //
    protected $pk = 'id';
    protected $table = 'clt_network';
    public function getDidAttr($value){
        $did=(new Distributor)->where('id',$value)->field('nikename')->find();
        return [
            'id'=>$value,
            'name'=>$did['nikename']
        ];
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
    public function getAreaAttr($value){
        $p=Region::get($value);
        return [
            'id'=>$value,
            'name'=>$p['name']
        ];
    }
}
