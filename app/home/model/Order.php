<?php

namespace app\home\model;

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
        'status','add_time'
    ];
    protected $insert=['add_time'];
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
    public function setAddTimeAttr(){
        return date('Y-m-d H:i:s');
    }
    public function setImagesAttr($value)
    {
        $data=[];
        $Upload=new Upload;
        if(!empty($value)){
            foreach ($value as $key=>$v){
                if(!strstr($v,'upload')){
                    $imglink=$Upload->base2img($v);
                    array_push($data,$imglink);
                }else{
                    array_push($data,$v);
                }
            }
        }
       return serialize($data);
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

    public function setUserIdAttr($value){
        $network = new Network();
        $id = $network->where('tel',$value)->value('id');
        if($id){
            return $id;
        }else{
            return '';
        }
    }

    public function getProIdAttr($value)
    {
        $pro=Product::get($value);
        return [
            'id'=>$value,
            'name'=>$pro['model']['model'],
            'img'=>$pro['model']['img'],
            'title'=>$pro['model']['name'],
            'repair_date'=>$pro['repair_date'],
            'sale_oulets'=>$pro['sale_oulets'],
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

    //改变产品表状态
    public function changeS($cid){
        $ps['status']=1;
        $pid=(new Product)->where('id',$cid)->update($ps);
    }


    public function add($param){
        try{
            //先去查询是否已经申请过
            $pro=$this->where('pro_id',$param['pro_id'])->count();
            if($pro>=1) return rejson(0,'请不要重复申请',false);

            $result=$this->allowField(true)->validate($this->veri)->save($param);
            if(false === $result){
                // 验证失败 输出错误信息
                return rejson(0,$this->getError(),true);
            }
            $this->changeS($param['pro_id']);
            return rejson(1,'申请成功，请耐心等待审核',true,url('client/Order/index'));
        }catch (Exception $e){
            return rejson(0,$e->getMessage(),true);
        }
    }

}
