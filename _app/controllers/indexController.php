<?php
/**
 +------------------------------------------------------------------------------
 * 联系人
 +------------------------------------------------------------------------------
 * @Version  2.5
 * @Author   WangXian
 * @E-mail    admin@loopx.cn
 * @Creation  date 2011-1-23 下午08:38:57
 * @Modified  date 2011-1-23 下午08:38:57
 +------------------------------------------------------------------------------
 */
class indexController extends controller
{
	public function __construct()
	{
		Session::init();
		if(getv('action') != 'login' && ! Session::get('username'))
		{
			R(U('index/login'));
		}
	}

	/** index **/
	public function indexAction()
	{
		if(getv('username'))
		{
			$this->view->username = urldecode(base64_decode(getv('username')));

			//打印日志
			$str = Session::get('username') .' 查看了 '. $this->view->username ." 的资料.";
			wlog('ViewContact-'.date('Y-m-d').'.log', '['. date('H:i:s') .']'.$str);
		}
		else $this->view->username = Session::get('username');
		$this->view->render();
	}

	public function loginAction()
	{
		if(postv('username'))
		{
			$myinfo = C( postv('username'),'contact');
			if(! is_array($myinfo) || !isset($myinfo['phone']) || !$myinfo['phone'] == postv('phone'))
			{
				//登陆失败
				$str =">>>>>>>>>>>>>>>>>>>>>". postv('username') ." login faild.";
				wlog('ViewContact-'.date('Y-m-d').'.log', '['. date('H:i:s') .']'.$str);

				show_error('验证未通过，请确认你输入的信息正确无误。你可以再尝试一下，如果仍然不成功，请联系我：admin@loopx.cn' );
			}

			//登陆成功
			$str =">>>>>>>>>>>>>>>>>>>>>". postv('username') ." login success.";
			wlog('ViewContact-'.date('Y-m-d').'.log', '['. date('H:i:s') .']'.$str);

			Session::set('username',postv('username'));
			R(U('index/index'));
		}
		$this->view->render();
	}

	public function viewlogAction()
	{
		echo '<pre>';
		echo file_get_contents(APP_PATH.'/runtime/logs/ViewContact-'.date('Y-m-d').'.log');
		echo '</pre>';
	}

}
/* End of file indexController.php */
/* Location: ./_app/controllers/indexController.php */