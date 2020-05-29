<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

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

	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('book_model');
	 	}


	public function index()
	{

		$data['books']=$this->book_model->get_all_books();
		$this->load->view('book_view',$data);
	}
	public function book_add()
		{
			$data = array(
					'nama' => $this->input->post('book_isbn1'),
					'username' => $this->input->post('book_title'),
					'password' => $this->input->post('book_author'),
					'lvl' => $this->input->post('book_category'),
				);
			$insert = $this->book_model->book_add($data);
			if($insert){

			echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
		}
		public function book_addd()
		{
			echo'kkk';
		}
		public function ajax_edit($id)
		{
			$data = $this->book_model->get_by_id($id);



			echo json_encode($data);
		}

		public function book_update()
	{
		$id_user= $this->input->post('book_id');
		$data = array(
				
					'nama' => $this->input->post('book_isbn1'),
					'username' => $this->input->post('book_title'),
					'password' => $this->input->post('book_author'),
					'lvl' => $this->input->post('book_category'),
			);
		$this->book_model->book_update($id_user, $data);
		echo json_encode(array("status8" => TRUE));
	}

	public function book_delete($id)
	{
		$this->book_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}



}
