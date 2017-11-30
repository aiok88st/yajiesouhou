<?php

namespace app\client\controller;

use think\Controller;
use think\Request;
use app\client\model\Client;

class Weixin extends Controller
{   protected $appid="wxc058309e9b90cd8e";  //微信APPID
    protected $appsecret="8179529951e7baa75fe45bd2dbec4abc";  //微信密钥
    public function _initialize()
    {
        $member_id=session('user')['user_id'];
        define('UID',$member_id);
    }
    public function index() {
        if (UID != 0) {
            $this->redirect('client/index');
        }

        $redirect_uri = urlencode('http://'.$_SERVER['HTTP_HOST'].__ROOT__.'/index/Weixin/oauth');
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->appid.'&redirect_uri='.$redirect_uri.'&response_type=code&scope=snsapi_userinfo&state=state#wechat_redirect';
        header('location:'.$url);
    }
    private function access_token() {
        $state = $_GET['state'];
        $code = $_GET['code'];
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->appid.'&secret='.$this->appsecret.'&code='.$code.'&grant_type=authorization_code';

        $token = json_decode(get_curl_contents($url), true);
        if (isset($token['errcode'])) {
            echo '<h1>错误：</h1>'.$token['errcode'];
            echo '<br/><h2>错误信息：</h2>'.$token['errmsg'];
            exit;
        }
        return $token;
    }
    //刷新access_token（如果需要）refresh_token拥有较长的有效期（7天、30天、60天、90天）
    private function refresh_token($token) {
        $url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.$this->appid.'&grant_type=refresh_token&refresh_token='.$token['refresh_token'];
        //$url="http://api.npurl.cn/sns/oauth2/refresh_token?appid=".$this->appid."&grant_type=refresh_token&refresh_token=".$token['refresh_token'];
        $rtoken = json_decode(get_curl_contents($url), true);
        if (isset($rtoken['errcode'])) {
            echo '<h1>错误：</h1>'.$rtoken['errcode'];
            echo '<br/><h2>错误信息：</h2>'.$rtoken['errmsg'];
            exit;
        }
        return $rtoken;
    }
    //拉取用户信息(需scope为 snsapi_userinfo)
    private function snsapi_userinfo($token) {
        $url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$token['access_token'].'&openid='.$token['openid'].'&lang=zh_CN';
        $user_info =json_decode(get_curl_contents($url));

        return $user_info;
    }
    public function oauth(Client $client) {
        if (UID != 0) {
            $this->redirect('client/index');

        }
        $token = $this->access_token();

        $user_info = (array)$this->snsapi_userinfo($token);

        if(!$user_info['openid']){
            $this->redirect('Weixin/index');
        }
        //检查是否已经存在
        $res = $client->where(array('open_id' => $user_info['openid']))->find();
        //如果已经存在
        if ($res) {
            $data = array(
                'open_name' =>$this->filterEmoji($user_info['nickname']),
                'open_face' => $user_info['headimgurl'],

            );
            //保存用户信息
            $client->where(array('id' => $res['id']))->update($data);
            //如果已经存在，则判断是否已经绑定，有绑定则直接登陆，没有绑定则跳转进行绑定
            $open_info =[
                'user_id'=>$res['id'],
                'open_id'=>$user_info['openid'],
                'open_name'=>$this->filterEmoji($user_info['nickname']),
                'open_face'=>$user_info['headimgurl'],
            ];
            session('user',$open_info);
            $this->redirect('client/index');
        }else {
            //如果不存在,则记录进行跳转绑定已经会员或注册新会员

            $open_info = array(
                'user_id'=>'',
                'open_id' => $user_info['openid'],
                'open_name' =>$this->filterEmoji($user_info['nickname']),
                'open_face' => $user_info['headimgurl']
            );
            $client->save(
                [
                    'open_id' => $user_info['openid'],
                    'open_name' =>$this->filterEmoji($user_info['nickname']),
                    'open_face' => $user_info['headimgurl']
                ]
            );
            $open_info = array(
                'user_id'=>$client->id,
                'open_id' => $user_info['openid'],
                'open_name' =>$this->filterEmoji($user_info['nickname']),
                'open_face' => $user_info['headimgurl']
            );
            session('user',$open_info);
            $this->redirect('client/index');
        }
    }
    public function filterEmoji($str)
    {
        $str = preg_replace_callback(
            '/./u',
            function (array $match) {
                return strlen($match[0]) >= 4 ? '' : $match[0];
            },
            $str);
        return $str;
    }
}
