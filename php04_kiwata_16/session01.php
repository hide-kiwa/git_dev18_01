<?php

session_start();
$sid = session_id();

$_SESSION['name'] = '福島';
$_SESSION['age'] = '13';
$_SESSION['loveFood'] = 'ラーメン二郎';

$birthPlace = '千葉県';