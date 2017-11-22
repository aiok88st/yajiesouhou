<?php

namespace app\admin\model;

use think\Exception;
use think\Model;
use app\common\upload\Upload;
class OrderLog extends Model
{
    //
    protected $pk = 'id';
    protected $table = 'clt_order_log';
    protected $field = [
        'order_id','admin_type','admin_id','content'
    ];
    public function getAdminIdAttr($value){
        if($this->admin_type==1){
           $admin= Admin::get($value);
           return $admin['username'];
        }else{
           $dis=Distributor::get($value);
           return $dis['nikename'];
        }
    }
}
?>