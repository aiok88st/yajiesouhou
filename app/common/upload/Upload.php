<?php
namespace app\common\upload;
use think\Controller;
class Upload extends Controller{
    public function upload(){

    }
    public function base2img($base){  //base64转图片
        try{
            header("Content-type: text/html; charset=utf-8");

            $filePath = base64_decode($base);
            $toDay=date('Ymd');

            if(!file_exists("public/client/{$toDay}")){
                mkdir("public/client/{$toDay}/",0777,true);
            }
            $thumbNname=rand(999,10000) . date('YmdHis') . rand(0, 9999) . '.' . 'jpg';
            $keys = "public/client/{$toDay}/".$thumbNname;
            $path="/public/client/{$toDay}/".$thumbNname;

            file_put_contents($keys,$filePath);

            return $path;
        }catch(\Exception $e){
            return ['code'=>0,'msg'=>'erro'];
        }
    }
}
?>