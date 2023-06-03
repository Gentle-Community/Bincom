<?php

// include '../database/app.php';

	class Crud
	{
		public $server_name = 'localhost';
		public $db_username = 'root';
		public $db_password = '';
		public $db_name = 'bincom_test';
		public $db;
		
		public function __construct()
		{
			$this->db = new mysqli($this->server_name, $this->db_username, $this->db_password, $this->db_name);
			if (!$this->db) {
				print($this->db->num_error);
				exit();
			}
		}

		public function create_data($table, $fields = []){

		    $insert = "INSERT INTO ".$table." (" .implode(",", array_keys($fields)).") VALUES('" .implode("','", array_values($fields))."')";
		    $query_run = $this->db->query($insert);

		    if ($query_run) {
		        return true;
		    } else {
		       return false;
		    }
		}

		public function view($table){
    
	    $select = "SELECT * FROM ".$table." ";
	    $query_run = $this->db->query($select);
	      $data = array();

	      if ($query_run) 
	        {
	          while ($row = $query_run->fetch_assoc()) {
	            $data[] = $row;
	          }
	          return $data;
	        } 
	        else {
	            echo "No record found";
	        }   
    
    	}

		public function selectWhere($table, $where = [])
		{
			$condition = "";
			$data = array();
			foreach ($where as $key => $value) {
				$condition .= $key. " = '".$value."' AND ";
			}
			$condition = substr($condition, 0, -5);
			$select = "SELECT * FROM ".$table." WHERE ".$condition."";
			$query_run = $this->db->query($select);

			while ($row = $query_run->fetch_assoc()) {
		            $data[] = $row;
		          }
		          return $data;
		}

		public function slugurl($string)
      {
        $slug = trim($string, '-');
        $slug = preg_replace('/[^a-zA-Z0-9 -]/','-', $slug);
        $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
        $slug = str_replace('','-',$slug);
        $slug = strtolower($slug);
        return $slug;
      }

      public function update($table, $fields, $where )
      {
      	$condition = "";
				$query = "";

					foreach ($fields as $key => $value) {
					$query .= $key. " = '".$value."', ";
				}
				$query = substr($query, 0, -2);

					foreach ($where as $key => $value) {
					$condition .= $key. " = '".$value."' AND ";
				}
				$condition = substr($condition, 0, -5);
				$select = "UPDATE ".$table." SET ".$query." WHERE ".$condition." ";
				$query_run = $this->db->query($select);

				if ($query_run) {
					return true;
				} else {
					return false;
				}
			}
				
		public function del($table, $where)
		{
			$condition = "";
				foreach ($where as $key => $value) {
					$condition .= $key. " = '".$value."' AND ";
				}
				$condition = substr($condition, 0, -5);
					$select = "DELETE  FROM ".$table." WHERE ".$condition." ";
				$query_run = $this->db->query($select);
				if ($query_run) {
					return true;
				} else {
					return false;
				}

      }
	}
?>