<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\page;
class UserController extends Controller {
    public  function userlist()
    {   
    	$model=M('user');   
   		$count=$model->where($where)->count(); //where 为条件,可作分类分页 

   		$page=new Page($count,8);	//count总页数,limit是显示的行数   
	    $sPages=$page->show();
	    $userlist=$model->where($where)->limit($page->firstRow.',8' )->select();
	    $this->assign('sPages',$sPages);// 赋值分页输出  
    	$this->assign("userlist",$userlist);
        $this->display();	
    }
}