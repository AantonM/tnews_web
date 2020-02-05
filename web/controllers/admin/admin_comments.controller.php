<?
class admin_commentsController extends Controllers {

	var $models = Array('comments');
	
	function index($id){
		if (Core::isWriter()) Core::Redirect("/admin");
		
		if ($_POST){
			$this->comments->SetApprovalStatus($id, $_POST);
		}
		
		$path[0] =  array('path' => 'Новини', 'href' => '#');
 		$path[1] =  array('path' => 'Коментар', 'href' => '#');
 		
 		$this->assign('path', $path);
		
		$comment = $this->comments->GetComment((int)$id);
		$this->assign('arr', $comment);
	}
	
	function list_comments(){
		if (Core::isWriter()) Core::Redirect("/admin");
		
		$path[0] =  array('path' => 'Новини', 'href' => '#');
 		$path[1] =  array('path' => 'Коментари', 'href' => '#');
 		
 		$this->assign('path', $path);
		
		$comments = $this->comments->AdminGetComments((int)$approved);
		$this->assign('comments', $comments);
		$this->assign('pages', $this->comments->pages);
	}
	

}
?>