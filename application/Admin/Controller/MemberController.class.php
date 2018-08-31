<?php
// +----------------------------------------------------------------------
// | ThinkCMF 客户管理板块
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tuolaji <479923197@qq.com>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class MemberController extends AdminbaseController {
	// 后台客户管理列表
	public function index(){				
		$where='1=1';	
		$this->member =M('member');
		$keyword=I('keyword','','trim');
		$mobile=I('mobile','','trim');
        $number=I('number','','intval');
		if(!empty($keyword)){
		    $where.=" and nicename like '%$keyword%'";
		}
		if(!empty($mobile)){
		   
			$where.=" and mobile like '%$mobile%'";
		}
        if(!empty($number)){
           
			$where .=" and number <= '$number' and number >0";
        }
		$count=$this->member->where($where)->count();			
		$page = $this->page($count, 20);			
		$member=$this->member
				->where($where)
				->limit($page->firstRow , $page->listRows)
				->order('addtime desc')
				->select();
		//echo $this->member->getLastSql();
		$this->assign("page", $page->show('Admin'));
		$this->assign("formget",array_merge($_GET,$_POST));
		$this->assign("member",$member);
		$this->display();
	}	
    /**
     * [mdetail 个人信息]
     * @return [type] [description]
     */
    public function mdetail()
    {
        $id = I('get.id',0,'intval');
        if (!empty($id)) {
            $result = M('member')->where(array("id"=>$id))->find();
            if(!empty($result['myhealth']))
            {
                $myhealth =explode('|', $result['myhealth']);
                $this->assign('myhealth', $myhealth);
            }
            if(!empty($result['sysdisease']))
            {
                $sysdisease =explode('|', $result['sysdisease']);
                $this->assign('sysdisease', $sysdisease);
            }
            if(!empty($result['nowillness']))
            {
                $nowillness =explode('|', $result['nowillness']);
                $this->assign('nowillness', $nowillness);
            }            
            if(!empty($result['historyillness']))
            {
                $historyillness =explode('|', $result['historyillness']);
                $this->assign('historyillness', $historyillness);
            }
            if(!empty($result['historysurgery']))
            {
                $historysurgery =json_decode($result['historysurgery'],true);
                $this->assign('historysurgery', $historysurgery);
            }
            if(!empty($result['historydurg']))
            {
                $historydurg =explode('|', $result['historydurg']);
                $this->assign('historydrug', $historydurg);
            }
            
            if(!empty($result['anaphylaxis']))
            {
                $anaphylaxis =explode('|', $result['anaphylaxis']);
                $this->assign('anaphylaxis', $anaphylaxis);
            }
            
            if(!empty($result['womenbirth']))
            {
                $womenbirth =json_decode($result['womenbirth'],true);
                $this->assign('womenbirth', $womenbirth);
            }
            if(!empty($result['lifestyle']))
            {
                $lifestyle =explode('|', $result['lifestyle']);
                $this->assign('lifestyle', $lifestyle);
            }
            if(!empty($result['movement']))
            {
                $movement =explode('|', $result['movement']);
                $this->assign('movement', $movement);
            }
            if(!empty($result['smokeing']))
            {
                $smokeing =explode('|', $result['smokeing']);
                $this->assign('smokeing', $smokeing);
            }
            if(!empty($result['foodstyle']))
            {
                $foodstyle =explode('|', $result['foodstyle']);
                $this->assign('foodstyle', $foodstyle);
            }
            if(!empty($result['drinkstyle']))
            {
                $drinkstyle = explode('|', $result['drinkstyle']);
                $this->assign('drinkstyle', $drinkstyle);
            }
            if(!empty($result['psychologicstatus']))
            {
                $psychologicstatus = explode('|', $result['psychologicstatus']);
                $this->assign('psychologicstatus', $psychologicstatus);
            }
            $this->assign('minfo', $result);
			$optionlog=M('operationlog')->where("mid='$id'")->order('surgerytime desc')->select();
			$this->assign('optionlog',$optionlog);
            $this->display();
        } else {
            $this->error('数据传入失败！');
        }
        
    }
    public function healthlog()
    {
         $id = I('get.id',0,'intval');
        if (!empty($id)) {
            $result = M('member')->field('id,nicename,mobile')->where(array("id"=>$id))->find();
            $this->assign('minfo',$result);
            $count =M('member_healthlog')->where("mid='$id'")->count();
            $page = $this->page($count, 20);
            $list =M('member_healthlog')->where("mid='$id'")->limit($page->firstRow , $page->listRows)->order('addtime desc')->select();
            $this->assign("page", $page->show('Admin'));
            $this->assign('loglist',$list);
            $this->display();
        }else
        {
            $this->error('数据传入失败！');
        }
    }
	public function showhealthlog()
	{
		$id = I('get.id',0,'intval');
        if (!empty($id)) {
			$list =M('member_healthlog')->where("id='$id'")->find();
			if($list['imgs']){
				$imgs =explode(',',$list['imgs']);
				$this->assign('imgs',$imgs);
			}			
            $this->display();
		}else
        {
            $this->error('数据传入失败！');
        }
	}
    /**
     * [report 录入报告]
     * @return [type] [description]
     */
    public function report()
    {
        $id = I('get.id',0,'intval');
        if (!empty($id)) {
            $result = M('member')->field('id,nicename,mobile')->where(array("id"=>$id))->find();
            $this->assign('minfo',$result);
            $this->display();
        }else
        {
            $this->error('数据传入失败！');
        }        
    }
    /**
     * [report 录入报告]
     * @return [type] [description]
     */
    public function checkdetail()
    {
        $id = I('get.id',0,'intval');
        if (!empty($id)) {
            $result = M('member_report')->where(array("id"=>$id))->find();
            $this->assign('info',$result);
            $minfo =M('member')->field('nicename,mobile')->where("id='".$result['mid']."'")->find();
            $this->assign('minfo',$minfo);
            $this->display();
        }else
        {
            $this->error('数据传入失败！');
        }        
    }
    // 检查记录
    public function checklog()
    {
         $id = I('get.id',0,'intval');
        if (!empty($id)) {
            $result = M('member')->field('id,nicename,mobile')->where(array("id"=>$id))->find();
            $count =M('member_report')->where("mid='$id'")->count();
            $page =$this->page($count,20);
            $list =M('member_report')->field('id,checktime,checkname')->where("mid='$id'")->limit($page->firstRow , $page->listRows)->order('addtime desc')->select();
            $this->assign("page", $page->show('Admin'));
            $this->assign('loglist',$list);
            $this->assign('minfo',$result);
            $this->display();
        }else
        {
            $this->error('数据传入失败！');
        }
    }
    
    public function report_post()
    {
        if(IS_POST)
        {
            $pdata =I('post.');
            if(empty($pdata['checktime']))
            {
                $this->ajaxReturn(array('status'=>1,'msg'=>'请选择检查时间'));
            }
            if(empty($pdata['checkname']))
            {
                $this->ajaxReturn(array('status'=>1,'msg'=>'请输入检查机构'));
            }
            
            if(empty($pdata['content']))
            {
                $this->ajaxReturn(array('status'=>1,'msg'=>'请输入检查结果报告'));
            }
            $count =M('member_report')->where("checktime='".$pdata['checktime']."' and mid='".$pdata['mid']."'")->count();
            if($count > 0)
            {
                $this->ajaxReturn(array('status'=>1,'msg'=>'请勿重复录取'.$pdata['checktime'].'的报告'));
            }
            $pdata['addtime'] =time();
			$pdata['againtime'] = $pdata['againtime']? $pdata['againtime']:NULL;
            $pdata['reportdesc'] = strcontentjs(htmlspecialchars_decode($pdata['content']));
            $result= M('member_report')->add($pdata);
            if($result)
            {
                if($pdata['againtime'])
                {
                    $day =date('d');
                    $day1 =date('d',strtotime($pdata['againtime']));
					$month =date('m',strtotime($pdata['againtime']));
					if(strtotime($pdata['againtime'])>=time())
					{
						if($month >= date('m'))
						{
							if($day1>=$day)
							{
								$number =$day1-$day;
							}else{
								$number =$this->diffBetweenTwoDays(date('y-m-d'),$pdata['againtime']);
							}
							
						}						
					}                    
					$number = $number > 0 ? $number : 0;
                    M('member')->where("id='".$pdata['mid']."'")->save(array('againtime'=>$pdata['againtime'],'againaddress'=>$pdata['againaddress'],'number'=>$number,'istuisong'=>0));
                }
                $this->ajaxReturn(array('status'=>0,'msg'=>'保存成功','url'=>U('Admin/Member/checklog',array('id'=>$pdata['mid']))));            
            }else
            {
                $this->ajaxReturn(array('status'=>1,'msg'=>'保存失败'));            
            }  
        }
    }
	// 编辑复查时间
	public function report_editpost()
	{
		if(IS_POST)
		{
			$pdata =I('post.');
            if(empty($pdata['checktime']))
            {
                $this->ajaxReturn(array('status'=>1,'msg'=>'请选择检查时间'));
            }
            if(empty($pdata['checkname']))
            {
                $this->ajaxReturn(array('status'=>1,'msg'=>'请输入检查机构'));
            }
            
            if(empty($pdata['content']))
            {
                $this->ajaxReturn(array('status'=>1,'msg'=>'请输入检查结果报告'));
            }
			if($pdata['checktime'] !=$pdata['oldchecktime']){
				$count =M('member_report')->where("checktime='".$pdata['checktime']."' and mid='".$pdata['mid']."'")->count();
				if($count > 0)
				{
					$this->ajaxReturn(array('status'=>1,'msg'=>'请勿重复录取'.$pdata['checktime'].'的报告'));
				}
			}
            $pdata['againtime'] = $pdata['againtime']? $pdata['againtime']:NULL;
            $pdata['reportdesc'] = strcontentjs(htmlspecialchars_decode($pdata['content']));
            $result= M('member_report')->where("id='".$pdata['id']."'")->save($pdata);
            if($result)
            {
                if(!empty($pdata['againtime']) && $pdata['oldagaintime'] != $pdata['againtime'])
                {
                    $day =date('d');
                    $day1 =date('d',strtotime($pdata['againtime']));
					$month =date('m',strtotime($pdata['againtime']));
					if(strtotime($pdata['againtime'])>=time())
					{
						if($month >= date('m'))
						{
							if($day1>=$day)
							{
								$number =$day1-$day;
							}else{
								$number =$this->diffBetweenTwoDays(date('y-m-d'),$pdata['againtime']);
							}
							
						}						
					}                    
					$number = $number > 0 ? $number : 0;
                    M('member')->where("id='".$pdata['mid']."'")->save(array('againtime'=>$pdata['againtime'],'againaddress'=>$pdata['againaddress'],'number'=>$number,'istuisong'=>0));
					
				}
				else
				{
					$resultinfo =M('member_report')->where("mid='".$pdata['mid']."' and againtime > '".date('Y-m-d',time())."'")->order("checktime desc")->find();
					
					if($resultinfo)
					{
						$day =date('d');
						$day1 =date('d',strtotime($resultinfo['againtime']));
						$month =date('m',strtotime($resultinfo['againtime']));
						if(strtotime($resultinfo['againtime'])>=time())
						{
							if($month >= date('m'))
							{
								if($day1>=$day)
								{
									$number =$day1-$day;
								}else{
									$number =$this->diffBetweenTwoDays(date('y-m-d'),$resultinfo['againtime']);
								}
								
							}						
						}                    
						$number = $number > 0 ? $number : 0;
						M('member')->where("id='".$pdata['mid']."'")->save(array('againtime'=>$resultinfo['againtime'],'againaddress'=>$resultinfo['againaddress'],'number'=>$number,'istuisong'=>0));
						
					}else{
						 M('member')->where("id='".$pdata['mid']."'")->save(array('againtime'=>NULL,'againaddress'=>$pdata['againaddress'],'number'=>0,'istuisong'=>1));
					
					}
				}
                $this->ajaxReturn(array('status'=>0,'msg'=>'保存成功'));            
            }else
            {
                $this->ajaxReturn(array('status'=>1,'msg'=>'资料无修改'));            
            }  
		}
	}
	
    /**
     * [ban 冻结]
     * @return [type] [description]
     */
    public function ban(){
        $id = I('get.id',0,'intval');
    	if (!empty($id)) {
    		$result = M('member')->where(array("id"=>$id))->setField('status','0');
    		if ($result!==false) {
    			$this->success("冻结成功！", U("member/index"));
    		} else {
    			$this->error('冻结失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }
    /**
     * [cancelban 解冻]
     * @return [type] [description]
     */
    public function cancelban(){
    	$id = I('get.id',0,'intval');
    	if (!empty($id)) {
    		$result = M('member')->where(array("id"=>$id))->setField('status','1');
    		if ($result!==false) {
    			$this->success("解冻成功！", U("member/index"));
    		} else {
    			$this->error('解冻失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }
    public function checklogedit()
	{
		$id = I('get.id',0,'intval');
    	if (!empty($id)) {
    		$result = M('member_report')->where(array("id"=>$id))->find();
			$minfo = M('member')->field('id,nicename,mobile')->where(array("id"=>$result['mid']))->find();
			$this->assign('loginfo',$result);
			$this->assign('minfo',$minfo);
    		$this->display();
    	} else {
    		$this->error('数据传入失败！');
    	}
	}
	public function delete(){
	    $id = I('get.id',0,'intval');
		$info=M('member_report')->where("id='$id'")->find();
		if (M('member_report')->where("id='$id'")->delete()!==false) {	
			$mrinfo=M('member_report')->field('againaddress,againtime')->where("mid='".$info['mid']."'")->order('checktime desc')->find();
			$day =date('d');
			$day1 =date('d',strtotime($mrinfo['againtime']));
			$month =date('m',strtotime($mrinfo['againtime']));
			if(strtotime($mrinfo['againtime'])>=time())
			{
				if($month >= date('m'))
				{
					if($day1>=$day)
					{
						$number =$day1-$day;
					}else{
						$number =$this->diffBetweenTwoDays(date('y-m-d'),$mrinfo['againtime']);
					}
					
				}						
			}                    
			$number = $number > 0 ? $number : 0;
			M('member')->where("id='".$info['mid']."'")->save(array('againaddress'=>$mrinfo['againaddress'],'againtime'=>$mrinfo['againtime'],'number'=>$number));
			
			$this->ajaxReturn(array('msg'=>"删除成功！",'status'=>0));
		} else {
			
			$this->ajaxReturn(array('msg'=>"删除失败！",'status'=>1));
		}
	}
	
	function diffBetweenTwoDays ($day1, $day2)
	{ 
		 $second1 = strtotime($day1);  $second2 = strtotime($day2);      
		 if ($second1 < $second2) {   
		  $tmp = $second2;    
		  $second2 = $second1;   
		   $second1 = $tmp;  
		}  
		return ($second1 - $second2) / 86400;
	}
	
}