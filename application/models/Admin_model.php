<?php
	class Admin_model extends CI_Model{

		public function getReport($table){
			$report = [];
			$query = $this->db->query("SELECT * FROM ".$table);
			foreach($query->result_array() as $row){
				$report[] = $row;
			}
			return $report;
		}

		public function cancelOrder($order_id){
			$this->db->query("DELETE FROM orders WHERE order_id = '".$order_id."'");			
		}

		public function finishTransaction($order_id, $trans_id){			
			$json = '';
			$bill = 0;
			$client_id = '';
			$id = ''; $qty = 0;
			$query = $this->db->query("SELECT * FROM orders WHERE order_id = '".$order_id."'");
			foreach ($query->result_array() as $row){
				$json = json_decode($row['cart'], true);
				$cart = $row['cart'];
				$bill = $row['total_bill'];
				$client_id = $row['client_id'];
			}
			$this->db->query("DELETE FROM orders WHERE order_id = '".$order_id."'");
			foreach($json as $key => $val){				
				if(is_array($val)){					
					$this->db->query("UPDATE inventory SET quantity = quantity - ".$val['qty']." WHERE inv_id = ".$val['id']);
				}
			}
			$this->db->query("INSERT INTO transactions (trans_id, client_id, cart, date, total_bill) VALUES ('".$trans_id."', '".$client_id."', '".$cart."', '".date("Y/m/d")."', '".$bill."')");			
		}

		public function logTransaction(){
			$counter = 0;
			//generate json for cart
			$str = '{';
			foreach($this->cart->contents() as $items){
				$this->db->query("UPDATE inventory SET quantity = quantity - ".$items['qty']." WHERE inv_id = ".$items['id']);
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
			$trans_id = $this->generateID('trans_id', 'transactions');
			$this->db->query("INSERT INTO transactions (trans_id, client_id, cart, date, total_bill) VALUES ('".$trans_id."', '0001', '".$str."', '".date("Y/m/d")."', '".($this->cart->total() + $_SESSION['sf'])."')");			
		}
		
	}
?>