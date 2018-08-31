<?php
/**
 *  计划任务
 **/
$mysql_server="localhost";
$mysql_username="root";
$mysql_password="Test0123";
$mysql_database="healthproject";
//建立数据库链接
	$conn = mysql_connect($mysql_server,$mysql_username,$mysql_password) or die("数据库链接错误");
	//选择某个数据库
	mysql_select_db($mysql_database,$conn);
	mysql_query("set names 'utf8'");
	//执行MySQL语句
	$result=mysql_query("SELECT option_value FROM xly_options where option_name='tx_options'");
	$row=mysql_fetch_row($result);
	$tinfo =json_decode($row[0],true);
	//$option_value= M('options')->where("option_name='tx_options'")->getField('option_value');
    //$tinfo =json_decode($option_value,true);
	$result1=mysql_query("SELECT id,mobile,nicename,againtime FROM xly_member where istuisong=0 and status=1 and TO_DAYS(againtime)-TO_DAYS(NOW()) <= '".$tinfo['tnumber']."' and TO_DAYS(againtime)>= TO_DAYS(NOW())");	
	while($value=mysql_fetch_array($result1))
	{
		$ss =mysql_query("SELECT id,checktime,checkname from xly_member_report where mid='".$value['id']."' and againtime='".$value['againtime']."'");
		$rinfo=mysql_fetch_row($ss);
		file_put_contents('a999090.txt',var_export($rinfo,true));
		//if(!empty($rinfo['checktime']) && !empty($rinfo['checkname']))
		//{
			//$result=tomobilesendMsg($value['mobile'],$value['nicename'],$rinfo['checktime'],$rinfo['checkname']);
			//if($result == true)
			//{
				// M('member')->where("id='".$value['id']."'")->setField('istuisong',1);
			//}
		//}
	}
	
?>