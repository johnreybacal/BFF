<?php
	class User_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		// C
		public function signup($fname,$lname,$address,$contact,$email,$password){
			$client_id = "0000";
			$query = $this->db->query("SELECT client_id FROM client order by client_id ASC");
			foreach($query->result_array() as $row){
				$client_id = $row["client_id"];				
			}
			$temp = (int)$client_id + 1;
			$client_id = "0000".$temp;
			$client_id = substr($client_id,strlen($client_id)-4,strlen($client_id));			
			$qry = "INSERT INTO client VALUES ('$client_id', '$fname', '$lname', '$email', '$address', '$contact', '$password')";
			if($this->db->simple_query($qry)){
				echo "wow";
			}
			else{				
				// echo "'".$client_id."','".$fname.",'".$lname."','".$email."','".$address."','".$contact."','".$password."'";
				echo $qry;
			}
		}

		// R
		public function login($email,$password){

			//
			$query = $this->db->query("SELECT FROM client WHERE email = $email AND password = $password");
			
			// results from querry will be looped
			foreach($query->result_array() as $row){
				$client_id = $row["client_id"];				
			}  
		}

		public function

	}
?>
