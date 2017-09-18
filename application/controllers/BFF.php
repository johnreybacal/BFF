<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BFF extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('User_model', 'user');
		$this->load->model('BFF_model', 'bff');
		$this->load->helper('url');
		$this->load->library('cart');
	}

	public function index(){
		redirect(base_url('BFF/Home/'));
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

	public function addToCart($id, $name, $qty, $price){
		$data = array(
			'id' => $id,
			'qty' => $qty,
			'price' => $price,
			'name' => $name
		);
		$this->cart->insert($data);
		echo $this->displayCart();
		// redirect(base_url('BFF/Order/'));
	}

	public function getRefCode(){
		echo '<h5>Your bill is: <strong>'.$this->cart->total().' Pesos</strong></h5><h5>Your reference code will be: '.md5(str_shuffle('0001'.$this->cart->total_items().$this->cart->total())).'</h5>';
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
		      <a href = "'.base_url('BFF/removeFromCart/'.$items['rowid']).'">Remove from cart</a>
		    </td>
		  </tr>';
		}
		return $str.'</tbody>';
	}

	public function removeFromCart($rowid){		
		$this->cart->remove($rowid);
		redirect(base_url('BFF/Order/'));
	}

	public function emptyCart(){
		$this->cart->destroy();
		redirect(base_url('BFF/Order/'));
	}

}
