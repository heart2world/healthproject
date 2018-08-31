<?php
namespace User\Controller;
use Common\Controller\MemberbaseController;
class ProfileController extends MemberbaseController {	
	function _initialize(){
		parent::_initialize();
	}	
    // 编辑用户资料
	public function edit() {
		$this->assign($this->user);
		
        $uinfo =$this->user;
		if($uinfo['birthday'])
		{
			$uinfo['birthday'] = date('Y/m/d',strtotime($uinfo['birthday']));
		}
		$this->assign('birthday',$uinfo['birthday']);
        if(!empty($uinfo['myhealth']))
        {
            $myhealth =explode('|', $uinfo['myhealth']);
            $this->assign('myhealth',$myhealth);
        }
        if(!empty($uinfo['sysdisease']))
        {
            $sysdisease =explode('|', $uinfo['sysdisease']);
            $this->assign('sysdisease',$sysdisease);
        }
        if(!empty($uinfo['nowillness']))
        {
            $nowillness =explode('|', $uinfo['nowillness']);
            $this->assign('nowillness',$nowillness);
        }
        if(!empty($uinfo['historyillness']))
        {
            $historyillness =explode('|', $uinfo['historyillness']);
            $this->assign('historyillness',$historyillness);
        }
        if(!empty($uinfo['historydurg']))
        {
            $historydurg =explode('|', $uinfo['historydurg']);
            $this->assign('historydurg',$historydurg);
        }
        if(!empty($uinfo['anaphylaxis']))
        {
            $anaphylaxis =explode('|', $uinfo['anaphylaxis']);
            $this->assign('anaphylaxis',$anaphylaxis);
        }
        if(!empty($uinfo['womenbirth']))
        {
            if($uinfo['womenbirth'] !='无')
            {
                $womenbirth =json_decode($uinfo['womenbirth'],true);
                $this->assign('winfo',$womenbirth);
            }            
        }
        if(!empty($uinfo['lifestyle']))
        {
            $lifestyle =explode('|', $uinfo['lifestyle']);
            $this->assign('lifestyle',$lifestyle);
        }
        if(!empty($uinfo['foodstyle']))
        {
            $foodstyle =explode('|', $uinfo['foodstyle']);
            $this->assign('foodstyle',$foodstyle);
        }
        if(!empty($uinfo['psychologicstatus']))
        {
            $psychologicstatus =explode('|', $uinfo['psychologicstatus']);
            $this->assign('psychologicstatus',$psychologicstatus);
        }
        $list =M('operationlog')->where("mid='".$_SESSION['user']['id']."'")->select();
		foreach($list as $key=>$va)
		{
			$ke = $this->numToWord($key+1);
			$list[$key]['anumber'] =$ke;
		}
        $this->assign('list',$list);
		
		
		
    	$this->display();
    }
    // 编辑姓名
    public function editname()
    {
        $this->assign($this->user);
        $this->display();
    }
    // 编辑姓名提交
    function editnamepost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,nicename')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑性别
    public function editsex()
    {
        $this->assign($this->user);
        $this->display();
    }
    // 编辑性别提交
    function editsexpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,sex')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑身高
    public function editheight()
    {
        $this->assign($this->user);
        $this->display();
    }
    // 编辑身高提交
    function editheightpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,mheight')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑体重
    public function editweight()
    {
        $this->assign($this->user);
        $this->display();
    }
    // 编辑体重提交
    function editweightpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,mweight')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
     // 编辑生日
    public function editbirth()
    {
        $this->assign($this->user);
        $this->display();
    }
    // 编辑生日提交
    function editbirthpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,birthday')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑身份证
    public function editcard()
    {
        $this->assign($this->user);
        $this->display();
    }
    // 编辑身份证提交
    function editcardpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,cardnum')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑地址
    public function editaddress()
    {
        $this->assign($this->user);
        $this->display();
    }
    // 编辑地址提交
    function editaddresspost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,address')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑最近健康状况
    public function editzjjkzk()
    {
        $this->assign($this->user);
        $uinfo =$this->user;
        if($uinfo['myhealth'])
        {
			if(strpos($uinfo['myhealth'], '身体良好')===false)
            {
                $this->assign('index',0);
            }else
            {
                $this->assign('index',1);
            }
            if(strpos($uinfo['myhealth'], '头痛、头晕')===false)
            {
                $this->assign('index1',0);
            }else
            {
                $this->assign('index1',1);
            }
            if(strpos($uinfo['myhealth'], '心前区疼痛')===false)
            {
                $this->assign('index2',0);
            }else
            {
                $this->assign('index2',1);
            }
            if(strpos($uinfo['myhealth'], '胃痛')===false)
            {
                $this->assign('index3',0);
            }else
            {
                $this->assign('index3',1);
            }
            if(strpos($uinfo['myhealth'], '心慌气短、四肢无力')===false)
            {
                $this->assign('index4',0);
            }else
            {
                $this->assign('index4',1);
            }
            if(strpos($uinfo['myhealth'], '四肢麻木')===false)
            {
                $this->assign('index5',0);
            }else
            {
                $this->assign('index5',1);
            }
        }
        $this->display();
    }
    // 编辑最近健康状况提交
    function editzjjkzkpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,myhealth,healthindicators,healthelse')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑系统疾病
    public function editgzxtjb()
    {
        $this->assign($this->user);
        $uinfo =$this->user;
        if($uinfo['sysdisease'])
        {
            if(strpos($uinfo['sysdisease'], '呼吸系统（肺部、支气管）')===false)
            {
                $this->assign('index1',0);
            }else
            {
                $this->assign('index1',1);
            }
            if(strpos($uinfo['sysdisease'], '循环系统（心脏、血管）')===false)
            {
                $this->assign('index2',0);
            }else
            {
                $this->assign('index2',1);
            }
            if(strpos($uinfo['sysdisease'], '消化系统（胃）')===false)
            {
                $this->assign('index3',0);
            }else
            {
                $this->assign('index3',1);
            }
            if(strpos($uinfo['sysdisease'], '泌尿系统')===false)
            {
                $this->assign('index4',0);
            }else
            {
                $this->assign('index4',1);
            }
            if(strpos($uinfo['sysdisease'], '生殖系统')===false)
            {
                $this->assign('index5',0);
            }else
            {
                $this->assign('index5',1);
            }
            if(strpos($uinfo['sysdisease'], '血液系统')===false)
            {
                $this->assign('index6',0);
            }else
            {
                $this->assign('index6',1);
            }
        }
        $this->display();
    }
    // 编辑最系统疾病提交
    function editgzxtjbpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,sysdisease,syselse')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑现病史
    public function editxbs()
    {
        $this->assign($this->user);
        $uinfo =$this->user;
        if($uinfo['nowillness'])
        {
            if(strpos($uinfo['nowillness'], '糖尿病')===false)
            {
                $this->assign('index1',0);
            }else
            {
                $this->assign('index1',1);
            }
            if(strpos($uinfo['nowillness'], '高血压')===false)
            {
                $this->assign('index2',0);
            }else
            {
                $this->assign('index2',1);
            }
            if(strpos($uinfo['nowillness'], '心脑血管疾病')===false)
            {
                $this->assign('index3',0);
            }else
            {
                $this->assign('index3',1);
            }
            if(strpos($uinfo['nowillness'], '肿瘤')===false)
            {
                $this->assign('index4',0);
            }else
            {
                $this->assign('index4',1);
            }
            if(strpos($uinfo['nowillness'], '胃部疾病')===false)
            {
                $this->assign('index5',0);
            }else
            {
                $this->assign('index5',1);
            }
            if(strpos($uinfo['nowillness'], '冠心病')===false)
            {
                $this->assign('index6',0);
            }else
            {
                $this->assign('index6',1);
            }
            if(strpos($uinfo['nowillness'], '无')===false)
            {
                $this->assign('index',0);
            }else
            {
                $this->assign('index',1);
            }
        }
        $this->display();
    }
    // 编辑现病史提交
    function editxbspost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,nowillness,illnesselse')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑家族病史
    public function editjzbs()
    {
        $this->assign($this->user);
        $uinfo =$this->user;
        if($uinfo['historyillness'])
        {
            if(strpos($uinfo['historyillness'], '糖尿病')===false)
            {
                $this->assign('index1',0);
            }else
            {
                $this->assign('index1',1);
            }
            if(strpos($uinfo['historyillness'], '高血压')===false)
            {
                $this->assign('index2',0);
            }else
            {
                $this->assign('index2',1);
            }
            
            if(strpos($uinfo['historyillness'], '肿瘤')===false)
            {
                $this->assign('index3',0);
            }else
            {
                $this->assign('index3',1);
            }
            if(strpos($uinfo['historyillness'], '地中海贫血')===false)
            {
                $this->assign('index4',0);
            }else
            {
                $this->assign('index4',1);
            }
           
            if(strpos($uinfo['historyillness'], '无')===false)
            {
                $this->assign('index',0);
            }else
            {
                $this->assign('index',1);
            }
        }
        $this->display();
    }
    // 编辑家族病史提交
    function editjzbspost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,historyillness,hillnesselse')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑手术史
    public function editsss()
    {
        $this->assign($this->user);
        $uinfo =$this->user;
        if($uinfo['historysurgery'])
        {
            
            if($uinfo['historyillness']== '无')
            {
                $this->assign('index',0);
            }else
            {
                $this->assign('index',1);
            }

        }
        $list =M('operationlog')->where("mid='".$_SESSION['user']['id']."'")->select();
		foreach($list as $key=>$va)
		{
			$ke = $this->numToWord($key+1);
			$list[$key]['anumber'] =$ke;
		}
        $this->assign('list',$list);
        $this->display();
    }
    // 编辑手术史提交
    function editssspost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            
            if(intval($_POST['atype']) !=1)
            {
               
                if($_POST['surgeryname'])
                {
					foreach ($_POST['surgeryname'] as $ke => $val) {
						if($val == '')
						{
							$this->ajaxReturn(array('status'=>1,'msg'=>"请将数据填写完整"));
						}
						if($_POST['surgerytime'][$ke] == '')
						{
							$this->ajaxReturn(array('status'=>1,'msg'=>"请将数据填写完整"));
						}
					}
					M('operationlog')->where("mid='".$this->userid."'")->delete();
                    foreach ($_POST['surgeryname'] as $key => $value) {
                        $data['surgeryname']=$value;
                        $data['surgerytime']=$_POST['surgerytime'][$key];
                        $data['surgeryelse']=$_POST['surgeryelse'][$key];
                        $data['mid'] =  $_POST['id'];
                        M('operationlog')->add($data);
                    }
                }else
				{
					 M('operationlog')->where("mid='".$this->userid."'")->delete();
				
				}
            }else{
                M('operationlog')->where("mid='".$this->userid."'")->delete();
				
            }
            
            if ($this->users_model->field('id,historysurgery')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑用药史
    public function edityys()
    {
        $this->assign($this->user);
        $uinfo =$this->user;
        if($uinfo['historydurg'])
        {
            if(strpos($uinfo['historydurg'], '降压降糖药')===false)
            {
                $this->assign('index1',0);
            }else
            {
                $this->assign('index1',1);
            }
            if(strpos($uinfo['historydurg'], '缓解哮喘药物')===false)
            {
                $this->assign('index2',0);
            }else
            {
                $this->assign('index2',1);
            }
            if(strpos($uinfo['historydurg'], '解热镇痛药物')===false)
            {
                $this->assign('index3',0);
            }else
            {
                $this->assign('index3',1);
            }
            if(strpos($uinfo['historydurg'], '激素类药物')===false)
            {
                $this->assign('index4',0);
            }else
            {
                $this->assign('index4',1);
            }
            if(strpos($uinfo['historydurg'], '抗抑郁药物')===false)
            {
                $this->assign('index5',0);
            }else
            {
                $this->assign('index5',1);
            }
            if($uinfo['historydurg']== '无')
            {
                $this->assign('index',1);
            }else
            {
                $this->assign('index',0);
            }
        }
        $this->display();
    }
    // 编辑用药史提交
    function edityyspost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,historydurg,drugname,drugpoint,drugelse')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑过敏史
    public function editgms()
    {
        $this->assign($this->user);
        $uinfo =$this->user;
        if($uinfo['anaphylaxis'])
        {
            if(strpos($uinfo['anaphylaxis'], '青霉素')===false)
            {
                $this->assign('index1',0);
            }else
            {
                $this->assign('index1',1);
            }
            if(strpos($uinfo['anaphylaxis'], '磺胺类')===false)
            {
                $this->assign('index2',0);
            }else
            {
                $this->assign('index2',1);
            }
            if(strpos($uinfo['anaphylaxis'], '链霉类')===false)
            {
                $this->assign('index3',0);
            }else
            {
                $this->assign('index3',1);
            }
            
            if($uinfo['anaphylaxis']== '无')
            {
                $this->assign('index',1);
            }else
            {
                $this->assign('index',0);
            }
        }
        $this->display();
    }
    // 编辑过敏史提交
    function editgmspost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,anaphylaxis,anaphylaxiselse')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑女性生育史
    public function editnxsys()
    {
        $this->assign($this->user);
        $uinfo =$this->user;
        if($uinfo['womenbirth'])
        {            
            if($uinfo['womenbirth']== '无')
            {
                $this->assign('index',1);
            }else
            {

                $womenbirth =json_decode($uinfo['womenbirth'],true);
                $this->assign('info',$womenbirth);              
                $this->assign('index',0);
            }
        }
        $this->display();
    }
    // 编辑女性生育提交
    function editnxsyspost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,womenbirth')->create()!==false) {
                if(trim($_POST['womenbirth'] != '无'))
                {
                    $womenbirth['liuchansn'] = trim($_POST['liuchansn']);
                    $womenbirth['scmethod'] = trim($_POST['scmethod']);
                    $womenbirth['scsn'] = trim($_POST['scsn']);
                    $womenbirth['jyyear'] = trim($_POST['jyyear']);
                    $womenbirth['hysn'] = trim($_POST['hysn']);
                    $womenbirth['gwysn'] = trim($_POST['gwysn']);
                    $womenbirth['elsedesc'] =trim($_POST['elsedesc']);

                    $data = json_encode($womenbirth);
                }else{
					$data = '无';
				}
                if ($this->users_model->where("id='".$_POST['id']."'")->save(array('womenbirth'=>$data))!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }

    // 编辑睡眠情况
    public function editwdsmqk()
    {
        $this->assign($this->user);
        $uinfo =$this->user;
        if($uinfo['lifestyle'])
        {
            if(strpos($uinfo['lifestyle'], '睡眠质量不错')===false)
            {
                $this->assign('index1',0);
            }else
            {
                $this->assign('index1',1);
            }
            if(strpos($uinfo['lifestyle'], '偶尔起夜，很少做梦')===false)
            {
                $this->assign('index2',0);
            }else
            {
                $this->assign('index2',1);
            }
            if(strpos($uinfo['lifestyle'], '多梦易困，总是疲倦')===false)
            {
                $this->assign('index3',0);
            }else
            {
                $this->assign('index3',1);
            }
            if(strpos($uinfo['lifestyle'], '发生事情变故后容易失眠惊醒')===false)
            {
                $this->assign('index4',0);
            }else
            {
                $this->assign('index4',1);
            }
            if(strpos($uinfo['lifestyle'], '长期失眠多梦，容易醒')===false)
            {
                $this->assign('index5',0);
            }else
            {
                $this->assign('index5',1);
            }
            if(strpos($uinfo['lifestyle'], '每天睡眠少于5小时')===false)
            {
                $this->assign('index6',0);
            }else
            {
                $this->assign('index6',1);
            }
        }
        $this->display();
    }
    // 编辑睡眠情况提交
    function editwdsmqkpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,lifestyle,lifeelse')->create()!==false) {
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑吸烟情况
    public function editxyxg()
    {
        $this->assign($this->user);
        $this->display();
    }
    // 编辑吸烟情况提交
    function editxyxgpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,smokeing,predaysmoke,smokeyear,smokeelse')->create()!==false) {
                $data['predaysmoke'] = $_POST['predaysmoke'] ? intval($_POST['predaysmoke']) : NULL;
                $data['smokeyear'] = $_POST['smokeyear'] ? intval($_POST['smokeyear']) : NULL;
                $data['smokeing'] =trim($_POST['smokeing']);
                $data['smokeelse'] =trim($_POST['smokeelse']);
                if ($this->users_model->where("id='".$_POST['id']."'")->save($data)!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑饮酒情况
    public function edityjxg()
    {
        $this->assign($this->user);
        $this->display();
    }
    // 编辑饮酒情况提交
    function edityjxgpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,drinkstyle,predaydrink,drinkyear,drinkelse')->create()!==false) {
                $data['predaydrink'] = $_POST['predaydrink'] ? intval($_POST['predaydrink']) : NULL;
                $data['drinkyear'] = $_POST['drinkyear'] ? intval($_POST['drinkyear']) : NULL;
                $data['drinkstyle'] =trim($_POST['drinkstyle']);
                $data['drinkelse'] =trim($_POST['drinkelse']);
                if ($this->users_model->where("id='".$_POST['id']."'")->save($data)!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑运动情况
    public function editydqk()
    {
        $this->assign($this->user);
        $this->display();
    }
    // 编辑运动情况提交
    function editydqkpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,movement,moveelse')->create()!==false) {               
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑饮食情况
    public function editysxg()
    {
        $this->assign($this->user);
        $uinfo =$this->user;
        if($uinfo['foodstyle'])
        {
            if(strpos($uinfo['foodstyle'], '每天能按时三餐')===false)
            {
                $this->assign('index1',0);
            }else
            {
                $this->assign('index1',1);
            }
            if(strpos($uinfo['foodstyle'], '喜欢暴饮暴食')===false)
            {
                $this->assign('index2',0);
            }else
            {
                $this->assign('index2',1);
            }
            if(strpos($uinfo['foodstyle'], '喜欢喝饮料')===false)
            {
                $this->assign('index3',0);
            }else
            {
                $this->assign('index3',1);
            }
            if(strpos($uinfo['foodstyle'], '喜欢油炸、腌制、烧烤、生冷等刺激性食物')===false)
            {
                $this->assign('index4',0);
            }else
            {
                $this->assign('index4',1);
            }
            if(strpos($uinfo['foodstyle'], '经常吃甜食')===false)
            {
                $this->assign('index5',0);
            }else
            {
                $this->assign('index5',1);
            }
            if(strpos($uinfo['foodstyle'], '最近经常吃海鲜')===false)
            {
                $this->assign('index6',0);
            }else
            {
                $this->assign('index6',1);
            }
             if(strpos($uinfo['foodstyle'], '不爱吃素菜、水果')===false)
            {
                $this->assign('index7',0);
            }else
            {
                $this->assign('index7',1);
            }
        }
        $this->display();
    }
    // 编辑饮食情况提交
    function editysxgpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,foodstyle,foodelse')->create()!==false) {               
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 编辑心理状况
    public function editxlzk()
    {
        $this->assign($this->user);
        $uinfo =$this->user;
        if($uinfo['psychologicstatus'])
        {
            if(strpos($uinfo['psychologicstatus'], '容易紧张、胆小')===false)
            {
                $this->assign('index1',0);
            }else
            {
                $this->assign('index1',1);
            }
            if(strpos($uinfo['psychologicstatus'], '容易愤怒、经常因为小事争吵')===false)
            {
                $this->assign('index2',0);
            }else
            {
                $this->assign('index2',1);
            }
            if(strpos($uinfo['psychologicstatus'], '多愁善感、心思敏感')===false)
            {
                $this->assign('index3',0);
            }else
            {
                $this->assign('index3',1);
            }
            if(strpos($uinfo['psychologicstatus'], '爱生闷气、容易抑郁')===false)
            {
                $this->assign('index4',0);
            }else
            {
                $this->assign('index4',1);
            }
            if(strpos($uinfo['psychologicstatus'], '爱独处、朋友少、无处倾诉')===false)
            {
                $this->assign('index5',0);
            }else
            {
                $this->assign('index5',1);
            }
            
        }
        $this->display();
    }
    // 编辑心理状况提交
    function editxlzkpost()
    {
        if(IS_POST)
        {
            $_POST['id']=$this->userid;
            if ($this->users_model->field('id,psychologicstatus,heartelse')->create()!==false) {               
                if ($this->users_model->save()!==false) {
                    $this->user=$this->users_model->find($this->userid);
                    sp_update_current_user($this->user);
                    $this->ajaxReturn(array('status'=>0,'msg'=>"保存成功！",'url'=>U("user/profile/edit")));
                } else {
                    $this->ajaxReturn(array('status'=>1,'msg'=>"保存失败！"));
                }
            }
        }
    }
    // 个人中心修改密码
    public function password() {
		$this->assign($this->user);
    	$this->display();
    }    
    // 个人中心修改密码提交
    public function password_post() {
    	if(IS_POST)
        {
            $userid =I('userid','','intval');
            $password =I('password','','trim');
            $mobile=I('mobile','','trim');
            if(!check_send_code($mobile,trim($_POST['yzcode']))){
                $this->ajaxReturn(['status'=>0,'msg'=>'短信验证码错误']);
            }
            $res=M('member')->where("id='$userid'")->save(array('password'=>sp_password($password))); 
            file_put_contents('a89.txt',M('member')->getLastSql());
            $this->ajaxReturn(['status'=>1,'url'=>U('User/center/index'),'msg'=>'重置密码成功']);
        }    	 
    }
	/** 
* @author ja颂 
* 把数字1-1亿换成汉字表述，如：123->一百二十三
* @param [num] $num [数字]
* @return [string] [string]
*/
function numToWord($num)
{
	$chiNum = array('零', '一', '二', '三', '四', '五', '六', '七', '八', '九');
	$chiUni = array('','十', '百', '千', '万', '亿', '十', '百', '千');	 
	$chiStr = '';	 
	$num_str = (string)$num;	 
	$count = strlen($num_str);
	$last_flag = true; //上一个 是否为0
	$zero_flag = true; //是否第一个
	$temp_num = null; //临时数字
	 
	$chiStr = '';//拼接结果
	if ($count == 2) {//两位数
		$temp_num = $num_str[0];
		$chiStr = $temp_num == 1 ? $chiUni[1] : $chiNum[$temp_num].$chiUni[1];
		$temp_num = $num_str[1];
		$chiStr .= $temp_num == 0 ? '' : $chiNum[$temp_num]; 
	}
	else if($count > 2)
	{
		$index = 0;
		for ($i=$count-1; $i >= 0 ; $i--) 
		{ 
			$temp_num = $num_str[$i];
			if ($temp_num == 0) {
				if (!$zero_flag && !$last_flag ) {
					$chiStr = $chiNum[$temp_num]. $chiStr;
					$last_flag = true;
				}
			}else{
				$chiStr = $chiNum[$temp_num].$chiUni[$index%9] .$chiStr;
				 
				$zero_flag = false;
				$last_flag = false;
			}
			$index ++;
		}
	}else{
		$chiStr = $chiNum[$num_str[0]]; 
	}
	return $chiStr;
}
}