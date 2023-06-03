<?php
include 'crud.php';
$crud = new Crud;
class Auth extends Crud
{
	
	public function __construct()
		{
			$this->db = new mysqli($this->server_name, $this->db_username, $this->db_password, $this->db_name);
			if (!$this->db) {
				print($this->db->num_error);
				exit();
			}
		}

	public	function getName($user)
		{
			$query = "SELECT * FROM polling_unit WHERE uniqueid ='$user' ";
			$query_run = $this->db->query($query);
			$row = $query_run->fetch_assoc();
			$user = $row['polling_unit_name'];
			return $user;
		}

	public	function getTableCount($table){
			$query = "SELECT * FROM ".$table." ";
			$query_run = $this->db->query($query);
			$row = mysqli_num_rows($query_run);
			return $row;
		}

	public	function getTableSum($table,$column){
			$query = "SELECT SUM($column) AS col_sum FROM ".$table." ";
			$query_run = $this->db->query($query);
			$row = $query_run->fetch_assoc();
			return $row['col_sum'];
		}

		
	public	function getTableCountUser($id){
			$query = "SELECT * FROM polling_unit WHERE lga_id ='$id'";
			$query_run = $this->db->query($query);
			$row = mysqli_num_rows($query_run);
			return $row;
		}

}
$auth = new Auth;
?>