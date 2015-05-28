<?php
date_default_timezone_set('Asia/Tokyo');
ini_set('session.gc_probability','1');
ini_set('session.gc_divisor','100');
ini_set('session.gc_maxlifetime', "1440"); 
#@ini_set('session.save_path' ,'../log/session' ) ;
ini_set('default_charset', 'UTF-8');
ini_set("mbstring.http_output","UTF-8");
ini_set("mbstring.http_input","auto");
ini_set("mbstring.substitute_character","none");
ini_set('auto_detect_line_endings', 1);
#ini_set("output_buffering","on"); 
#ini_set("session.use_trans_sid", "1");
mb_language("Japanese");
mb_internal_encoding("UTF-8");
error_reporting(E_ALL ^ E_NOTICE);
?>
