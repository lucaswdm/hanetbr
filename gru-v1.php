<?php

$R = $_REQUEST;

$R['load'] = sys_getloadavg();
$R['os'] = php_uname();
$R['phpversion'] = phpversion();
$R['time'] = time();
$R['ip'] = $_SERVER['SERVER_ADDR'];

header("Content-type: application/json");
echo json_encode($R, true);
