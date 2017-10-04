<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('BFF_model', 'bff');
		$this->load->model('Admin_model', 'admin');
		$this->load->model('User_model', 'user');		
	}

	public function index(){
		$this->load->view('Admin/index');
	}

	public function Dashboard(){
		$this->load->view('Admin/dashboard');
	}

	public function Clients(){
		// $this->load->view('Admin/includes/header');
		$this->load->view('Admin/clients');
	}

	public function Inventory(){
		$data['inv'] = $this->admin->getReport('inventory');
		$this->load->view('Admin/inventory', $data);
	}

	public function Orders(){
		$data['ord'] = $this->admin->getReport('orders');
		$this->load->view('Admin/orders', $data);
	}

	public function Transactions(){
		$data['trans'] = $this->admin->getReport('transactions');
		$this->load->view('Admin/transactions', $data);
	}

	public function saveTransaction($order_id){
		$this->admin->finishTransaction($order_id, $this->bff->generateID('trans_id', 'transactions'));
		redirect(base_url('Admin/Orders'));
	}

	public function cancelOrder($order_id){
		$this->admin->cancelOrder($order_id);
		redirect(base_url('Admin/Orders'));
	}

	public function Log_Transaction(){
		$data['PnS'] = $this->bff->dummyData();
		$this->load->view('Admin/logtransaction', $data);
	}

	public function makeCart(){
		$pns = $this->bff->dummyData();
		$param = file_get_contents('php://input');
		header('Content-type: application/json');
		$nani = explode("|",$param);
		// $this->session->set_userdata('json', $json);
		$json = json_decode($nani[0], true);		
		$this->cart->destroy();
		$this->session->set_userdata('sf', $nani[1]);
		foreach($json as $id => $qty){
			for($x = 0; $x < count($pns); $x++){
				if($pns[$x]['id'] == $id){
					$this->cart->insert(
						array(
							'id' => $id,
							'qty' => $qty,
							'price' => $pns[$x]['price'],
							'name' => $pns[$x]['name']
						)
					);
				}
			}
		}
	}

	public function displayCart(){
		$str = '<thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th></tr></thead><tbody>';
		foreach ($this->cart->contents() as $items){
			$str .= '<tr>';
			$str .= '<td>'.$items['id'].'</td>';
			$str .= '<td>'.$items['name'].'</td>';
			$str .= '<td>'.$items['price'].'</td>';
			$str .= '<td>'.$items['qty'].'</td>';
			$str .= '</tr>';
		}
		$str .= '</tbody';
		$str .= '<tfoot><tr><td>Bill:</td><td>'.$this->cart->total().'</td><td>Ship:</td><td>'.$_SESSION['sf'].'</td></tr></tfoot>';
		echo $str;
	}

	public function logTrans(){
		$this->admin->logTransaction();
	}

}
