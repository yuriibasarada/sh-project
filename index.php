<?php
use core\MainApp;

require_once __DIR__ . '/vendor/autoload.php';

$path = __DIR__ . '/src/config/db.ini';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$r = new MainApp(array(
    MainApp::KEY_PARAMS => $_REQUEST,
    MainApp::KEY_PATH => $_REQUEST['_uri'],
    MainApp::KEY_CONTENT => file_get_contents('php://input'),
    MainApp::KEY_SESSION_ID => $session_id ?? 'default',
    MainApp::KEY_EXT_CONFIG => parse_ini_file($path, true),
));
$response = $r->run();
if(!$response) {
    return $r;
} else {
    echo $response = json_encode($r->run(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}
