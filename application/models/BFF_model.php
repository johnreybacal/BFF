<?php
	class BFF_model extends CI_Model{

		public function dummyData(){
			$data = array(
				array('id' => '0001', 'name' => 'Sunflower', 'price' => 50),
				array('id' => '0002', 'name' => 'Vase', 'price' => 100),
				array('id' => '0003', 'name' => 'Balloons', 'price' => 10)
			);
			return $data;
		}

	}
?>