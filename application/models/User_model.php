<?php
	class User_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		// C
		public function signup($fname,$lname,$email,$address,$contact,$password){
			
			// id generation
			$client_id = "0000";
			$query = $this->db->query("SELECT client_id FROM client_tbl order by client_id ASC");
			foreach($query->result_array() as $row){
				$client_id = $row["client_id"];				
			}
			$temp = (int)$client_id + 1;
			$client_id = "0000".$temp;
			$client_id = substr($client_id,strlen($client_id)-4,strlen($client_id));	

			//db insertion		
			// $qry = "INSERT INTO client_tbl VALUES ('$client_id', '$fname', '$lname', '$email', '$address', '$contact', '$password')";
			// if($this->db->simple_query($qry)){
			// 	// echo "wow";
			
		

			// }

			// else{				
			// 				echo $qry;
			// }
			
		$newdata = array(
				'client_id' => $client_id,
				 'fname' => $fname,
				 'lname' => $lname,
				 'email' => $email,
				 'address' => $address,
				 'contact' => $contact,
				 'password' => $password,
				);
			
			$this->db->insert('client_tbl', $newdata);
			return $newdata;

		}

		// R
		public function login($email,$password){

			// //
			$query = $this->db->query("SELECT * FROM client_tbl WHERE email = '$email' AND password = '$password'");
			
			// // results from querry will be looped
			if($query->num_rows() == 1){
			foreach($query->result_array() as $row){
		 		
				$client_id = $row["client_id"];
				$email = $row["email"];
				$fname = $row["fname"];			
				echo "Welcome";		 					 		
			}
			$newdata = array(
				// 'client_id'  => $client_id,
				// 'fname'     => $fname,
				'email'=>$email,
				'password'=>$password,
				'logged_in' => TRUE
			);
			 return $newdata;
			 }

			 else
			   {
			     return FALSE;
			   }
			 // return $query->result();	
		  // $this->db->select('client_id,email, password');
		 //   $this->db->from('client_tbl');
		 //   $this->db->where('email', $email);
		 //   $this->db->where('password', $password);
		 //   //$this->db->limit(1);

		    // $query = $this->db->get();

			   

		}


	// 	public function checklog($email,$password){
			
	// 		echo $email;
	// 		echo $password;
	// 		if($this->db->simple_query("SELECT * FROM client_tbl WHERE email = '$email' AND password = '$password'")){
	// 			return TRUE;
	// 			}

	// 		else{
	// 			return FALSE;
	// 		}	

	// }


}
?>
