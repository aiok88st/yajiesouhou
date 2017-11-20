<?php

namespace app\client\controller;

use think\Controller;
use think\Request;
use app\client\model\Client as ClientModel;
class Client extends Fater   //客户首页
{
    public function index(){  //首页用来展示个人信息

        return view();
    }
}
