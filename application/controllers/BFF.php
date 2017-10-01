<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BFF extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('User_model', 'user');
		$this->load->model('BFF_model', 'bff');
		$this->load->helper('url');
		$this->load->library('cart');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
	}

	public function index(){
		
		if(($this->session->userdata('client_id')!="")){
		   		redirect(base_url('BFF/Home/'));	
		  }
		else{
			//register or login
				$this->Home();
			}
	}

	public function Home(){	
		//session mo to

		 // if($this->session->userdata('logged_in'))
   // {
   //   $session_data = $this->session->userdata('logged_in');
   //   $data['username'] = $session_data['username'];
   //   $this->load->view('home_view', $data);
   // }
   // else
   // {
   //   //If no session, redirect to login page
   //   redirect('login', 'refresh');
   // }

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
		
		// if($this->input->post('submit')){
		// 	$this->user->signup($this->input->post('fname'), $this->input->post('lname'), $this->input->post('addr'), $this->input->post('contact'), $this->input->post('email'), $this->input->post('password'));
		  // field name, error message, validation rules
		   
		  $this->form_validation->set_rules('fname', 'Fname', 'trim|required');
		  $this->form_validation->set_rules('lname', 'Lname', 'trim|required');
		   $this->form_validation->set_rules('email', 'Email', 'trim|required');
		  $this->form_validation->set_rules('address', 'Address', 'trim|required');
		  $this->form_validation->set_rules('contact', 'Contact', 'trim|required');
		  $this->form_validation->set_rules('password', 'Password', 'trim|required');


 			 if($this->form_validation->run() === FALSE)
  			{
   				echo validation_errors();
  			}
  			else
  			{
  					$fname=$this->input->post('fname');
  					$lname=$this->input->post('lname');
  					$email=$this->input->post('email');
  					$address=$this->input->post('address');
  					$contact=$this->input->post('contact');
	  				$password=$this->input->post('password');
					  			
					  			if($this->user->signup($fname,$lname,$email,$address,$contact,$password)){
					  				redirect(base_url('BFF/Home/'));
					  			}

					  			else{
					  				$this->Signup();
					  			}

  				$this->session->set_userdata('email', $_POST['email']);
				 
  			}

 		$this->load->view('includes/headerWithoutNav.php');
		$this->load->view('signup');
		$this->load->view('includes/footer.php');
		}	
	
	public function Login(){

		$email=$this->input->post('email');
  		$password=$this->input->post('password');
		
		$this->load->view('includes/headerWithoutNav.php');
		$this->load->view('login');
		$this->load->view('includes/footer.php');
	}


	public function verifyLog(){
			$email=$this->input->post('email');
			$password = $this->input->post('password');
		
		
				// if($this->user->login($email,$password)){					
				// 	// $this->session->set_userdata();
				// 	// echo 'yeey';
				// 	redirect(base_url('BFF/Home'));
				// 	// //redirect(base_url('BFF/Home'));
				// }

				// else{
				// 	echo 'noooooooooooo';
				// }
			$this->form_validation->set_rules('email','Email','trim|required');
			$this->form_validation->set_rules('password','Password','trim|required');
			
			if($this->form_validation->run()){
				$email = $this->input->post("email");
				$password = $this->input->post("password");
				//Load model
				// $this->load->model('Account_model');
				if($this->user->login($email,$password)){
					$res=$this->user->login($email,$password);
					
					$session_data = array(
						'email'=>$email,
						'fname'=>$fname,
						'lname'=>$lname,
						'address'=>$address,
						'contact'=>$contact,
					);
					
					$this->session->set_userdata($session_data);
					redirect(base_url('BFF/Home'));
				}
				else{
					$data['flash_error']=$this->session->set_flashdata('error',"Username and password doesn't match!");
					$this->load->view('login',$data);
					redirect(base_url().'login');
					
				}
			}
			else{
				$this->login();
			}
				// $validate = array(
				// 			array('field'=>'email','label'=>'Email','rules'=>'trim|required'),
				// 			array('field'=>'password','label'=>'Password','rules'=>'trim|required'),
				// 		);
				// 		$this->form_validation->set_rules($validate);
				// 		if ($this->form_validation->run()==FALSE){
				// 			echo validation_errors();
							 
				// 		}else{

												
				// 				if($this->user->login($email,$password)){
								
				// 				redirect(base_url('BFF/Home/'));
				// 				//redirect(base_url('BFF/Home'));
				// 			}

				// 			else{
				// 				$this->login();
				// 			}
				// 			$this->session->set_userdata('email', $_POST['email']);
				// 			redirect(base_url('BFF/Home'));
				// 		}


	}
	// public function display(){
	// 	$data['details'] = $this->session->userdata('email');
	// 	$this->load->view('display', $data);
	// }

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

	public function logout()
	 {
		  $newdata = array(
		  'client_id'   =>'',
		  'lname'  =>'',
		  'email'     => '',
		  'logged_in' => FALSE,
		);

		  $this->session->unset_userdata($newdata );
		  $this->session->sess_destroy();
		  $this->index();
	 }
}
