<?
class admin_usersController extends Controllers {
 var $models = Array('users');
 
 function list_users(){
 	if (Core::isWriter()) Core::Redirect("/admin");
 	
	$path[0] =  array('path' => 'Потребители', 'href' => '#');
 	$path[1] =  array('path' => 'Списък с потребители', 'href' => '#');
 	
	$this->assign('path', $path);
 	
 	$users = $this->users->AdminGetUsers();
 	$this->assign("users", $users);
 	$this->assign("pages", $this->users->pages);
 }
 
 function delete($id){
 	if (Core::isWriter()) Core::Redirect("/admin");
 	
 	$this->users->RemoveUser($id);
 	Core::Redirect($_SERVER['HTTP_REFERER']);
 }
 
}
?>