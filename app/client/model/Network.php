<?php

namespace app\client\model;

use think\Model;

class Network extends Model
{
    //
    protected $pk = 'id';
    protected $table = 'clt_network';
    protected $field = ['title','tel','addr','province','city','area','location','did'];

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
