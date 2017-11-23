<?php

namespace app\client\model;

use think\Model;

class Network extends Model
{
    //
    protected $pk = 'id';
    protected $table = 'clt_network';
    protected $field = ['title','tel','addr','province','city','area','location','did'];
}
