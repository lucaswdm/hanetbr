<?php

$R = [];

if(filter_var($_REQUEST['ip', FILTER_VALIDATE_IP))
{

}

header("Content-type: application/json");
echo json_encode($R, true);
