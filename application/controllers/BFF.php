<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BFF extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('BFF_model', 'bff');
		$this->load->model('User_model', 'user');		
	}

	public function index(){
		redirect(base_url('Home/'));
	}

	public function Home(){	
		$this->load->view('includes/header.php');
		$this->load->view('index');
		$this->load->view('includes/footer.php');
	}

	public function Album(){
		$this->load->view('includes/header.php');
		$this->load->view('album');
		$this->load->view('includes/footer.php');
	}

	public function Order(){
		$this->session->unset_userdata('sf');
		$data['PnS'] = $this->bff->dummyData();
		$this->load->view('includes/header.php');
		$this->load->view('pao', $data);
		$this->load->view('includes/footer.php');
	}

	public function Products_and_Services($pns = null){
		$this->load->view('includes/header.php');
		switch($pns){
			case "Weddings":	$this->load->view('PnS/wedding');	break;
			case "Inaugurals":	$this->load->view('PnS/inaugural');	break;			
			case "Bouquet":		$this->load->view('PnS/bouquet');	break;			
			case "Vase":		$this->load->view('PnS/vase');	break;			
			case "Sympathy":	$this->load->view('PnS/sympathy');	break;
			case "Fruits_with_Balloons_and_Decor":	$this->load->view('PnS/fruit');	break;
			default:	$this->load->view('PnS/pns');	break;
		}		
		$this->load->view('includes/footer.php');
	}

	public function AboutUs(){
		$this->load->view('includes/header.php');
		$this->load->view('aboutus');		
		$this->load->view('includes/footer.php');
	}

	public function ContactUs(){
		$this->load->view('includes/header.php');
		$this->load->view('contactus');
		$this->load->view('includes/footer.php');
	}

	public function Signup(){
		// tovs uncomment mo lng to
		// C for Create
		// function sa model: login($fname, $lname, $addr, $contact, $email, $password)
		// if($this->input->post('submit')){
		// 	$this->user->signup($this->input->post('fname'), $this->input->post('lname'), $this->input->post('addr'), $this->input->post('contact'), $this->input->post('email'), $this->input->post('password'));
		// }
		$this->load->view('includes/headerWithoutNav.php');
		$this->load->view('signup');
		$this->load->view('includes/footer.php');
	}

	public function Login(){
		// tovs uncomment mo lng to
		// R for Read
		// function sa model: login($email, $password)
		// if($this->input->post('submit')){
		// 	$this->user->login($this->input->post('email'), $this->input->post('password'));
		// }
		$this->load->view('includes/headerWithoutNav.php');
		$this->load->view('login');
		$this->load->view('includes/footer.php');
	}

	public function Privacy(){
		echo "Privacy";
	}

	public function Terms(){
		echo "Terms";		
	}

	public function Transaction($step){
		$this->load->view('includes/header.php');
		switch($step){
			case 'step_2':
				$this->load->view('transaction/step2.php');		
				break;
			case 'step_2.2':
				$this->load->view('transaction/step2.2.php');
				break;
			case 'step_3':				
				$data['ship'] = $_SESSION['sf'];
				$data['bill'] = $this->cart->total();
				$this->load->view('transaction/step3.php', $data);
				break;
		}
		$this->load->view('includes/footer.php');
	}
	
	public function addToCart($id, $name, $qty, $price){
		$data = array('id' => $id, 'qty' => $qty, 'price' => $price, 'name' => $name);
		$this->cart->insert($data);
		echo $this->displayCart();
		// redirect(base_url('Order/'));
	}

	public function displayCart(){
		$str = '
		<thead>
		  <tr><th>id</th><th>name</th><th>price</th><th>quantity</th><th>total price</th><th>Action</th></tr>
		</thead>
		<tbody>';
		foreach($this->cart->contents() as $items){
			$str .= '
		  <tr>        
		    <td>'.$items['id'].'</td>
		    <td>'.$items['name'].'</td>
		    <td>'.$items['price'].'</td>
		    <td>'.$items['qty'].'</td>
		    <td>'.$items['price'] * $items['qty'].'</td>
		    <td>
		      <a href = "'.base_url('removeFromCart/'.$items['rowid']).'">Remove from cart</a>
		    </td>
		  </tr>';
		}
		$str .= '<tr><td>Total</td><td>'.$this->cart->total().'</td></tr>';
		return $str.'</tbody>';
	}

	public function removeFromCart($rowid){		
		$this->cart->remove($rowid);
		redirect(base_url('Order/'));
	}

	public function emptyCart(){
		$this->cart->destroy();
		redirect(base_url('Order/'));
	}

	public function transact_loc(){
		$choice = $this->input->post('address');		
		if($choice == 2){//Deliver to a different address
			redirect(base_url('Transaction/step_2.2'));
		}else{
			if($choice == 0){//Deliver to my address
				//kunin sa db location ni client
				//dummy client whose address is in Manila				
				$this->session->set_userdata('sf', 200);				
			}else{//I'll pick it up myself
				$this->session->set_userdata('sf', 0);
			}
			redirect(base_url('Transaction/step_3'));
		}		
	}

	public function transact_exloc(){
		$ship = $this->input->post('ship_address');		
		$this->session->set_userdata('sf', $ship);		
		$loc = $this->input->post('exact_address');		
		redirect(base_url('Transaction/step_3'));
	}

	public function transact_pay(){
		$choice = $this->input->post('payment');
		$card;
		if($choice == 1){
			$card = $this->input->post('card-details');
		}
	}

	public function finishOrder(){
		$this->bff->saveOrder($this->bff->generateID('order_id', 'orders'));
		echo "Thank you for ordering!";
	}

}
