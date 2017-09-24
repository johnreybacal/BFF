<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BFF extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('User_model', 'user');
		$this->load->helper('url');
	}

	public function index(){
		if($this->session->userdata('client_id'))
		redirect(base_url('BFF/Home/'));
	}

	public function Home(){	
		if($this->session->userdata('client_id'))
		$this->load->view('index');
	}

	public function Album(){
		if($this->session->userdata('client_id'))
		$this->load->view('album');
	}

	public function Order(){
		if($this->session->userdata('client_id'))
		$this->load->view('pao');
	}

	public function Products_and_Services($pns = null){
		switch($pns){
			case "Weddings":	$this->load->view('wedding');	break;
			case "Inaugurals":	$this->load->view('inaugural');	break;			
			case "Bouquet":		$this->load->view('bouquet');	break;			
			case "Vase":		$this->load->view('vase');	break;			
			case "Sympathy":	$this->load->view('sympathy');	break;
			case "Fruits_with_Balloons_and_Decor":	$this->load->view('fruit');	break;
			default:	$this->load->view('pns');	break;
		}		
	}

	public function AboutUs(){
		if($this->session->userdata('client_id'))
		$this->load->view('aboutus');		
	}

	public function ContactUs(){
		if($this->session->userdata('client_id'))
		$this->load->view('contactus');
	}

	public function Signup(){
		// tovs uncomment mo lng to
		// C for Create
		// function sa model: login($fname, $lname, $addr, $contact, $email, $password)
		if($this->input->post('submit')){
			$this->user->signup($this->input->post('fname'), $this->input->post('lname'), $this->input->post('addr'), $this->input->post('contact'), $this->input->post('email'), $this->input->post('password'));
		}
		else{
			$this->load->view('signup');
		}
	}

	public function Login(){
		// tovs uncomment mo lng to
		// R for Read
		// function sa model: login($email, $password)
		if($this->input->post('submit')){
			$this->user->login($this->input->post('email'), $this->input->post('password'));
		
				$this->load->view('login');	

				if($this->User_model->check($email,$password)){
					$result =$this->User_model->get_data($email,$password);
						foreach($result as $obj){
						$session_data = array(
							'client_id'=>$client_id,
							'email' =>$obj->email,
							'firstname' =>$obj->fname,
							'lastname' =>$obj->lname,
							'address' =>$obj->address,
							'contact' =>$obj->contact,
						);
						}
						$this->session->set_userdata($session_data);
						redirect(base_url().'home');
					}
				else{
					
					$data['flash_error']=$this->session->set_flashdata('error',"Username or password doesn't match!");
						
						$this->load->view('login',$data);
						redirect(base_url().'login');
						
					}
			
		}

		else{
			$this->login();
		}

	}

	public function Privacy(){
		if($this->session->userdata('client_id'))
		echo "Privacy";
	}

	public function Terms(){
		if($this->session->userdata('client_id'))
		echo "Terms";		
	}

	public function logout(){
			$this->session->sess_destroy();
			redirect(base_url().'home');
		}		
}
