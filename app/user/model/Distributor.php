<?php
namespace app\user\model;
use think\Model;
class Distributor extends Model
{
    protected $pk = 'id';
    protected $table = 'clt_distributor';
    protected $field = ['username','nikename','tel','add_time','pid','ip','is_open'];

    public function login($data){
        $url="http://mobile.archie.com.cn/Interface/getDealerOrDistributorBaseMsg?UserName=".$data['username']."&passwd=".$data['password'];
        $res=get_curl_contents($url);
        $res_data=json_decode($res,true);
        if($res_data['state']!='true')return rejson(0,$res_data['msg'],true);
        if(empty($res_data['result']))return rejson(0,'用户名或密码错误',true);
        $sid=$res_data['result']['sid'];
        $dist = new Distributor();
        $butor=$dist->where('username',$sid)->find();
        $datas['is_open'] = 1;
        $datas['add_time'] = time();
        $datas['ip'] = request()->ip();
        $datas['username'] = $sid;
        if(array_key_exists('psid', $res_data['result']) && $res_data['result']['psid'] != ''){
            $psid=$res_data['result']['psid'];
            $id = $dist->where('username',$psid)->value('id');
            $datas['pid'] = $id?$id:'';
        }else{
            $datas['pid'] = 0;
        }

        if($butor){
            $datas['id'] = $butor['id'];
            return $this->edit($datas);
        }else{
            return $this->add($datas);
        }
    }

    protected function add($data){
        try{
            $re = $this->allowField(true)->save($data);
            if($re){
                $id=$this->getLastInsID();
                session('uname',$data['username']);
                session('pid',$data['pid']);
                session('sid',$id);
                return 1;
            }else{
                return 0;
            }

        }catch (Exception $e){
            return rejson(0,$e->getMessage(),false);
        }
    }

    protected function edit($data){
        try{
            $re=$this->allowField(true)->update($data);
            if($re !==false){
                session('uname',$data['username']);
                session('pid',$data['pid']);
                session('sid',$data['id']);
                return 1;
            }else{
                return 0;
            }
        }catch (Exception $e){
            return rejson(0,$e->getMessage(),false);
        }
    }


}
