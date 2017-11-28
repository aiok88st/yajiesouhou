<?php

namespace app\client\model;

use think\Model;

class Client extends Model
{
    //
    protected $pk = 'id';
    protected $table = 'clt_client';
    protected $field = ['open_id','open_name','open_face','province','city','zone','area','name','phone'];

    public function setProvinceAttr($value)
    {
        $name=str_replace('省','',$value);
        $pid=(new Region)->where('name','LIKE',"%{$name}%")->value('id');
        return $pid;
    }
    public function setCityAttr($value)
    {
        $name=str_replace(['市','自治区'],'',$value);
        $province=$this->province;
        $pid=(new Region)
            ->where('pid',$province['id'])
            ->where('name','LIKE',"%{$name}%")
            ->value('id');
        return $pid;
    }
    public function setAreaAttr($value)
    {
        $city=$this->city;
        $pid=(new Region)
            ->where('pid',$city['id'])
            ->where('name','LIKE',"%{$value}%")
            ->value('id');
        return $pid;
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
