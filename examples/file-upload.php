<?php

 //please note that the request will fail if you upload a file larger than what is supported by your PHP or Webserver settings
include "../config/koneksi.php";
$id_user	= $_POST['id'];

 $ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest';

 $result = array();

 $file = $_FILES['avatar'];
 if(!preg_match('/^image\//' , $file['type']) 
	|| !preg_match('/\.(jpe?g|gif|png)$/' , $file['name'])
		|| getimagesize($file['tmp_name']) === FALSE
	) {
	$result['status'] = 'ERR';
	$result['message'] = 'Invalid file format!';
 }
 else if($file['size'] > 110000) {
	$result['status'] = 'ERR';
	$result['message'] = 'Please choose a smaller file!';
 }
 else if($file['error'] != 0 || !is_uploaded_file($file['tmp_name'])) {
	$result['status'] = 'ERR';
	$result['message'] = 'Unspecified error!';
 }
 else {
	$save_path = $file['name'];
	$thumb_path = 'thumb.jpg';
	

	if( 
		! move_uploaded_file($file['tmp_name'] , $save_path)
		OR
		!resize($save_path, $thumb_path, 150) 
	  )
	{
		$result['status'] = 'ERR';
		$result['message'] = 'Unable to save file!';
	}

	else {
		
		
		
		$result['status'] = 'OK';
		$result['message'] = 'Avatar changed successfully!';
		$result['url'] = dirname($_SERVER['SCRIPT_NAME']).'/'.$save_path;
		mysql_query("update tbl_user set photo='$result[url]' where id_user='$id_user'");	
	}
	
 }


 $result = json_encode($result);
 if($ajax) {
	echo $result;
 }
 else {
	//for browsers that don't support uploading via ajax,
	//we have used an iframe instead and the response is sent as a script
	echo '<script language="javascript" type="text/javascript">';
	echo 'var iframe = window.top.window.jQuery("#'.$_POST['temporary-iframe-id'].'").data("deferrer").resolve('.$result.');';
	echo '</script>';
 }



function resize($in_file, $out_file, $new_width, $new_height=FALSE)
{
	$image = null;
	$extension = strtolower(preg_replace('/^.*\./', '', $in_file));
	switch($extension)
	{
		case 'jpg':
		case 'jpeg':
			$image = imagecreatefromjpeg($in_file);
		break;
		case 'png':
			$image = imagecreatefrompng($in_file);
		break;
		case 'gif':
			$image = imagecreatefromgif($in_file);
		break;
	}
	if(!$image || !is_resource($image)) return false;


	$width = imagesx($image);
	$height = imagesy($image);
	if($new_height === FALSE)
	{
		$new_height = (int)(($height * $new_width) / $width);
	}

	
	$new_image = imagecreatetruecolor($new_width, $new_height);
	imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	$ret = imagejpeg($new_image, $out_file, 80);

	imagedestroy($new_image);
	imagedestroy($image);

	return $ret;
}