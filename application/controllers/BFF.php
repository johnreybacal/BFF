<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BFF extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('User_model', 'user');
		$this->load->helper('url');
	}

	public function index(){
		redirect(base_url('BFF/Home/'));
	}

	public function Home(){	
		$this->load->view('index');
	}

	public function Album(){
		$this->load->view('album');
	}

	public function Order(){
		$this->load->view('pao');
	}

	public function Products_and_Services($pns = null){
		switch($pns){
			case "Weddings":	$this->load->view('wedding');	break;
			case "Inaugurals":	$this->load->view('inaugural');	break;			
			case "Bouquet":		$this->load->view('bouquet');	break;			
			case "Vase":		$this->load->view('vase');	break;			
			case "Sympathy":	$this->load->view('sympathy');	break;
			case "Fruits_with_Balloons_and_Decor":	$this->load->view('fruits');	break;
			default:	$this->load->view('pns');	break;
		}		
	}

	public function AboutUs(){
		$this->load->view('aboutus');		
	}

	public function ContactUs(){
		$this->load->view('contactus');
	}

	public function Signup(){
		// tovs uncomment mo lng to
		// C for Create
		// function sa model: login($fname, $lname, $addr, $contact, $email, $password)
		// if($this->input->post('submit')){
		// 	$this->user->signup($this->input->post('fname'), $this->input->post('lname'), $this->input->post('addr'), $this->input->post('contact'), $this->input->post('email'), $this->input->post('password'));
		// }
		$this->load->view('signup');
	}

	public function Login(){
		// tovs uncomment mo lng to
		// R for Read
		// function sa model: login($email, $password)
		// if($this->input->post('submit')){
		// 	$this->user->login($this->input->post('email'), $this->input->post('password'));
		// }
		$this->load->view('login');
	}

	public function Privacy(){
		echo "Privacy";
	}

	public function Terms(){
		echo "Terms";		
	}

}
