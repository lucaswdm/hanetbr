<?php

$R = [];

if(filter_var($_REQUEST['ip'], FILTER_VALIDATE_IP))
{
      $RET = get_data('http://' . $_REQUEST['ip'] . '/gru-v1.php?' . http_build_query($_REQUEST));
      $R['http'] = $RET[0];
	  $R['data'] = $RET[1];
}

header("Content-type: application/json");
echo json_encode($R, true);




function get_data($url, $POST = false, $FLG_FOLLOW_REDIRECT = false)
{
	$ch = curl_init();
	$timeout = 10;
	$header = array(
    'Host: check.ha.net.br',
  );

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36');

	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

	if($FLG_FOLLOW_REDIRECT)
	{
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	}
  
  if($POST && is_array($POST))
  {
      curl_setopt($ch,CURLOPT_POST, true);
      curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($POST));
  }

	#curl_setopt($ch, CURLOPT_COOKIEJAR, APP_PATH . 'cookie.cookie');
    #curl_setopt($ch, CURLOPT_COOKIEFILE, APP_PATH . 'cookie.cookie');

	$data = curl_exec($ch);
  $info = curl_getinfo($ch);
	curl_close($ch);

	return [$info, $data];
}
