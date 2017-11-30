<?php
namespace app\home\model;
use think\Model;
class Club extends Model
{
    protected $pk = 'id';
    protected $table = 'clt_club';
    protected $field = ['client_id', 'did', 'add_time'];

    public function setAddTimeAttr(){
        return date('Y-m-d H:i:s');
    }

    public function add($param){
        try{
            //先去查询是否添加过
            $club=$this->where('client_id',$param['client_id'])->where('did',$param['did'])->find();
            if(!$club){
                $this->allowField(true)->save($param);
            }

        }catch (Exception $e){

        }
    }



}