<?
class usersModel extends Models {
	
	function Login($arr) {
		$username = $arr['username'];	
		$password = $arr['password'];
		return $this->db->getRow("SELECT id, username, admin FROM user WHERE username='$username' AND pass='$password'");
	}
	
	function addUser($arr){
		$arr['username'] = mysql_escape_string($arr['username']);
		$arr['pass'] = mysql_escape_string($arr['pass']);
		$this->db->Execute("INSERT INTO user (username, admin, pass, email) VALUES ('{$arr['username']}', '0', '{$arr['password']}', '{$arr['email']}')");
		return $this->insertID();
	}
	
	function AdminGetUsers(){
		return $this->PagingQuery("SELECT id, username, admin, email, birthdate, city_name FROM user ORDER BY id DESC", 10);
	}
	
	function RemoveUser($id){
		$this->db->Execute("DELETE FROM users WHERE id = '{$id}'");
	}
    
}

?>