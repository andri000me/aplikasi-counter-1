<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('auth_model');
		$this->load->library('session');
	}
	public function index(){
		//load session library
		

		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
			redirect('auth/home');
		}
		else{
			$this->load->view('login/login');
		}
	}
	public function login(){
		//load session library
		$this->load->library('session');

		$output = array('error' => false);

		$email = $_POST['email'];
		$password = $_POST['password'];

		$data = $this->auth_model->login($email, $password);

		if($data){
			$this->session->set_userdata('user', $data);
			$output['message'] = 'Logging in. Please wait...';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Login Invalid. User not found';
		}

		echo json_encode($output); 
	}
	public function home(){
		//load session library
		$this->load->library('session');

		//restrict users to go to home if not logged in
		if($this->session->userdata('user')){
			
				$user = $this->session->userdata('user');
				extract($user);
				if($level=='pegawai'){
					
					redirect('pegawai');
				}elseif($level=='admin'){
					redirect('admin');
				}elseif($level=='owner'){
					redirect('pegawai');
				}
			
		}
		else{
			redirect('/');
		}
		
	}

	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}

}

?>
