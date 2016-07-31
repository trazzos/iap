<?php 

ini_set("display_errors", "OFF");
error_reporting(E_ALL ^ E_NOTICE);

date_default_timezone_set('America/Los_Angeles');

header('Content-type: text/html; charset=utf-8');

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_language('uni');
mb_regex_encoding('UTF-8');


?>