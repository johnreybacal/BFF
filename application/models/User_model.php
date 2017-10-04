<?php
	class User_model extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function Signup($id, $f, $m, $l, $e, $c, $s, $b, $c2, $p){
			$sql = "INSERT INTO clients VALUES ('$id', '$f', '$m', '$l', '$e', '$c', '$s', '$b', $c2, '$p')";			
			return $this->db->simple_query($sql);
		}

		public function Login($email, $password){
			$query = $this->db->query("SELECT * FROM clients WHERE email = '".$email."' AND password = '".$password."'");
			$ok = false;
			$session_data = [];
			foreach($query->result() as $row){
				$session_data = array(
					'client_id' => $row->client_id,					
					'name' => $row->name,
					'logged_in' => true
				);
				$ok = true;
			}
			if($ok){
				return $session_data;
			}else{
				return "Invalid username or password";
			}
		}
		
	}
?>