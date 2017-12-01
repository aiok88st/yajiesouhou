<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:50:"F:\wamp\www\yajie/app/home\view\index\webShop.html";i:1511235824;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1511237551;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1511235824;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css?v=1" media="all" />
    <link rel="stylesheet" href="__HOME__/css/reset.css" />
    <link rel="stylesheet" href="__HOME__/css/public.css?v=1" />
    <link rel="stylesheet" href="__HOME__/css/webShopList.css" />
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="__HOME__/js/rem.js" ></script>
    <script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>

    <script type="text/javascript" src="__HOME__/js/public.js?v=1" ></script>

    <script type="text/javascript">
        AjaxL=function(url,type,data,call){
            $.ajax({
                type:type,
                url:url,
                data:data,
                dataType:'JSON',
                success:function(res){
                    call(res);

                    if(res.url){
                        window.location.href=res.url;
                    }
                },
                error:function(XMLHttpRequest){
                    console.log(1111);
                }
            })
        }
    </script>
    <style>
        .layui-flow-more{
            padding-bottom: 10px;
        }
        .layui-flow-more a cite{
            color: #999999;
        }
    </style>
    
<title>售后网点</title>
<link rel="stylesheet" href="__HOME__/css/swiper-3.4.2.min.css" />
<link rel="stylesheet" href="__HOME__/css/webShop.css?v=1" />
<script type="text/javascript" src="__HOME__/js/swiper-3.4.2.min.js" ></script>
<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="__HOME__/load/js/bemLoad.js?v=1" ></script>
<script type="text/javascript">
    var link = "http://archie.hengdikeji.com/yajie/index.php/home/Index/";
    var load;
    $(function(){
        load = new bemLoad(200,0.75);
    });
    var area = <?php echo $area; ?>;
    console.log(area);
    if(area.length==0){
        setTimeout(ChangeTime(), 1000);
    }
    function ChangeTime(){
        var time;
        time = $("#time").text();
        time = parseInt(time);
        time--;
        if (time <= 0) {
            window.location.href="<?php echo url('home/index/webShop'); ?>?city="+'<?php echo $city; ?>'+"&region="+'<?php echo $pid; ?>'+"&lats="+'<?php echo $lats; ?>'+"&longs="+'<?php echo $longs; ?>';
        }else{
            $("#time").text(time);
            setTimeout(ChangeTime, 1000);
        }
    }

    var locate=<?php echo $locate; ?>;
    $.get(window.link+'getJs',function(res){
        wx.config({
            debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            appId:res.appId, // 必填，公众号的唯一标识
            timestamp: res.timestamp, // 必填，生成签名的时间戳
            nonceStr:res.nonceStr, // 必填，生成签名的随机串
            signature:res.signature,// 必填，签名，见附录1
            jsApiList: ['openLocation','getLocation'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });
        wx.ready(function () {
            wx.getLocation({
                success: function (res) {
                    var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                    var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                    $("#latitude").attr('value',latitude);
                    $("#longitude").attr('value',longitude);
                    var geocoder = new qq.maps.Geocoder({
                        complete: function (result) {   //解析成功的回调函数
                            if(locate.province != null){
                                var address=[];
                                address.province=locate.province;
                                address.city=locate.city;
                                address.district=locate.area;
                            }else{
                                var address = result.detail.addressComponents;  //获取详细地址信息
                            }
                            $("#prove").attr('value',address.province);
                            $("#city").attr('value',address.city);
                            $("#area").attr('value',address.district);
                            <?php if(!input('region')): ?>
                            window.location.href='<?php echo url("index/getRegion"); ?>?province='+address.province + '&city='+address.city+'&district='+address.district+'&lats='+latitude+'&longs='+longitude;
                            <?php else: ?>
                            load.close();
                            <?php endif; ?>
                        }
                    });

                    geocoder.getAddress(new qq.maps.LatLng(res.latitude, res.longitude));
                },
                cancel: function (res) {
                    alert('用户拒绝授权获取地理位置');
                }
            });
        })

    },"JSON");


</script>

</head>
<body id="vueMain">
<div class="delete"></div>


	<body>
		<div id="webShop">
			<!--导航栏-->
			<div id="head" style="z-index: 100">
				<div class="hleft floatl" id="dw">
                    <input type="hidden" name="" id="latitude" value="">
                    <input type="hidden" name="" id="longitude" value="">
                    <input type="hidden" name="prov" id="prove" value="">
                    <input type="hidden" name="city" id="city" value="">
                    <input type="hidden" name="area" id="area" value="">
					<a href="javascript:;" style="width: 2.2rem;" onclick="toDw()">
                        <?php if($type == 3): ?>
                        <?php echo $areas[0]['area']; elseif($type == 2): ?>
                        <?php echo $areas[0]['city']; else: ?>
                        <?php echo $areas[0]['province']; endif; ?>
                    </a>
				</div>
                <div class="hleft return floatl" id="goback" style="display: none;">
                    <a href="javascript:window.history.go(-1);">&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </div>
				<div class="hmiddle floatl">
					<p>附近网点</p>
				</div>
				<div class="hright floatl" onclick="getList()" id="lit">
					<a href="javascript:;">列表</a>
					<div class="clearr"></div>
				</div>
                <div class="hright floatl" style="display: none;" id="maps" onclick="goList()">
                    <a href="javascript:;">地图</a>
                    <div class="clearr"></div>
                </div>
				<div class="clearl"></div>
			</div>

			<div id="map">
                <div id="container" style="height: 100%;width:100%;margin: auto;"></div>
			</div>
			<div class="shopAddress" id="listOne">
                
                <?php if(empty($areas) || (($areas instanceof \think\Collection || $areas instanceof \think\Paginator ) && $areas->isEmpty())): ?>
				<!--网点搜索中-->
				<div class="searchWebShop" id="search-z" >
					<div class="addressBox">
						<ul>
							<li>
								<img src="__HOME__/img/search.png" style="width: 25%;"/>
							</li>
							<li>
								<p>您附近区域没有售后网点</p>
							</li>
							<li id="search_next">
								<p><span id="time">5</span>秒搜索其他地区</p>
							</li>
						</ul>
					</div>
				</div>
                <?php else: ?>

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                      <?php if(is_array($areas) || $areas instanceof \think\Collection || $areas instanceof \think\Paginator): $i = 0; $__LIST__ = $areas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;
                            $latlng=explode(',',$vo['location']);
                         ?>
                        <div class="swiper-slide items" date-lat="<?php echo $latlng[0]; ?>" date-lng="<?php echo $latlng[1]; ?>">
                            <div class="addressBox" style="width: 90%;height: 2.2rem;">
                                <div class="addressShow">
                                    <ul>
                                        <li>
                                            <p style="margin-bottom: 0.18rem;"><?php echo $vo['title']; ?></p>
                                        </li>
                                        <li>
                                            <p style="float: left;"><?php echo $vo['addr']; ?></p>
                                            <p style="float: right;">距离：<?php echo $vo['distance']; ?>km</p>
                                        </li>
                                    </ul>
                                </div>

                                <div class="addressMethod">
                                    <div class="go floatl">
                                        <a href="javascript:;" onclick="gomap(<?php echo $latlng[0]; ?>,<?php echo $latlng[1]; ?>,'<?php echo $vo['title']; ?>','<?php echo $vo['province']; ?><?php echo $vo['city']; ?><?php echo $vo['area']; ?><?php echo $vo['addr']; ?>')">到这去</a>
                                    </div>
                                    <div class="phone floatl">
                                        <a href="tel:<?php echo $vo['tel']; ?>">打电话</a>
                                    </div>
                                    <div class="clearl"></div>
                                </div>
                            </div>
                        </div>
                       <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="swiper-button-prev" style="background-image: url(__HOME__/img/back.png);left: 1%;width: 10px;height: 18px;margin-top: -9px;background-size: 10px 18px;"></div>
                    <div class="swiper-button-next" style="background-image: url(__HOME__/img/back.png);transform: rotate(180deg);right: 1%;width: 10px;height: 18px;margin-top: -9px;background-size: 10px 18px;"></div>
                </div>

                <?php endif; ?>
			</div>
            <div class="shopList" id="list" style="display: none;margin-top: 15%;">
            <?php if(empty($areas) || (($areas instanceof \think\Collection || $areas instanceof \think\Paginator ) && $areas->isEmpty())): ?>
            <!--没有网点-->
                <div class="searchWebShop">
                    <div class="addressBox">
                        <ul>
                            <li>
                                <img src="__HOME__/img/laugh.png" />
                            </li>
                            <li>
                                <p>您所在的省份没有售后网点</p>
                            </li>
                            <li>
                                <p>感谢关注</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php else: ?>
                <!--网点-->

            <?php if(is_array($areas) || $areas instanceof \think\Collection || $areas instanceof \think\Paginator): $i = 0; $__LIST__ = $areas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;
                            $latlng1=explode(',',$v1['location']);
                         ?>
                <div class="addressBox" style="margin-bottom: 3%;">
                    <div class="addressShow">
                        <ul>
                            <li>
                                <p><?php echo $v1['title']; ?></p>
                            </li>
                            <li>
                                <p style="float: left;"><?php echo $v1['addr']; ?></p>
                                <p style="float: right;">距离：<?php echo $v1['distance']; ?>km</p>
                            </li>
                        </ul>
                    </div>
                    <div class="addressMethod">
                        <div class="go floatl">
                            <a href="javascript:;" onclick="gomap(<?php echo $latlng1[0]; ?>,<?php echo $latlng1[1]; ?>,'<?php echo $v1['title']; ?>','<?php echo $v1['province']; ?><?php echo $v1['city']; ?><?php echo $v1['area']; ?><?php echo $v1['addr']; ?>')">到这去</a>
                        </div>
                        <div class="phone floatl">
                            <a href="tel:<?php echo $v1['tel']; ?>">打电话</a>
                        </div>
                        <div class="clearl"></div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                
            </div>
		</div>
		<script>
			var mySwiperX = new Swiper('.swiper-container', {
                prevButton:'.swiper-button-prev',
                nextButton:'.swiper-button-next',
				direction : 'horizontal',
                loop:true,
                onSlideChangeEnd:function(sw){
                    $sw=$('.items').eq(sw.activeIndex);
                    var thisLat=$sw.attr('date-lat');
                    var thisLng=$sw.attr('date-lng');
                    init (thisLat,thisLng);
                }
			});

            var geocoder,map,marker = null;

           function init (Lat,Lng) {
                var center = new qq.maps.LatLng(Lat,Lng);//23.134751, 113.339327
                map = new qq.maps.Map(document.getElementById('container'),{
                    center: center,
                    zoom: 15
                });
                if(area.length>0){
                    for(item in area){
                        var LatLngs=area[item].location.split(',');
                        var positions = new qq.maps.LatLng(LatLngs[0],LatLngs[1]);
                        var markers = new qq.maps.Marker({
                            position: positions,
                            map: map
                        });
                        qq.maps.event.addListener(markers, 'click', function(event) {
                            var lng=event.latLng.getLng();
                            var lat=event.latLng.getLat();
                            $('.items').each(function(){
                                var thisLat=$(this).attr('date-lat');
                                var thisLng=$(this).attr('date-lng');
                                if(thisLat==lat && lng==thisLng){
                                    var index=$(this).index();
                                    mySwiperX.slideTo(index);
                                }
                            })
                        });
                    }
                }
            }
            
            if(area.length==0){
                init(23.134751, 113.339327);
            }else{
                var LatLng=area[0].location.split(',');
                init(LatLng[0],LatLng[1]);
            }
            


            function getList(){
                $("#map").hide();
                $("#list").show();
                $("#search-z").hide();
                $("#listOne").hide();
                $("#lit").hide();
                $("#maps").show();
                $("#dw").hide();
                $("#goback").show();
            }

            function goList(){
                $("#map").show();
                $("#list").hide();
                $("#search-z").show();
                $("#listOne").show();
                $("#lit").show();
                $("#maps").hide();
                $("#dw").show();
                $("#goback").hide();
            }

            //导航
            function gomap(lat,lng,title,addres){
                wx.ready(function () {
                    wx.openLocation({
                        latitude: lat,
                        longitude: lng,
                        name: title,
                        address:addres,
                        scale: 14,
                        infoUrl: 'http://weixin.qq.com'
                    });
                });
            }

            //定位页面
            function toDw(){
                var latitude=$("#latitude").val();
                var longitude=$("#longitude").val();
                var province = $('#prove').val();
                var city = $('#city').val();
                var area = $('#area').val();
                window.location.href='<?php echo url("home/index/shopList"); ?>?province='+province + '&city='+city+'&area='+area+'&latitude='+latitude+'&longitude='+longitude;
            }

		</script>




<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>


