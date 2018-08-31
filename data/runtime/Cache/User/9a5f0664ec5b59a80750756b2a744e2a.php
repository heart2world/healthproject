<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
      <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
      <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>信息设置</title>
      <link rel="stylesheet" href="/public/app/lib/weui/jquery-weui.css" />
      <link rel="stylesheet" href="/public/app/lib/weui/weui.min.css" />
      <link rel="stylesheet" href="/public/app/css/public.css" />
      <link rel="stylesheet" href="/public/app/css/style.css" />
      <script type="text/javascript" src="/public/app/lib/jq/jquery-1.10.2.js" ></script>
      <script type="text/javascript" src="/public/app/lib/weui/jquery-weui.js" ></script>
      <script type="text/javascript" src="/public/app/js/common.js" ></script>
  </head>
  <style>
  .weui-cells:before{
	border-top:0
  }
  .weui-cell:before{
	border-top:0
  }
  .infoSec .Box>a .tit,.infoSec .Box>div .tit{
	color:#333;
	font-size:17px
  }
	.weui-cell__bd p{
		color:#999;
	}
	.weui-cell__ft{
		color:#999
	}
	
	.backCenter{
		display: inline-block;
		padding: 10px 20px;
		background: #4fbbc5;
		position: fixed;
		left: 30%;
		right: 30%;
		text-align: center;
		color: #fff;
		font-size: 1.4rem;
		border-radius: 30px;
		box-shadow: 5px 5px 20px #ccc;
		margin: 0 auto;
		bottom: 2rem;
	}
  </style>
  <body>
    <!--<header class="pageHeader">
      <div class="back">返回</div>
      <h2>信息设置</h2>
    </header>-->
    <section class="contentSec infoSec">
      <div class="Box Box1">
        <p class="title" style="padding-bottom:14px">一、基础信息</p>
        <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="<?php echo U('User/Profile/editname');?>">
                    <div class="weui-cell__bd">
                        <p style="color:#333">姓名</p>
                    </div>
                    <div class="weui-cell__ft"><?php echo ($nicename); ?></div>
                </a>
                <a class="weui-cell weui-cell_access" href="<?php echo U('User/Profile/editsex');?>">
                    <div class="weui-cell__bd">
                        <p style="color:#333">性别</p>
                    </div>
                    <div class="weui-cell__ft"><?php if($sex != ''): echo ($sex); else: ?>未设置<?php endif; ?></div>
                </a>
                <a class="weui-cell weui-cell_access" href="<?php echo U('User/Profile/editheight');?>">
                    <div class="weui-cell__bd">
                        <p style="color:#333">身高</p>
                    </div>
                    <div class="weui-cell__ft"><?php if($mheight != ''): echo ($mheight); else: ?>未设置<?php endif; ?></div>
                </a>
                <a class="weui-cell weui-cell_access" href="<?php echo U('User/Profile/editweight');?>">
                    <div class="weui-cell__bd">
                        <p style="color:#333">体重</p>
                    </div>
                    <div class="weui-cell__ft"><?php if($mweight != ''): echo ($mweight); else: ?>未设置<?php endif; ?></div>
                </a>
                <a class="weui-cell weui-cell_access" href="<?php echo U('User/Profile/editbirth');?>">
                    <div class="weui-cell__bd">
                        <p style="color:#333">出生日期</p>
                    </div>
                    <div class="weui-cell__ft"><?php if($birthday != ''): echo ($birthday); else: ?>未设置<?php endif; ?></div>
                </a>
                <a class="weui-cell weui-cell_access" href="<?php echo U('User/Profile/editcard');?>">
                    <div class="weui-cell__bd">
                        <p style="color:#333">身份证</p>
                    </div>
                    <div class="weui-cell__ft"><?php if($cardnum != ''): echo ($cardnum); else: ?>未设置<?php endif; ?></div>
                </a>
                <a class="weui-cell weui-cell_access" href="<?php echo U('User/Profile/editaddress');?>">
                    <div class="weui-cell__bd">
                        <p style="color:#333">住址</p>
                    </div>
                    <div class="weui-cell__ft"><?php if($address != ''): echo ($address); else: ?>未设置<?php endif; ?></div>
                </a>
    
            </div>
      </div>
      <div class="Box Box2">
        <p class="title">二、我的健康</p>
        <a href="<?php echo U('User/Profile/editzjjkzk');?>">
          <p class="tit">最近健康状况</p>
          <div class="weui-cells">
                  <?php if(is_array($myhealth)): $i = 0; $__LIST__ = $myhealth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p><?php echo ($va); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                  <?php if(count($myhealth) == 0 && $healthindicators == '' && $healthelse == ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($healthindicators != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:120px">体检阳性指标</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($healthindicators); ?>
                      </div>
                  </div><?php endif; ?>
                  <?php if($healthelse != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($healthelse); ?>
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
        <a href="<?php echo U('User/Profile/editgzxtjb');?>">
          <p class="tit">关注系统疾病</p>
          <div class="weui-cells">
                  <?php if(is_array($sysdisease)): $i = 0; $__LIST__ = $sysdisease;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p><?php echo ($va); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                  <?php if($syselse == '' && count($sysdisease) == 0): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($syselse != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($syselse); ?>
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
        <a href="<?php echo U('User/Profile/editxbs');?>">
          <p class="tit">现病史</p>
          <div class="weui-cells">
                  <?php if(is_array($nowillness)): $i = 0; $__LIST__ = $nowillness;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p><?php echo ($va); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                  <?php if(count($nowillness) == 0 && $illnesselse == ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($illnesselse != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($illnesselse); ?>
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
        <a href="<?php echo U('User/Profile/editjzbs');?>">
          <p class="tit">家族病史</p>
          <div class="weui-cells">
                  <?php if(is_array($historyillness)): $i = 0; $__LIST__ = $historyillness;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p><?php echo ($va); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                  <?php if(count($historyillness) == 0 && $hillnesselse == ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($hillnesselse != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($hillnesselse); ?>
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
        <a href="<?php echo U('User/Profile/editsss');?>">
          <p class="tit">手术史</p>
          <div class="weui-cells">
                  <?php if($historysurgery == '无'): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>无</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>手术<?php echo ($va["anumber"]); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div>
                  <div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>手术名称</p>
                      </div>
                      <div class="weui-cell__ft"><?php echo ($va["surgeryname"]); ?>
                      </div>
                  </div>
                  <div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>手术时间</p>
                      </div>
                      <div class="weui-cell__ft"><?php echo ($va["surgerytime"]); ?>
                      </div>
                  </div>
				  <?php if($va['surgeryelse'] != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($va["surgeryelse"]); ?>
                      </div>
                  </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                  <?php if(count($list) == 0 && $historysurgery == ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
        <a href="<?php echo U('User/Profile/edityys');?>">
          <p class="tit">用药史</p>
          <div class="weui-cells">
                  <?php if(is_array($historydurg)): $i = 0; $__LIST__ = $historydurg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p><?php echo ($va); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                   <?php if($drugname == '' && $drugpoint == '' && $drugelse == '' && count($historydurg) == 0): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($drugname != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:100px">药品名称</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($drugname); ?>
                      </div>
                  </div><?php endif; ?>
                   <?php if($drugpoint != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:100px">服务剂量</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($drugpoint); ?>
                      </div>
                  </div><?php endif; ?>
                  <?php if($drugelse != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($drugelse); ?>
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
        <a href="<?php echo U('User/Profile/editgms');?>">
          <p class="tit">过敏史</p>
          <div class="weui-cells">
                  <?php if(is_array($anaphylaxis)): $i = 0; $__LIST__ = $anaphylaxis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p><?php echo ($va); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                  <?php if($anaphylaxis == '' && count($anaphylaxis) == 0): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($anaphylaxiselse != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($anaphylaxiselse); ?>
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
        <a href="<?php echo U('User/Profile/editnxsys');?>">
          <p class="tit">女性生育史</p>
          <div class="weui-cells">
                  <?php if($womenbirth == '无'): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>无</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($womenbirth == ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($womenbirth != '' && $womenbirth != '无'): if($winfo['liuchansn'] != ''): ?><div class="weui-cell weui-cell_access">                      
                            <div class="weui-cell__bd">
                                <p>流产史</p>
                            </div>
                            <div class="weui-cell__ft"><?php echo ($winfo["liuchansn"]); ?>
                            </div>                     
                        </div><?php endif; ?>
                    <?php if($winfo['hysn'] != ''): ?><div class="weui-cell weui-cell_access">  
                        <div class="weui-cell__bd">
                            <p>怀孕史</p>
                        </div>
                        <div class="weui-cell__ft"><?php echo ($winfo["hysn"]); ?>
                        </div>
                      </div><?php endif; ?>
                      <?php if($winfo['scsn'] != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>生产史</p>
                      </div>
                      <div class="weui-cell__ft"><?php echo ($winfo["scsn"]); ?>
                      </div>
                      </div><?php endif; ?>
                      <?php if($winfo['scmethod'] != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>生产方式</p>
                      </div>
                      <div class="weui-cell__ft"><?php echo ($winfo["scmethod"]); ?>
                      </div>
                      </div><?php endif; ?>
                      <?php if($winfo['gwysn'] != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>宫外孕史</p>
                      </div>
                      <div class="weui-cell__ft"><?php echo ($winfo["gwysn"]); ?>
                      </div>
                      </div><?php endif; ?>
                      <?php if($winfo['jyyear'] != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>绝经年龄</p>
                      </div>
                      <div class="weui-cell__ft"><?php echo ($winfo["jyyear"]); ?>
                      </div>
                      </div><?php endif; ?>
                      <?php if($winfo['elsedesc'] != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($winfo["elsedesc"]); ?>
                      </div>
                      </div><?php endif; ?>
                  </div><?php endif; ?>
              </div>
            </a>
      </div>
      <div class="Box Box3">
        <p class="title">三、我的生活方式</p>
        <a href="<?php echo U('User/Profile/editwdsmqk');?>">
          <p class="tit">睡眠情况</p>
          <div class="weui-cells">
                  <?php if(count($lifestyle) == 0 && $lifeelse == ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if(is_array($lifestyle)): $i = 0; $__LIST__ = $lifestyle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p><?php echo ($va); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                  <?php if($lifeelse != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($lifeelse); ?>
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
        <a href="<?php echo U('User/Profile/editxyxg');?>">
          <p class="tit">吸烟习惯</p>
          <div class="weui-cells">
                  <?php if($smokeing != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p><?php echo ($smokeing); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div>
                  <?php else: ?>
                  <div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($predaysmoke != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>每日（根）</p>
                      </div>
                      <div class="weui-cell__ft"><?php echo ($predaysmoke); ?>
                      </div>
                  </div><?php endif; ?>
                   <?php if($smokeyear != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>已抽（年）</p>
                      </div>
                      <div class="weui-cell__ft"><?php echo ($smokeyear); ?>
                      </div>
                  </div><?php endif; ?>
                   <?php if($smokeelse != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($smokeelse); ?>
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
        <a href="<?php echo U('User/Profile/edityjxg');?>">
          <p class="tit">饮酒习惯</p>
          <div class="weui-cells">
                  <?php if($drinkstyle != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p><?php echo ($drinkstyle); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div>
                  <?php else: ?>
                  <div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($predaydrink != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>每日（ml）</p>
                      </div>
                      <div class="weui-cell__ft"><?php echo ($predaydrink); ?>
                      </div>
                  </div><?php endif; ?>
                   <?php if($drinkyear != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>已饮（年）</p>
                      </div>
                      <div class="weui-cell__ft"><?php echo ($drinkyear); ?>
                      </div>
                  </div><?php endif; ?>
                   <?php if($drinkelse != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($drinkelse); ?>
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
        <a href="<?php echo U('User/Profile/editydqk');?>">
          <p class="tit">运动情况</p>
          <div class="weui-cells">
                  <?php if($movement == ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div>
                  <?php else: ?>
                  <div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p><?php echo ($movement); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($moveelse != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">运动方式</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($moveelse); ?>
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
        <a href="<?php echo U('User/Profile/editysxg');?>">
          <p class="tit">饮食习惯</p>
          <div class="weui-cells">
                  <?php if(is_array($foodstyle)): $i = 0; $__LIST__ = $foodstyle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p><?php echo ($va); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                  <?php if($foodelse == '' && count($foodstyle) == 0): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($foodelse != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($foodelse); ?>
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
        <a href="<?php echo U('User/Profile/editxlzk');?>">
          <p class="tit">心理状况</p>
          <div class="weui-cells">
                   <?php if(is_array($psychologicstatus)): $i = 0; $__LIST__ = $psychologicstatus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p><?php echo ($va); ?></p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                  <?php if($heartelse == '' && count($psychologicstatus) == 0): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p>请选择</p>
                      </div>
                      <div class="weui-cell__ft">
                      </div>
                  </div><?php endif; ?>
                  <?php if($heartelse != ''): ?><div class="weui-cell weui-cell_access">
                      <div class="weui-cell__bd">
                          <p style="min-width:50px">其他</p>
                      </div>
                      <div class="weui-cell__ft" style="word-break:break-word;"><?php echo ($heartelse); ?>
                      </div>
                  </div><?php endif; ?>
              </div>
            </a>
      </div>
    
		<a class="backCenter" href="<?php echo U('User/Center/index');?>">返回个人中心</a>
	</section>
  </body>
</html>