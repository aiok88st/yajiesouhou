<?php

namespace app\client\model;

use think\Model;

class Client extends Model
{
    //
    protected $pk = 'id';
    protected $table = 'clt_client';
    protected $field = ['open_id','open_name','open_face','province','city','area','name','phone'];
}
