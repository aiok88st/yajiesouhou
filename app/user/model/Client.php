<?php

namespace app\user\model;

use think\Model;

class Client extends Model
{
    //
    protected $pk = 'id';
    protected $table = 'clt_client';
    protected $field = ['open_id','open_name','open_face','province','city','area','name','phone'];

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
