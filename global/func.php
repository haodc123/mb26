<?php
/*
	Author: haodc
	Since: v1.0
*/

define('SITE_NAME', 'Tech Every');
define('BASE_URL', 'http://localhost/mb26/');
define('MINAD_DIR', 'minad/');
define('INCLUDE_DIR', 'include/');
define('GLOBAL_DIR', 'global/');
// Require 
require_once("class_db.php");

// Create db connection
$myDb = new Db(1);

function redirectToPage($page) {
	$url = BASE_URL . $page;
	header("Location: $url");
	exit();
}
function valid($dbc, $s) {
	return mysqli_real_escape_string($dbc, strip_tags($s));
}

function isNumeric($value, $min) {
	return isset($value) && filter_var($value, FILTER_VALIDATE_INT, array('min_range' => $min));
}
function substrInTinyArea($str) {
	$ss = substr(strip_tags($str), 0 , 55);
	$sv = substr($ss, 0, strrpos($ss, ' ')); 
	return $ss.'...';
}
function substrInOneLine($str) {
	$ss = substr(strip_tags($str), 0 , 100);
	$sv = substr($ss, 0, strrpos($ss, ' ')); 
	return $ss.'...';
}
function substrIn3Line($str) {
	$ss = substr(strip_tags($str), 0 , 400);
	$sv = substr($ss, 0, strrpos($ss, ' ')); 
	return $ss.'...';
}
function sanitized($content) {
	return htmlentities($content, ENT_COMPAT, 'UTF-8');
	//return $content;
}
function getFirstImg($str) {
	// $str = '<p>&nbsp;aaa&nbsp;<img alt="" src="http://i.imgur.com/EgYtEoE.jpg" style="height:200px; width:150px" /></p>';
	$posImgTag = strpos($str, "<img"); // position of '<img' = 18
	$subStringFromImgTag = substr($str, $posImgTag); // <img alt="" src="http://i.imgur.com/EgYtEoE.jpg" style="height:200px; width:150px" /></p>';
	preg_match_all('/"/', $subStringFromImgTag, $posQuotation, PREG_OFFSET_CAPTURE);  
	$posThirstQuotation = $posQuotation[0][2][1]; // position of thirst quotation = 16
	$posFourthQuotation = $posQuotation[0][3][1]; // position of fourth quotation = 47
	$imgurl = substr($subStringFromImgTag, $posThirstQuotation +1, $posFourthQuotation - $posThirstQuotation -1);
	$aImgExt = array(".jpg",".png", ".bmp", ".gif");
	for ($i = 0; $i < count($aImgExt); $i++) {
		if (strpos($imgurl, $aImgExt[$i]) !== false) {
			// Is Image
			$len = strlen($imgurl);
			if (substr($imgurl, $len-1, 1) == '\\')
				$imgurl = substr($imgurl, 0, $len-1);
			return $imgurl;
		}
	}
	return 'undefined';
}
function sendEmailToOne($to, $subject, $body, $print) {
	require("PHPMailer/class.phpmailer.php");
	require('PHPMailer/PHPMailerAutoload.php');
	$from = "conghaodng@gmail.com";
	$mail = new PHPMailer();
	$mail->IsSMTP() ;
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPAuth  = true;
	$mail->SMTPSecure = "ssl";
	$mail->Username = "conghaodng";
	$mail->Password = "hoangggglan@123g";
	
	$mail->From = $from;
	$mail->FromName = SITE_NAME; // Name to indicate where the email came from when the recepient received
	$mail->AddAddress($to, SITE_NAME);
	$mail->AddReplyTo($from, SITE_NAME);
	$mail->WordWrap = 50; // set word wrap
	$mail->IsHTML(true); // send as HTML
	$mail->Subject = $subject;
	$mail->Body = $body; //HTML Body
	$mail->AltBody =''; //Text Body
	//$mail->SMTPDebug = 2;
	$mail->SetFrom($tmp, 'Test Mail');
	$mail->CharSet = "UTF-8";
		if ($print == 0)
		{
			$mail->Send();
		}
		else
		{
			if(!$mail->Send())
			{
				echo "<h1>Loi khi goi mail: " . $mail->ErrorInfo . '</h1>';
			}
			else
			{
				echo "<h1>Send mail thanh cong</h1>";
			}
		}
}
function genUserCode() {
	$tt = strtotime(date("Y-m-d H:i:s"));
	$rand = rand(0, 9999999);
	return $tt.$rand;
}
function clearPrice ($price)  // Clearly Price
	{
		if ($price <= 9999)
		{
			$sprice = strval($price);
			$nblock = intval(strlen($sprice)/3);
			for ($i = 0; $i < $nblock; $i ++)
			{
				$vnd[$i] = substr($sprice, -3*($i+1), 3);
			}
			$odd = strlen($sprice) - $nblock*3;
			$vnd[$nblock] = substr($sprice, 0, $odd);
			
			if ($vnd[$nblock] == '')
				for ($j = $nblock - 1; $j >= 0; $j--)
				{
					
					$j <> 0 ? $rs .= $vnd[$j].'.' : $rs .= $vnd[$j];
				}
			else
				for ($j = $nblock; $j >= 0; $j--)
				{
					
					$j <> 0 ? $rs .= $vnd[$j].'.' : $rs .= $vnd[$j];
				}
			$rs .= '.000';
		}
		else
		{
			$sprice = strval($price);
			$nblock = intval(strlen($sprice)/3);
			for ($i = 0; $i < $nblock; $i ++)
			{
				$vnd[$i] = substr($sprice, -3*($i+1), 3);
			}
			$odd = strlen($sprice) - $nblock*3;
			$vnd[$nblock] = substr($sprice, 0, $odd);
			
			if ($vnd[$nblock] == '')
				for ($j = $nblock - 1; $j >= 0; $j--)
				{
					
					$j <> 0 ? $rs .= $vnd[$j].'.' : $rs .= $vnd[$j];
				}
			else
				for ($j = $nblock; $j >= 0; $j--)
				{
					
					$j <> 0 ? $rs .= $vnd[$j].'.' : $rs .= $vnd[$j];
				}
		}
		echo $rs;
	}
function changeTitleRandom($str){       //   Change Title to title parameter link with random
		$str = stripUnicode($str);
		$str = str_replace("?","",$str);
		$str = str_replace("&","",$str);
		$str = str_replace("'","",$str);        
		$str = str_replace("  "," ",$str);
		$str = str_replace(":","",$str);
		$str = str_replace(".","-",$str);
		$str = trim($str);
		$str = mb_convert_case($str , MB_CASE_TITLE , 'utf-8');
	// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(" ","-",$str);    
		$rand = rand(0, 999999);
		$str.= '-'.$rand;
		return $str;
}
function changeTitle($str){       //   Change Title to title parameter link
		$str = stripUnicode($str);
		$str = str_replace("?","",$str);
		$str = str_replace("&","",$str);
		$str = str_replace("'","",$str);        
		$str = str_replace("  "," ",$str);
		$str = str_replace(":","",$str);
		$str = str_replace(".","-",$str);
		$str = trim($str);
		$str = mb_convert_case($str , MB_CASE_TITLE , 'utf-8');
	// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(" ","-",$str);
		return $str;
}
function stripUnicode($str){
		if(!$str) return false;
		$unicode = array(
		 'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
		 'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		 'd'=>'đ',
		 'D'=>'Đ',
		 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		 'i'=>'í|ì|ỉ|ĩ|ị',      
		 'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		 'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		 'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		 'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		 '-'=>'+|&'
		);
		foreach($unicode as $khongdau=>$codau) {
		  $arr = explode("|",$codau);
		  $str = str_replace($arr,$khongdau,$str);
		}
		return $str;
}
?>