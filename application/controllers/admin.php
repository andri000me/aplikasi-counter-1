<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
			$this->load->view('login/login');
		}
			
		
	}
	//-**tambah_pegawai**--
	public function pegawai_add()
		{
			$data = array(
					'username' => $this->input->post('a'),
					'password' => $this->input->post('b'),
					'level' => $this->input->post('c'),
					'email' => $this->input->post('d'),
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
		
		public function form_pegawai()
		{
			$data['pegawai']=$this->admin_model->get_all_pegawai();
			$this->load->view('admin/pegawai',$data);
		}

	public function pegawai_update()
	{
		$id_user= $this->input->post('book_id');
		$data = array(
					'username' => $this->input->post('a'),
					'password' => $this->input->post('b'),
					'level' => $this->input->post('c'),
					'email' => $this->input->post('d'),
				);
		$this->admin_model->pegawai_update($id_user, $data);
		echo json_encode(array("status8" => TRUE));
	}
	//-------------------------------------------------
	//-------------------------------------------------
	
	public function form_kategori()
		{
			$data['kategori']=$this->admin_model->get_all_kategori();
			$this->load->view('admin/kategori',$data);
		}
		//**delt-kategori
		
	public function kategori_delete($id)
	{
		$this->admin_model->delete_by_id_kategori($id);
		echo json_encode(array("status" => TRUE));
	}
	//**tmbh-kategori
	public function kategori_add()
		{
			$data = array(
					'kategori' => $this->input->post('a'),
					
				);
			$insert = $this->admin_model->kategori_add($data);
			if($insert){

			echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
		}
	//**edit-kategori
	public function kategori_edit($id)
		{
			$data = $this->admin_model->get_by_id_kategori($id);



			echo json_encode($data);
		}
		
	public function kategori_update()
	{
		$id_kategori= $this->input->post('book_id');
		$data = array(
					'kategori' => $this->input->post('a'),
					
				);
		$this->admin_model->kategori_update($id_kategori, $data);
		echo json_encode(array("status8" => TRUE));
	}
	
	//***-----------------brand-------------***
	public function form_brand()
		{
			$data['brand']=$this->admin_model->get_all_brand();
			$this->load->view('admin/brand',$data);
		}
	public function brand_delete($id)
	{
		$this->admin_model->delete_by_id_brand($id);
		echo json_encode(array("status" => TRUE));
	}
	//**tmbh-brand
	public function brand_add()
		{
			$data = array(
					'brand' => $this->input->post('a'),
					
				);
			$insert = $this->admin_model->brand_add($data);
			if($insert){

			echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
		}
	//**edit-brand
	public function brand_edit($id)
		{
			$data = $this->admin_model->get_by_id_brand($id);



			echo json_encode($data);
		}
		
	public function brand_update()
	{
		$id_brand= $this->input->post('book_id');
		$data = array(
					'brand' => $this->input->post('a'),
					
				);
		$this->admin_model->brand_update($id_brand, $data);
		echo json_encode(array("status8" => TRUE));
	}
	
		//***-----------------barang-------------***
	public function form_barang()
		{
			$data['kategori']=$this->admin_model->get_all_kategori();
			$data['brand']=$this->admin_model->get_all_brand();
			$data['barang']=$this->admin_model->get_all_barang();
			$this->load->view('admin/barang',$data);
		}
	public function barang_delete($id)
	{
		$this->admin_model->delete_by_id_barang($id);
		echo json_encode(array("status" => TRUE));
	}
	//**tmbh-barang
	public function barang_add()
		{
			$data = array(
					'barang' => $this->input->post('a'),
					'id_brand' => $this->input->post('b'),
					'id_kategori' => $this->input->post('c'),
					'harga' => $this->input->post('d'),
					'tipe' => $this->input->post('e'),
					'poin' => $this->input->post('f'),
			
					
					
				);
			$insert = $this->admin_model->barang_add($data);
			if($insert){

			echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
		}
	//**edit-barang
	public function barang_edit($id)
		{
			$data = $this->admin_model->get_by_id_barang($id);



			echo json_encode($data);
		}
		
	public function barang_update()
	{
		$id_barang= $this->input->post('book_id');
		$data = array(
					'barang' => $this->input->post('a'),
					'id_brand' => $this->input->post('b'),
					'id_kategori' => $this->input->post('c'),
					'harga' => $this->input->post('d'),
					'tipe' => $this->input->post('e'),
				'poin' => $this->input->post('f'),
					
				);
		$this->admin_model->barang_update($id_barang, $data);
		echo json_encode(array("status8" => TRUE));
	}
	
			//***-----------------produk_fokus-------------***
	public function form_produk_fokus()
		{
			$data['barang']=$this->admin_model->get_all_barang1();
			$data['brand']=$this->admin_model->get_all_brand();
			$data['kategori']=$this->admin_model->get_all_kategori();
			$data['produk_fokus']=$this->admin_model->get_all_produk_fokus();
			$this->load->view('admin/produk_fokus',$data);
		}
	public function produk_fokus_delete($id)
	{
		$this->admin_model->delete_by_id_produk_fokus($id);
		echo json_encode(array("status" => TRUE));
	}
	//**tmbh-produk_fokus
	public function produk_fokus_add()
		{
			$data = array(
					'p_fokus' => $this->input->post('a'),
					'p_bulan' => $this->input->post('b'),
					'P_tahun' => $this->input->post('c'),
					'p_all' => $this->input->post('d'),
					'id_kategori' => $this->input->post('e'),
			
					
					
				);
			$insert = $this->admin_model->produk_fokus_add($data);
			if($insert){

			echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
		}
	//**edit-produk_fokus
	public function produk_fokus_edit($id)
		{
			$data = $this->admin_model->get_by_id_produk_fokus($id);



			echo json_encode($data);
		}
		
	public function produk_fokus_update()
	{
		$id_produk_fokus= $this->input->post('book_id');
		$data = array(
					'p_fokus' => $this->input->post('a'),
					'p_bulan' => $this->input->post('b'),
					'P_tahun' => $this->input->post('c'),
					'p_all' => $this->input->post('d'),
					'id_kategori' => $this->input->post('e'),
					
				);
		$this->admin_model->produk_fokus_update($id_produk_fokus, $data);
		echo json_encode(array("status8" => TRUE));
	}
	//**target-pegawai-view------------------------------
	public function form_target_pegawai()
		{
			$data['pegawai']=$this->admin_model->get_all_pegawai1();
			$data['kategori']=$this->admin_model->get_all_kategori();
			$data['target_pegawai']=$this->admin_model->get_all_target_pegawai();
			$this->load->view('admin/target_pegawai',$data);
		}
		
		public function target_pegawai_delete($id)
	{
		$this->admin_model->delete_by_id_target_pegawai($id);
		echo json_encode(array("status" => TRUE));
	}
	//**tmbh-target_pegawai
	public function target_pegawai_add()
		{
			$data = array(
					'id_user' => $this->input->post('a'),
					'id_kategori' => $this->input->post('b'),
					'fokus' => $this->input->post('c'),
					'all' => $this->input->post('d'),
					'bulan_target' => $this->input->post('e'),
					'tahun_target' => $this->input->post('f'),
			
					
					
				);
			$insert = $this->admin_model->target_pegawai_add($data);
			if($insert){

			echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
		}
	//**edit-target_pegawai
	public function target_pegawai_edit($id)
		{
			$data = $this->admin_model->get_by_id_target_pegawai($id);



			echo json_encode($data);
		}
		
	public function target_pegawai_update()
	{
		$id_target_pegawai= $this->input->post('book_id');
		$data = array(
					'id_user' => $this->input->post('a'),
					'id_kategori' => $this->input->post('b'),
					'fokus' => $this->input->post('c'),
					'all' => $this->input->post('d'),
					'bulan_target' => $this->input->post('e'),
					'tahun_target' => $this->input->post('f'),
					
				);
		$this->admin_model->target_pegawai_update($id_target_pegawai, $data);
		echo json_encode(array("status8" => TRUE));
	}

	
	
	
	
	
}