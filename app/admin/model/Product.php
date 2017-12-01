<?php

namespace app\admin\model;

use think\Exception;
use think\Model;

class Product extends Model
{
    //
    protected $pk = 'id';
    protected $table = 'clt_product';
    protected $field = [
        'client_id','model_vip_code','model','barcode','sale_date','sale_oulets',
        'cust_tel','cust_name','cust_addr','province','city','zone','mater','direct',
        'setup_op','stick','sample','add_time','sid','phone','phone2'
    ];
    protected $insert=['add_time'];
    public function setAddTimeAttr(){
        return date('Y-m-d H:i:s');
    }
    public function setProvinceAttr($value)
    {
        $name=str_replace('省','',$value);
        $pid=(new Region)->where('name','LIKE',"%{$name}%")->value('id');
        return $pid;
    }
    public function setCityAttr($value)
    {
        $name=str_replace(['市','自治区'],'',$value);
        $pid=(new Region)
            ->where('pid',$this->province)
            ->where('name','LIKE',"%{$name}%")
            ->value('id');
        return $pid;
    }
    public function setZoneAttr($value)
    {
        $name=str_replace(['县','区'],'',$value);
        $pid=(new Region)
            ->where('pid',$this->city)
            ->where('name','LIKE',"%{$name}%")
            ->value('id');
        return $pid;
    }
    public function getModelAttr($value)
    {
        $img=(new ProductImg)->where('model',$value)->value('img');
        return [
            'model'=>$value,
            'img'=>$img
        ];
    }

}
