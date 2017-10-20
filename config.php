<?php
if (!session_id()) { session_start(); }

include "vendor/autoload.php";

$appid = '141391533058703';

$fb = new Facebook\Facebook([
    'app_id' => $appid,
    'app_secret' => '60396fb5ec06795f552d0d93408ef786',
    'default_graph_version' => 'v2.10',
]);

$db = new PDO("mysql:host=localhost;dbname=kceasycars","root","raja");