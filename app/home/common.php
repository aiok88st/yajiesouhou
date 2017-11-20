<?php

//curl获取请求文本内容
function get_curl_contents($url, $method ='GET', $data = []) {
	//把所有的字母转换成大写
	$method = strtoupper($method);

	if($method == 'POST') {

		//使用curl模拟,初始化

		$ch = curl_init();

		//禁用https

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		//允许请求以文件流的形式返回

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		curl_setopt($ch, CURLOPT_POST, 1);

		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);

		curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 30);

		curl_setopt($ch, CURLOPT_URL, $url);

		$result = curl_exec($ch); //执行发送

		curl_close($ch); //关闭curl

	}elseif($method == 'DELETE') {
		//使用crul模拟

		$ch = curl_init();

		//允许请求以文件流的形式返回

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		//禁用https

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

		curl_setopt($ch, CURLOPT_URL, $url);

		$result = curl_exec($ch); //执行发送

		curl_close($ch);

	}elseif($method == 'PUT') {
		//使用crul模拟

		$ch = curl_init();

		//允许请求以文件流的形式返回

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		//禁用https

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		curl_setopt($ch, CURLOPT_PUT, true);

		curl_setopt($ch, CURLOPT_URL, $url);

		$result = curl_exec($ch); //执行发送

		curl_close($ch);

	}else {

		if (ini_get('allow_fopen_url') == '1') {

			$result = file_get_contents($url);

		}else {

			//使用crul模拟

			$ch = curl_init();

			//允许请求以文件流的形式返回

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

			//禁用https

			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

			curl_setopt($ch, CURLOPT_URL, $url);

			$result = curl_exec($ch); //执行发送

			curl_close($ch);

		}

	}

	return $result;

}

//获取IP
function get_client_ip(){
	if ($_SERVER['REMOTE_ADDR']) {//判断SERVER里面有没有ip，因为用户访问的时候会自动给你网这里面存入一个ip
		$cip = $_SERVER['REMOTE_ADDR'];
	} elseif (getenv("REMOTE_ADDR")) {//如果没有去系统变量里面取一次 getenv()取系统变量的方法名字
		$cip = getenv("REMOTE_ADDR");
	} elseif (getenv("HTTP_CLIENT_IP")) {//如果还没有在去系统变量里取下客户端的ip
		$cip = getenv("HTTP_CLIENT_IP");
	} elseif(getenv('HTTP_X_FORWARDED_FOR')){
		$cip = getenv('HTTP_X_FORWARDED_FOR');
	} else {
		$cip = "unknown";
	}
	return $cip;
}



