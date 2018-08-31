<?php
/**
 *  计划任务
 **/
$mysql_server="localhost";
$mysql_username="root";
$mysql_password="Test0123";
$mysql_database="healthproject";
$hours = date('H');  
if($hours=='20')
{
	//建立数据库链接
	$conn = mysql_connect($mysql_server,$mysql_username,$mysql_password) or die("数据库链接错误");
	//选择某个数据库
	mysql_select_db($mysql_database,$conn);
	mysql_query("set names 'utf8'");
	//执行MySQL语句
	$result=mysql_query("SELECT option_value FROM xly_options where option_name='tx_options'");
	$row=mysql_fetch_row($result);
	$tinfo =json_decode($row[0],true);
	$result1=mysql_query("SELECT id,mobile,nicename,againtime FROM xly_member where istuisong=0 and status=1 and TO_DAYS(againtime)-TO_DAYS(NOW()) <= '".$tinfo['tnumber']."' and TO_DAYS(againtime)>= TO_DAYS(NOW())");	
	while($value=mysql_fetch_array($result1))
	{
		$ss =mysql_query("SELECT id,checktime,checkname from xly_member_report where mid='".$value['id']."' and againtime='".$value['againtime']."'");
		$rinfo=mysql_fetch_row($ss);
		
		if(!empty($rinfo[1]) && !empty($rinfo[2]))
		{
			header('content-type:text/html;charset=utf-8');
			$sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
			$smsConf = array(
				'key'   => '55c907ebc36d3aa4963d83aaa9e45d20', //您申请的APPKEY
				'mobile'    => $value['mobile'], //接受短信的用户手机号码
				'tpl_id'    => '72375', //您申请的短信模板ID，根据实际情况修改
				'tpl_value' =>urlencode('#name#='.$value['nicename'].'&#time#='.$rinfo[1].'&#address#='.$rinfo[2]) //您设置的模板变量，根据实际情况修改
			);
			$content = http_data_send($sendUrl,$smsConf); //请求发送短信
		   
			if($content){
				$result = json_decode($content,true);
				$error_code = $result['error_code'];
				if($error_code == 0){
					//状态为0，说明短信发送成功
				   mysql_query("update xly_member set istuisong=1 where id='".$value['id']."'");
				}else{
					//状态非0，说明失败
					$msg = $result['reason'];
					return false;
				}
			}
		}
	}
}
function http_data_send($url,$data=[]){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

    if(!empty($data)){
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output=curl_exec($ch);

    curl_close($ch);
    return $output;
}
	
?>