<?php
// default redirection
$url = $_REQUEST["callback"].'?callback_func='.$_REQUEST["callback_func"];
$bSuccessUpload = is_uploaded_file($_FILES['Filedata']['tmp_name']);

// SUCCESSFUL
if(bSuccessUpload) {
	$tmp_name = $_FILES['Filedata']['tmp_name'];
	$name = $_FILES['Filedata']['name'];
	
	$filename_ext = strtolower(array_pop(explode('.',$name)));
	$allow_file = array("jpg", "png", "bmp", "gif");
	
	if(!in_array($filename_ext, $allow_file)) {
		$url .= '&errstr='.$name;
	} else {
		
		if($_POST["fPath"]){			
			$uploadDir = $_SERVER["DOCUMENT_ROOT"] . "/data/editor/";
			if(!is_dir($uploadDir)){
				@mkdir($uploadDir, 0777);
				@chmod($uploadDir, 0777);				
			}
			
			$uploadDir.=$_POST["fPath"] . "/";
			$uploadUrl = "/data/editor/" . $_POST["fPath"] . "/";
		}else{
			$uploadDir = '../../upload/';
			$uploadUrl = "upload/";
		}
		
		
		if(!is_dir($uploadDir)){
			@mkdir($uploadDir, 0777);
			@chmod($uploadDir, 0777);
		}
		
		//-- 새로운 파일명 지정
		$newFileName = date("YmdHis") . rand(100,999) . "." .  $filename_ext;
		$newPath = $uploadDir.urlencode($newFileName);
		
		@move_uploaded_file($tmp_name, $newPath);
		
		$url .= "&bNewLine=true";
		$url .= "&sFileName=".$newFileName;
		$url .= "&sFileURL=".$uploadUrl.$newFileName;
	}
}
// FAILED
else {
	$url .= '&errstr=error';
}
	
header('Location: '. $url);
?>