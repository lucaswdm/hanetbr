<?php

$R = $_REQUEST;

header("Content-type: application/json");
echo json_encode($R, true);
