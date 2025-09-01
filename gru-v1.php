<?php

$R = $_REQUEST;

$R['load'] = sys_getloadavg();
$R['os'] = php_uname();
$R['phpversion'] = phpversion();
$R['time'] = time();
$R['ip'] = $_SERVER['SERVER_ADDR'];

$R['services'] = [
  'mysql' => (bool) ( intval(fsockopen('localhost', 3306, $A, $B, 2)) ),
];

header("Content-type: application/json");
echo json_encode($R, true);
