<?php
	class BFF_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}
		
		public function dummyData(){
			$data = array(
				array('id' => '0001', 'name' => 'Sunflower', 'price' => 50),
				array('id' => '0002', 'name' => 'Vase', 'price' => 100),
				array('id' => '0003', 'name' => 'Balloons', 'price' => 10)
			);
			return $data;
		}

		public function generateID($idCol, $table){
			$id = "0000";
			$query = $this->db->query("SELECT $idCol FROM $table order by $idCol ASC");
			foreach($query->result_array() as $row){
				$id = $row[$idCol];				
			}
			$temp = (int)$id + 1;
			$id = "0000".$temp;
			$id = substr($id,strlen($id)-4,strlen($id));
			return $id;
		}


		public function saveOrder($order_id){
			$counter = 0;
			//generate json for cart
			$str = '{';
			foreach($this->cart->contents() as $items){
				if($counter > 0){
					$str .= ',';
				}
				$str .= '"'.$counter.'":{';
				$str .= '"id": "'.$items['id'].'",';
				$str .= '"name": "'.$items['name'].'",';
				$str .= '"qty": "'.$items['qty'].'"';
				$str .= '}';				
				$counter++;
			}
			$str = substr($str, 0, strlen($str));
			$str .= '}';
			$order_id = $this->generateID('order_id', 'orders');
			$this->db->query("INSERT INTO orders (order_id, client_id, cart, date, total_bill) VALUES ('".$order_id."', '".$this->session->userdata('client_id')."', '".$str."', '".date("Y/m/d")."', '".($this->cart->total() + $_SESSION['sf'])."')");
		}
		
	}
?>