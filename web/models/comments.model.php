<?
class commentsModel extends Models {

	function AdminGetComments($approved){

		return $this->PagingQuery("SELECT c.id, c.from, c.text, c.date, n.title, c.object_id FROM comments AS c, news AS n WHERE c.object_id = n.id ORDER BY c.id DESC", 10);
	}
	
	function getShow($id, $field){
		return $this->db->GetOne("SELECT $field FROM comments WHERE id = '$id'");
	}

	function setShow($id, $val, $field){
		$this->db->Execute("UPDATE comments SET $field =  '$val' WHERE id = '$id'");
	}
	
	function GetComment($id){
		return $this->db->GetRow("SELECT `from`, `text`, `date` FROM comments WHERE id = {$id}");
	}
	
}
?>