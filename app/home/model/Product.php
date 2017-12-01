<?php

namespace app\home\model;

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
        $name=(new ProductImg)->where('model',$value)->value('name');
        return [
            'model'=>$value,
            'img'=>$img,
            'name'=>$name
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

    public function getZoneAttr($value){
        $p=Region::get($value);
        return [
            'id'=>$value,
            'name'=>$p['name']
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
        $url="http://mobile.archie.com.cn/Interface/getRepairDate?sid=".$produce['sid']."&MODEL_VIP_CODE=".$param['code'];
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
            'sid'=>$produce['sid'],
            'phone'=>$produce['phone'],
            'phone2'=>$produce['phone2'],
            'status'=>$status
        ];
        return $this->add($data);
    }

    public function get_pro_zd($param){
        //查询产品
        try{
            $url="http://mobile.archie.com.cn/Interface/getPrdtBarcode?CUST_TEL=".$param;
            $res=get_curl_contents($url);
            $res_data=json_decode($res,true);

            foreach($res_data['result'] as $k=>$v){
                $pro=$this::get(['model_vip_code'=>$v['MODEL_VIP_CODE']]);
                if($pro){
                    continue;
                }
                //查询是否在保修期内
                $url="http://mobile.archie.com.cn/Interface/getRepairDate?sid=".$v['sid']."&MODEL_VIP_CODE=".$v['MODEL_VIP_CODE'];
                $res=get_curl_contents($url);
                $res_datas=json_decode($res,true);

                $barcode=$res_datas['result'][0];
                $status=0;
                if(strtotime($barcode['REPAIR_DATE'])<time())$status=-1;
                $data=[
                    'client_id'=>UID,
                    'model_vip_code'=>$v['MODEL_VIP_CODE'],
                    'model'=>$v['MODEL'],
                    'barcode'=>$v['BARCODE'],
                    'sale_date'=>$v['SALE_DATE'],
                    'sale_oulets'=>$v['SALE_OULETS'],
                    'cust_tel'=>$v['CUST_TEL'],
                    'cust_name'=>$v['CUST_NAME'],
                    'cust_addr'=>$v['CUST_ADDR'],
                    'province'=>$v['PROVINCE'],
                    'city'=>$v['CITY'],
                    'zone'=>$v['ZONE'],
                    'mater'=>$v['MATER'],
                    'direct'=>$v['DIRECT'],
                    'setup_op'=>$v['SETUP_OP'],
                    'stick'=>$v['stick'],
                    'sample'=>$v['sample'],
                    'sid'=>$v['sid'],
                    'phone'=>$v['phone'],
                    'phone2'=>$v['phone2'],
                    'status'=>$status
                ];
                $this->add($data);
            }
        }catch(Exception $e){

        }
    }

}
