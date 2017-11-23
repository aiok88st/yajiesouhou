<?php

namespace app\client\model;

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


    public function setUserIdAttr($value){
        $network = new Network();
        $id = $network->where('tel',$value)->value('id');
        if($id){
            return $id;
        }else{
            return '';
        }
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

            return rejson(0,'申请成功，请耐心等待审核',true);
        }catch (Exception $e){
            return rejson(0,$e->getMessage(),true);
        }
    }
}
