<?
class usersController extends Controllers {
	var $models = Array (); // display other models if you want
	

	
	function logout() {
		session_destroy();
		Core::Redirect('/');
	}
	
	function login() {
		global $_TEXT;
		if ( $_SESSION['UserID'] > 0 ) Core::Redirect('/');
		
		if ( count($_POST) > 0 ) {
			$login = $this->users->Login($_POST);
		 	if ( $login ) {
				$_SESSION['UserID'] = $login['id'];
				$_SESSION['user_name'] = $login['username'];
				$_SESSION['username'] = $login['username'];
				if ( $login['admin'] == '1' || $login['admin'] == '2' )   {
					$_SESSION['admin'] = $login['admin'];
					Core::Redirect($_GET['redirect'] == '' ? '/admin/' : $_GET['redirect']);
				}
				Core::Redirect($_GET['redirect'] == '' ? '/' : $_GET['redirect']);
			} else {Core::Message('Грешно потребителско име или парола!', MSG_ERROR);}
			
		}
	}
}
?>