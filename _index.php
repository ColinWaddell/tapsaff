<?php
//===============================================
// Debug
//===============================================
ini_set('display_errors','On');
error_reporting(E_ALL);

//===============================================
// mod_rewrite
//===============================================
//Please configure via .htaccess or httpd.conf

//===============================================
// KISSMVC Settings (please configure)
//===============================================
define('APP_PATH','app/'); //with trailing slash pls

//define('WEB_DOMAIN','http://tapsaff.colinwaddell.com'); //with http:// and NO trailing slash pls
//define('WEB_FOLDER','/'); //with trailing slash pls

define('WEB_DOMAIN','http://www.taps-aff.co.uk'); //with http:// and NO trailing slash pls
define('WEB_FOLDER','/'); //with trailing slash pls

define('VIEW_PATH','app/views/'); //with trailing slash pls

date_default_timezone_set('Europe/London'); //Sorts out daylight savings

//===============================================
// Includes
//===============================================
require('kissmvc.php');

//===============================================
// SSL Hack
//===============================================
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

//===============================================
// Session
//===============================================
ini_set('session.use_cookies', 1);
ini_set('session.use_only_cookies', 1);
session_start();

//===============================================
// Globals
//===============================================
$GLOBALS['sitename']='Taps-Aff or Taps-Oan?';
$GLOBALS['json_local']=getcwd().'/taps.json';
$GLOBALS['json_url']='https://query.yahooapis.com/v1/public/yql?q=%0Aselect%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places%20where%20text%3D%22LOCATION%2CGB%22)&format=json';
$GLOBALS['taps_temp'] = 62;
$GLOBALS['json_lifespan'] = '+15 minutes';
$GLOBALS['default_location'] = 'Glasgow';
$GLOBALS['sslContextOptions'] = array(
                                  "ssl"=>array(
                                      "verify_peer"=>false,
                                      "verify_peer_name"=>false,
                                  ),
                                );  

//===============================================
// Functions
//===============================================
function myUrl($url='',$fullurl=false) {
  $s=$fullurl ? WEB_DOMAIN : '';
  $s.=WEB_FOLDER.$url;
  return $s;
}

//==============================================
// Start the controller
//===============================================
$controller = new Controller(APP_PATH.'controllers/',WEB_FOLDER,'taps','index');