<?php
include_once '../../../vendor/autoload.php';
$notice=new \App\manager\Notice();
echo $notice->newNotice();