<?php

namespace app\admin\model;

use think\Model;

class Network extends Model
{
    //
    protected $pk = 'id';
    protected $table = 'clt_network';
    public function getDidAttr($value){
        $did=(new Distributor)->where('id',$value)->field('nickname')->find();
        return [
            'id'=>$value,
            'name'=>$did['name']
        ];
    }
}
