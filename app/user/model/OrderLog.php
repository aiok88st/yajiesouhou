<?php

namespace app\user\model;

use think\Exception;
use think\Model;
use app\common\upload\Upload;
use app\admin\model\Admin;
class OrderLog extends Model
{
    //
    protected $pk = 'id';
    protected $table = 'clt_order_log';
    protected $field = [
        'order_id','admin_type','admin_id','content'
    ];
    public function getAdminIdAttr($value){
        if($this->admin_type==2){
            $dis=Distributor::get($value);
            return $dis['nikename'];
        }else{
            $admin= Admin::get($value);
            return $admin['username'];
        }
    }
}
