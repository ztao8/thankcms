<?php

/**
 * 获取登录后台用户ID
 */
function get_current_admin_id()
{
	return session('ADMIN_ID');
}

/**
 * 获取登录会员ID
 */
function get_current_member_id()
{
	return session('MEMBER_ID');
}

/**
 * 状态返回
 */
function getStatusName($status)
{
	$statusArray = array('停用', '启用');
	return $statusArray[$status];
}

/**
 * 性别返回
 */
function getSexName($sex)
{
	$sexArray = array('保密', '男', '女');
	return $sexArray[$sex];
}

/**
 * 判断是否是手机浏览器访问
 * @return boolean
 */
function isMobile()
{
	$mobile = array();
	static $mobilebrowser_list = 'Mobile|iPhone|Android|WAP|NetFront|JAVA|OperasMini|UCWEB|WindowssCE|Symbian|Series|webOS|SonyEricsson|Sony|BlackBerry|Cellphone|dopod|Nokia|samsung|PalmSource|Xphone|Xda|Smartphone|PIEPlus|MEIZU|MIDP|CLDC';
	//note 获取手机浏览器
	if (preg_match("/$mobilebrowser_list/i", $_SERVER['HTTP_USER_AGENT'], $mobile)) {
		return true;
	} else {
		if (preg_match('/(mozilla|chrome|safari|opera|m3gate|winwap|openwave)/i', $_SERVER['HTTP_USER_AGENT'])) {
			return false;
		} else {
			if ($_GET['mobile'] === 'yes') {
				return true;
			} else {
				return false;
			}
		}
	}
}

/**
 * 对明文密码，进行加密，返回加密后的密文密码
 * @param string $password 明文密码
 * @param string $verify 认证码
 * @return string 密文密码
 */
function hashPassword($password, $verify = "")
{
	return md5($password . md5($verify));
}

/**
 * 转为关联数组公共方法
 */
function create_relate_array($array, $id = 'id')
{
	$data = array();
	foreach ($array as $key => $val) {
		$data[$val[$id]] = $val;
	}
	return $data;
}

/**
 * 数组转换为字符串，主要用于把分隔符调整到第二个参数
 * @param  array $arr 要连接的数组
 * @param  string $glue 分割符
 * @return string
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function arr2str($arr, $glue = ',')
{
	return implode($glue, $arr);
}

/**
 * 字符串转换为数组，主要用于把分隔符调整到第二个参数
 * @param  string $str 要分割的字符串
 * @param  string $glue 分割符
 * @return array
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function str2arr($str, $glue = ',')
{
	return explode($glue, $str);
}

/**
 * 发送短信
 */
function sendSMS($phone, $msg)
{
	$msg         = urlencode($msg);
	$url         = "http://211.147.13.239/dds_msg_api?casmiCommand=snda_send_back_msg&signature=J1W7XMOEZNRDUQ3B2VP6FGA90458YCTLHSKI&dep=2&destmobile=$phone&msgText=$msg";
	$result_json = file_get_contents($url);
	$result_arr  = json_decode($result_json, true);
	if ($result_arr['casmiStatus'] == 1) {
		return true;
	}
	return false;
}

/**
 * 发送邮件
 */
function sendEmail($address, $title, $message)
{
	try {
		$mail = new \PHPMailer();
		$mail->IsSMTP();
		// 设置邮件的字符编码，若不指定，则为'UTF-8'
		$mail->CharSet = 'UTF-8';
		$mail->IsHTML(true);
		// 添加收件人地址，可以多次使用来添加多个收件人
		if (is_array($address)) {
			foreach ($address as $k => $v) {
				if (is_array($v)) {
					$mail->AddAddress($v[0], $v[1]);
				} else {
					$mail->AddAddress($v);
				}
			}
		} else {
			$mail->AddAddress($address);
		}
		// 设置邮件正文
		$mail->Body = $message;
		// 设置邮件头的From字段。
		$mail->From = 'admin@92ws.cn';
		// 设置发件人名字
		$mail->FromName = '久爱网';
		// 设置邮件标题
		$mail->Subject = $title;
		// 设置SMTP服务器。
		$mail->Host = 'smtp.mxhichina.com';
		$mail->Port = 25;  //邮件发送端口
		// 设置为“需要验证”
		$mail->SMTPAuth = true;
		// 设置用户名和密码。
		$mail->Username = 'admin@92ws.cn';
		$mail->Password = 'Ztao#159753';
		return $mail->Send();
	} catch (phpmailerException $e) {
		return $e->errorMessage();
	}
}

/**
 * @action 成功错误JS跳转
 * @param string
 * @return Response
 */
function alert($info, $url = '')
{
	header("Content-type:text/html;charset=utf-8");
	if (empty($url)) {
		echo '<script>alert("' . $info . '");window.history.back(-1);</script>';
	} else {
		echo '<script>alert("' . $info . '");location.href="' . $url . '";</script>';
	}
}

/**
 * @action 格式打印输出
 * @param array|string
 * @return Response
 */
function dd($value)
{
	dump($value);
	die;
}

/**
 * @action 截取的字符串
 * @param string
 * @return string
 */
function msubstr($string, $length, $start = 0, $suffix = false, $charset = 'utf-8')
{
	$re['utf-8']  = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
	$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
	$re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
	$re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
	preg_match_all($re[$charset], $string, $match);
	if (count($match[0]) <= $length) {
		return $string;
	}
	$slice = join("", array_slice($match[0], $start, $length));
	if ($suffix) {
		return $slice . '…';
	}
	return $slice;
}

/**
 * @action curl获取数据
 * @param string
 * @return array
 */
function curl($url, $post = '')
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	if (!empty($post)) {
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	}
	curl_setopt($ch, CURLOPT_USERAGENT,
		"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)");
	curl_setopt($ch, CURLOPT_REFERER, "http://www.thanktan.com");
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

/**
 * 检测一个数据长度是否超过最小值
 * @param type $value 数据
 * @param type $length 最小长度
 * @return type
 */
function isMin($value, $length)
{
	return mb_strlen($value, 'utf-8') >= (int)$length ? true : false;
}

/**
 * 检测一个数据长度是否超过最大值
 * @param type $value 数据
 * @param type $length 最大长度
 * @return type
 */
function isMax($value, $length)
{
	return mb_strlen($value, 'utf-8') <= (int)$length ? true : false;
}

/**
 * 产生一个指定长度的随机字符串,并返回给用户
 * @param type $len 产生字符串的长度
 * @return string 随机字符串
 */
function genRandomString($len = 6)
{
	$chars    = array(
		"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
		"l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
		"w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
		"H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
		"S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
		"3", "4", "5", "6", "7", "8", "9"
	);
	$charsLen = count($chars) - 1;
	// 将数组打乱
	shuffle($chars);
	$output = "";
	for ($i = 0; $i < $len; $i++) {
		$output .= $chars[mt_rand(0, $charsLen)];
	}
	return $output;
}

/**
 * 调试，用于保存数组到txt文件 正式生产删除
 * 用法：array2file($info, SITE_PATH.'post.txt');
 * @param type $array
 * @param type $filename
 */
function array2file($array, $filename)
{
	if (defined("APP_DEBUG") && APP_DEBUG) {
		//修改文件时间
		file_exists($filename) or touch($filename);
		if (is_array($array)) {
			$str = var_export($array, TRUE);
		} else {
			$str = $array;
		}
		return file_put_contents($filename, $str);
	}
	return false;
}

function exportExcel($expTitle,$expCellName,$expTableData){
	$xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
	$fileName = $xlsTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
	$cellNum = count($expCellName);
	$dataNum = count($expTableData);

	$objPHPExcel = new \PHPExcel();
	$cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

	$objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
	// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
	for($i=0;$i<$cellNum;$i++){
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
	}
	// Miscellaneous glyphs, UTF-8
	for($i=0;$i<$dataNum;$i++){
		for($j=0;$j<$cellNum;$j++){
			$objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
		}
	}

	header('pragma:public');
	header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
	header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
}

?>