<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin1 extends CI_Controller {

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
		$this->load->library('session');	
		$this->load->model('admin_model');
	}
	public function index(){
		//load session library
		if($this->session->userdata('user')){
			
			$data['pegawai']=$this->admin_model->get_all_pegawai();
			$this->load->view('admin/index',$data);
			
		}
		else{
			$this->load->view('login');
		}
			
		
	}
	//-**tambah_pegawai**--
	public function pegawai_add()
		{
			$data = array(
					'username' => $this->input->post('book_isbn1'),
					'password' => $this->input->post('book_title'),
					'level' => $this->input->post('book_author'),
					'email' => $this->input->post('book_category'),
				);
			$insert = $this->admin_model->pegawai_add($data);
			if($insert){

			echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
		}
		//-**delete_pegawai**--
		public function pegawai_delete($id)
	{
		$this->admin_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
		//-**proses-edit-pegawai**--
	public function pegawai_edit($id)
		{
			$data = $this->admin_model->get_by_id_pegawai($id);



			echo json_encode($data);
		}

	public function pegawai_update()
	{
		$id_user= $this->input->post('book_id');
		$data = array(
					'username' => $this->input->post('book_isbn1'),
					'password' => $this->input->post('book_title'),
					'level' => $this->input->post('book_author'),
					'email' => $this->input->post('book_category'),
				);
		$this->admin_model->pegawai_update($id_user, $data);
		echo json_encode(array("status8" => TRUE));
	}
	//-------------------------------------------------
	//-------------------------------------------------
}