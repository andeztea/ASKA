<?php


class Lokovalidasi{
	function __construct(){}
	
	function validasi($str, $tipe){
		switch($tipe){
			default:
			case'sql':
				$str = stripcslashes($str);	
				$str = htmlspecialchars($str);				
				$str = preg_replace('/[^A-Za-z0-9]/','',$str);				
				return intval($str);
			break;
			case'xss':
				$str = stripcslashes($str);	
				$str = htmlspecialchars($str);
				$str = preg_replace('/[\W]/','', $str);
				return $str;
			break;
		}
	}
	
	function extension($path) {
		$file = pathinfo($path);
		if(file_exists($file['dirname'].'/'.$file['basename'])){
			return $file['basename'];
		}
	}
	
	
	
	
}
?>
