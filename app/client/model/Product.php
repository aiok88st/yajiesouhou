<?php

namespace app\client\model;

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
        'setup_op','stick','sample'
    ];
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

    protected function add($data){
        try{
            $this->allowField(true)->save($data);
            return rejson(1,'产品添加成功',true);
        }catch (Exception $e){
            return rejson(0,$e->getMessage(),true);
        }
    }
    public function get_pro($param){
        //查询产品
        $url="http://mobile.archie.com.cn/Interface/getPrdtBarcode?MODEL_VIP_CODE=".$param['code'];
        $res=get_curl_contents($url);
        $res_data=json_decode($res,true);
        if($res_data['state']!='true')return rejson(0,$res_data['msg'],true);
        if(empty($res_data['result']))return rejson(0,'找不到您要添加的产品',true);
        $client=Client::get(UID);
        $produce=$res_data['result'][0];
        if($produce['CUST_TEL']!=$client->phone)return rejson(0,'找不到您要添加的产品',true);
        $pro=$this::get(['model_vip_code'=>$param['code']]);
        if($pro) return rejson(0,'请不要重复添加同一件产品',true);
        //查询是否在保修期内
        $url="http://drp.archiehardware.com/Interface/getRepairDate?MODEL_VIP_CODE=".$param['code'];
        $res=get_curl_contents($url);
        $res_data=json_decode($res,true);
        if($res_data['state']!='true')return rejson(0,$res_data['msg'],true);
        if(empty($res_data['result']))return rejson(0,'找不到您要添加的产品',true);
        $barcode=$res_data['result'][0];
        $status=0;
        if(strtotime($barcode['REPAIR_DATE'])<time())$status=-1;
        $data=[
            'client_id'=>UID,
            'model_vip_code'=>$produce['MODEL_VIP_CODE'],
            'model'=>$produce['MODEL'],
            'barcode'=>$produce['BARCODE'],
            'sale_date'=>$produce['SALE_DATE'],
            'sale_oulets'=>$produce['SALE_OULETS'],
            'cust_tel'=>$produce['CUST_TEL'],
            'cust_name'=>$produce['CUST_NAME'],
            'cust_addr'=>$produce['CUST_ADDR'],
            'province'=>$produce['PROVINCE'],
            'city'=>$produce['CITY'],
            'zone'=>$produce['ZONE'],
            'mater'=>$produce['MATER'],
            'direct'=>$produce['DIRECT'],
            'setup_op'=>$produce['SETUP_OP'],
            'stick'=>$produce['stick'],
            'sample'=>$produce['sample'],
            'status'=>$status
        ];

        return $this->add($data);
    }
}