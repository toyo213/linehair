<?php
class WPOliveCartZipcodeSearch{
	public function __construct() {

//Japan Postal Code List Search
		if($_POST['mode']=='send_deliver' or $_POST['mode']=='deliver_write'){
			$zipcode = $_POST['zip2'];
		}else{
	 		$zipcode = $_POST['zip'];
	 	}
		$csvfile =  dirname(__FILE__).'/../zipcode/KEN_ALL.CSV';
 
		$zipcode = mb_convert_kana($zipcode, 'a', 'utf-8');
		$zipcode = str_replace(array('-','ー'),'', $zipcode);
 
		$tmp = file_get_contents($csvfile);
		$tmp = mb_convert_encoding($tmp, 'utf-8', 'sjis-win');
		$fp  = tmpfile();
		fwrite($fp, $tmp);
		rewind($fp);
		setlocale(LC_ALL, 'ja_JP.UTF-8');
 
		$result = array();
		while (($data = fgetcsv($fp, 0, ",")) !== FALSE) {
			if($data[2] == $zipcode){
				$result = $data;
				break;
			}
		}
		fclose($fp);
 
		#header('Content-type:text/html; charset=utf-8');
		$pref_all  			=	&$GLOBALS['_pref'];
		foreach ($pref_all as $value ) { 
			if( $value== $result[6] ) {
				if($_POST['mode']=='send_deliver' or $_POST['mode']=='deliver_write'){
					$_POST['pref2']=$count;
				}else{
					$_POST['pref']=$count;
				}
			  break;
			}
			$count++;
		}
		if(!empty($result)){
			if($_POST['mode']=='send_deliver' or $_POST['mode']=='deliver_write'){
				$_POST['address2'] = $result[7].$result[8];
			}
			else{
				$_POST['address'] = $result[7].$result[8];
			}
 
		} else {
			if($_POST['mode']=='send_deliver' or $_POST['mode']=='deliver_write'){
				$_POST['address2']=  __('Error Address not found','WP-OliveCart');
			}
			else{
				$_POST['address']=  __('Error Address not found','WP-OliveCart');
			}
		}
	}
}
?>
