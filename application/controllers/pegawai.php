<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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
		$this->load->model('pegawai_model');
		ini_set('date.timezone', 'Asia/Jakarta');
		
		
	}
	public function index(){
		//load session library
		if($user = $this->session->userdata('user')){
			extract($user);
			$id_user;
			$username;
			$data['level']=$level;
			
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
		    $bulan1=date('Y-m');
			$data['tgl']=$tgl;
			$data['poin']=$this->pegawai_model->poin ($bulan1,$id_user);
			
			
			//star5
			$star5=$this->pegawai_model->star5($id_user);
			$data['star5']=$star5->num_rows();
			//star4
			$star4=$this->pegawai_model->star4($id_user);
			$data['star4']=$star4->num_rows();
			//star3
			$star3=$this->pegawai_model->star3($id_user);
			$data['star3']=$star3->num_rows();
			//star2
			$star2=$this->pegawai_model->star2($id_user);
			$data['star2']=$star2->num_rows();
			//star1
			$star1=$this->pegawai_model->star1($id_user);
			$data['star1']=$star1->num_rows();
			//$t_star
			$tot_star=$data['star1']+$data['star2']+$data['star3']+$data['star4']+$data['star5'];
			$data['tot_star']=$tot_star;
			
			//pencapaian
			$data['target_pegawai_fokus_tercapai']=$this->pegawai_model->get_all_target_pegawai_fokus_tercapai ($username,$bulan,$tahun);
			$data['target_pegawai_all_type_tercapai']=$this->pegawai_model->get_all_target_pegawai_all_type_tercapai ($username,$bulan,$tahun);
			$data['pegawai']=$this->pegawai_model->get_all_pegawai1();
			$data['pegawai12']=$this->pegawai_model->get_all_pegawai2($id_user);
			//pegawai
			$this->load->view('pegawai/index',$data);
			
			
			
		}
		else{
			$this->load->view('login/login');
		}
			
		
	}
	//target pegawai
	public function target_pegawai()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			
			//menampilkan dasboard pegawai 
			
			$target_pegawai_fokus=$data['target_pegawai_fokus']=$this->pegawai_model->get_all_target_pegawai_fokus($bulan,$tahun,$id_user);
			//untuk menampilkan jumlah target fokus
			
			$data['target_pegawai_fokus_tercapai']=$this->pegawai_model->get_all_target_pegawai_fokus_tercapai ($username,$bulan,$tahun);
			
		
			
			$data['target_pegawai_all_type_tercapai']=$this->pegawai_model->get_all_target_pegawai_all_type_tercapai ($username,$bulan,$tahun);
				
						
			
				$data['level']=$level;
			$this->load->view('pegawai/target_pegawai',$data);
		}
		//statistik pegawai
	public function statistik_pegawai()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			$bulan1=date('Y-m');
			//menampilkan dasboard pegawai 
			
			
			//menampilkan total transaksi sukses per hari
			$data1=$data['transaksi_statistik1']=$this->pegawai_model->get_all_transaksi_statistik_beli($tgl);
			$tot=$data1->num_rows();
			$data['beli']=$tot;
			//menampilkan total transaksi gagal per hari
			$data2=$data['transaksi_statistik2']=$this->pegawai_model->get_all_transaksi_statistik_tdk($tgl);
			$tot2=$data2->num_rows();
			$data['tdk']=$tot2;
			
			//menampilkan total transaksi sukses per bulan
			$data1_bln=$data['transaksi_statistik1_bln']=$this->pegawai_model->get_all_transaksi_statistik_beli_bln($bulan);
			$tot_bln=$data1_bln->num_rows();
			$data['beli_bln']=$tot_bln;
			
			//menampilkan total transaksi gagal per hari
			$data2_bln=$data['transaksi_statistik2_bln']=$this->pegawai_model->get_all_transaksi_statistik_tdk_bln($bulan);
			$tot2_bln=$data2_bln->num_rows();
			$data['tdk_bln']=$tot2_bln;
			
			//menampilkan tgl untuk grafik periode bulan
			
			$data['grafik_pengunjung']=$this->pegawai_model-> get_all_transaksi_statistik_beli_prd($bulan1);
			//menampilkan tgl untuk grafik periode bulan per harinya
			
			$data['grafik_pengunjung_beli']=$this->pegawai_model->get_all_transaksi_statistik_beli_prd_beli ($bulan1);
			$tot_pp=$this->pegawai_model->get_all_transaksi_statistik_beli_prd_beli1 ($bulan1);
			$data['jumlah_total_beli']=$tot_pp->num_rows();
			//menampilkan tgl untuk grafik periode bulan per harinya
			
			$data['grafik_pengunjung_tdk']=$this->pegawai_model->get_all_transaksi_statistik_beli_prd_tdk ($bulan1);
			$this->load->view('pegawai/statistik_pegawai',$data);
				$data['level']=$level;
			
		}
	
			//statistik pegawai
	public function transaksi_pegawai_individu()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			$bulan1=date('Y-m');
			//menampilkan dasboard pegawai 
			
			
			$data['t_pegawai_i']=$this->pegawai_model->get_all_transaksi_individu ($tgl,$id_user);
			$data['t_pegawai_tot']=$this->pegawai_model->get_all_transaksi_total ($tgl,$id_user);
			$data['t_pegawai_i_barang']=$this->pegawai_model->get_all_transaksi_individu_barang ($tgl,$id_user);
				$data['level']=$level;
			$this->load->view('pegawai/transaksi_pegawai_i',$data);
			
			
			
		}
	
public function target_toko()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			
			//menampilkan dasboard pegawai 
				$data['level']=$level;
			$data['target_toko_fokus']=$this->pegawai_model->get_all_target_toko_fokus ($bulan,$tahun);
			$data['target_toko_fokus_tercapai']=$this->pegawai_model->get_all_target_toko_fokus_tercapai ($bulan,$tahun);	
			$data['target_toko_all_tercapai']=$this->pegawai_model->get_all_target_toko_all_tercapai ($bulan,$tahun);				
						
			
			
			$this->load->view('pegawai/target_toko',$data);
		}
public function produk()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			
			
				$data['level']=$level;
		
			//filter_kategori
			$kategori=$this->input->post('kategori');
			$data['filter']=$this->pegawai_model->filter_kategori($kategori);
			
			//menampilkan dasboard pegawai 
			
			$data['jum']=$this->pegawai_model->get_all_transaksi_tot($id_user,$tgl);
			$data['kategori']=$this->pegawai_model->get_all_kategori();
			
			
			$this->load->view('pegawai/produk',$data);
		}

public function tdk_beli()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
				$tgl=date('Y-m-d');
			//total_jumlah_transaksi
			
			
			$data['level']=$level;
			//menampilkan dasboard pegawai 
			$data = array(
					'tgl_transaksi' => $tgl,
					'level' => '1',
					
				);
			$d=$this->pegawai_model->tdk_beli($data);
			if($d){
			 $this->session->set_flashdata('success', 'pelanggan	tidak	beli	berhasil	di	tambahkan');
			redirect('pegawai/produk');
			}
		
			
		}
public function tambah_produk()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			
			echo	$id_barang=$this->input->post('id_barang');
			
			$data = array(
					'tgl_transaksi' => $tgl,
					'id_barang' => $id_barang,
					'id_user' => $id_user,
					'keterangan' => '2',
				);
			$d=$this->pegawai_model->tdk_beli($data);
			if($d){
			 $this->session->set_flashdata('success', 'Produk	Berhasil	Ditambahkan	Dalam	Keranjang');
			redirect('pegawai/produk');
			}
			
			
		
			
		}
public function no_transaksi()
		{	
			error_reporting(0);
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			
			$d=$this->pegawai_model->no_transaksi();
			$no_transaksi=date('Ymd').$d->num_rows();
				$data['level']=$level;
			$data = array(
					'no_transaksi' => $no_transaksi
				);
					
			$d=$this->pegawai_model->no_transaksi_update($id_user,$tgl,$data);
			$data['transaksi']=$this->pegawai_model->transaksi_barang ($tgl,$id_user,$no_transaksi);
			$data['subtotal']=$this->pegawai_model->transaksi_barang_subtotal ($tgl,$id_user,$no_transaksi);
			$this->load->view('pegawai/detail_produk',$data);
				
			
		
			
		}
public function simpan_produk()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
				$data['level']=$level;
			
				$no_transaksi=$this->input->post('no_transaksi');
			$data = array(
					'level' => '1',
					'keterangan' => '1',
				);
			$d=$this->pegawai_model->simpan_update($id_user,$tgl,$no_transaksi,$data);
			$data['no_transaksi']=$no_transaksi;
			
			$this->load->view('pegawai/rating',$data);
			
			
		
			
		}
public function rating()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
				$data['level']=$level;
			
			$no_transaksi=$this->input->post('no_transaksi');
			$star=$this->input->post('star');
			
			$data = array(
					'no_transaksi' => $no_transaksi,
					'rating' => $star,
					'id_user' => $id_user,
						'tgl_rating' => $tgl,
				
				);
			$d=$this->pegawai_model->rating($data);
			if($d){
			 $this->session->set_flashdata('success', 'Terimakasih	Atas	Penilainya');
			redirect('pegawai/produk');
			}
			
		
			
		}
public function lap_statistik_h()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$bulan1=date('Y-m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			$data['tgl_1']=$tgl;
				$data['level']=$level;
			
				//menampilkan total transaksi sukses per hari
			$data1=$data['transaksi_statistik1']=$this->pegawai_model->get_all_transaksi_statistik_beli($tgl);
			$tot=$data1->num_rows();
			$data['beli']=$tot;
			//menampilkan total transaksi gagal per hari
			$data2=$data['transaksi_statistik2']=$this->pegawai_model->get_all_transaksi_statistik_tdk($tgl);
			$tot2=$data2->num_rows();
			$data['tdk']=$tot2;
			
		
			$this->load->view('pegawai/lap_statistik_h',$data);
			
			
		
			
		}
public function lap_statistik_b()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$bulan1=date('Y-m');
			$thn=date('Y');
			$tgl=date('Y-m-d');
			$data['tgl_1']=$bulan1;
			
				$data['level']=$level;
	
			//menampilkan total transaksi sukses per bulan
			$data1_bln=$data['transaksi_statistik1_bln']=$this->pegawai_model->get_all_transaksi_statistik_beli_bln($bulan,$thn);
			$tot_bln=$data1_bln->num_rows();
			$data['beli_bln']=$tot_bln;
			
			//menampilkan total transaksi gagal per hari
			$data2_bln=$data['transaksi_statistik2_bln']=$this->pegawai_model->get_all_transaksi_statistik_tdk_bln($bulan,$thn);
			$tot2_bln=$data2_bln->num_rows();
			$data['tdk_bln']=$tot2_bln;
			
			
			$this->load->view('pegawai/lap_statistik_b',$data);
			
			
		
			
		}
		public function cari_lap_statistik_b()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$bulan1=date('Y-m');
		
			
			$data['level']=$level;
			
	$bulan=$this->input->post('bln');
	$thn=$this->input->post('thn');
		$data['tgl_1']=$thn.'-'.$bulan;
			//menampilkan total transaksi sukses per bulan
			$data1_bln=$data['transaksi_statistik1_bln']=$this->pegawai_model->get_all_transaksi_statistik_beli_bln($bulan,$thn);
			$tot_bln=$data1_bln->num_rows();
			$data['beli_bln']=$tot_bln;
			
			//menampilkan total transaksi gagal per hari
			$data2_bln=$data['transaksi_statistik2_bln']=$this->pegawai_model->get_all_transaksi_statistik_tdk_bln($bulan,$thn);
			$tot2_bln=$data2_bln->num_rows();
			$data['tdk_bln']=$tot2_bln;
			
			
			$this->load->view('pegawai/lap_statistik_b',$data);
			
			
		
			
		}
		
public function cari_lap_statistik_h()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			
			$tgl=$this->input->post('tgl');
				$data['level']=$level;
				//menampilkan total transaksi sukses per hari
			$data1=$data['transaksi_statistik1']=$this->pegawai_model->get_all_transaksi_statistik_beli($tgl);
			$tot=$data1->num_rows();
			$data['beli']=$tot;
			//menampilkan total transaksi gagal per hari
			$data2=$data['transaksi_statistik2']=$this->pegawai_model->get_all_transaksi_statistik_tdk($tgl);
			$tot2=$data2->num_rows();
			$data['tdk']=$tot2;
			$data['tgl_1']=$tgl;
	
			
		
			$this->load->view('pegawai/lap_statistik_h',$data);
			
			
		
			
		}
		
	public function lap_produk()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			$bulan1=date('Y-m');
			//menampilkan dasboard pegawai 
				$data['level']=$level;
			
				$data['tgl_1']=$tgl;
			$data['t_pegawai_i_barang']=$this->pegawai_model->get_all_transaksi_individu_barang ($tgl,$id_user);
			$data['t_pegawai_b_barang']=$this->pegawai_model->get_all_transaksi_b_barang ($tgl);
			$this->load->view('pegawai/lap_produk',$data);
	
			
		
			
			
			
		
			
		}
		public function lap_produk_b()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			$bulan1=date('Y-m');
			//menampilkan dasboard pegawai 
				$data['level']=$level;
			
				$data['tgl_1']=$bulan1;
			$data['t_pegawai_i_barang']=$this->pegawai_model->get_all_transaksi_individu_barang_b($bulan,$tahun,$id_user);
			$data['t_pegawai_b_barang']=$this->pegawai_model->get_all_transaksi_b_barang_b ($bulan,$tahun);
			$this->load->view('pegawai/lap_produk_b',$data);
	
			
		
			
			
			
		
			
		}
		public function cari_lap_produk()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
				$tgl=$this->input->post('tgl');
			$bulan1=date('Y-m');
			//menampilkan dasboard pegawai 
			$data['level']=$level;
				$data['tgl_1']=$tgl;
			$data['t_pegawai_i_barang']=$this->pegawai_model->get_all_transaksi_individu_barang ($tgl,$id_user);
				$data['t_pegawai_b_barang']=$this->pegawai_model->get_all_transaksi_b_barang ($tgl);
			$this->load->view('pegawai/lap_produk',$data);
	
			
		
			
		
			
		}
public function cari_lap_produk_b()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
				echo$bulan=$this->input->post('bln');
				echo$tahun=$this->input->post('thn');
				$data['level']=$level;
			
			//menampilkan dasboard pegawai 
			
			$data['tgl_1']=$tahun.'-'.$bulan;
		
					$data['t_pegawai_i_barang']=$this->pegawai_model->get_all_transaksi_individu_barang_b($bulan,$tahun,$id_user);
			$data['t_pegawai_b_barang']=$this->pegawai_model->get_all_transaksi_b_barang_b ($bulan,$tahun);
			$this->load->view('pegawai/lap_produk_b',$data);
	
			
		
			
		
			
		}
	public function rank_poin()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			$bulan1=date('Y-m');
				$data['level']=$level;
			$data['tgl_1']=$tgl;
			
			$data['rank_poin']=$this->pegawai_model->rank_poin ($tgl);
			$this->load->view('pegawai/lap_rank_poin',$data);
			
		
			
		
			
		}
		public function rank_poin_b()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			$bulan1=date('Y-m');
			
			$data['tgl_1']=$tgl;
				$data['level']=$level;
			$data['rank_poin']=$this->pegawai_model->rank_poin_b($bulan,$tahun);
			$this->load->view('pegawai/lap_rank_poin_b',$data);
			
		
			
		
			
		}
	public function cari_lap_rank_poin()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			
			$tgl=$this->input->post('tgl');
			
				//menampilkan total transaksi sukses per hari
				$data['level']=$level;
			$data['tgl_1']=$tgl;
			$data['rank_poin']=$this->pegawai_model->rank_poin ($tgl);
			
		
			$this->load->view('pegawai/lap_rank_poin',$data);
			
			
		
			
		}
	public function cari_lap_rank_poin_b()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
				$data['level']=$level;
				$bulan=$this->input->post('bln');
				$tahun=$this->input->post('thn');
			
			
			//menampilkan dasboard pegawai 
			
			$data['tgl_1']=$tahun.'-'.$bulan;
			
				//menampilkan total transaksi sukses per hari
			
		
			$data['rank_poin']=$this->pegawai_model->rank_poin_b($bulan,$tahun);
			
		
			$this->load->view('pegawai/lap_rank_poin_b',$data);
			
			
		
			
		}
public function lap_kepuasan_p_h()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
			$bulan1=date('Y-m');
				$data['level']=$level;
			$data['tgl_1']=$tgl;
			
			$data['kepuasan_h']=$this->pegawai_model-> kepuasan_p_h1 ($tgl,$username);
			$data['kepuasan_h1']=$this->pegawai_model-> kepuasan_p_h1_tot ($tgl,$username);
			$this->load->view('pegawai/lap_kepuasan_p_h',$data);
			
		
			
		
			
		}
public function cari_lap_kepuasan_p_h()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
				$data['level']=$level;
			$tgl=$this->input->post('tgl');
			
				//menampilkan total transaksi sukses per hari
			
			$data['tgl_1']=$tgl;
			$data['kepuasan_h']=$this->pegawai_model-> kepuasan_p_h1 ($tgl,$username);
			$data['kepuasan_h1']=$this->pegawai_model-> kepuasan_p_h1_tot ($tgl,$username);
			$this->load->view('pegawai/lap_kepuasan_p_h',$data);
			
		
			
		}
		//grafik-all
	public function grafik_pengunjung()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
				$data['tgl_1']=$tahun.'-'.$bulan;
			$data['grafik_pengunjung_beli']=$this->pegawai_model->st_pengunjung ($bulan,$tahun);
			$data['grafik_pengunjung_tdk']=$this->pegawai_model->get_all_transaksi_statistik_beli_prd_tdk ($bulan,$tahun);
				$data['level']=$level;
			
			$this->load->view('pegawai/grafik_pengunjung',$data);
			
		
			
		}
	public function cari_grafik_pengunjung()
		{	
				$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			
				$bulan=$this->input->post('bln');
				$tahun=$this->input->post('thn');
			
				$data['level']=$level;
			//menampilkan dasboard pegawai 
			
			$data['tgl_1']=$tahun.'-'.$bulan;
			
				//menampilkan total transaksi sukses per hari
			
		
			$data['grafik_pengunjung_beli']=$this->pegawai_model->st_pengunjung ($bulan,$tahun);
			$data['grafik_pengunjung_tdk']=$this->pegawai_model->get_all_transaksi_statistik_beli_prd_tdk ($bulan,$tahun);
			
			$this->load->view('pegawai/grafik_pengunjung',$data);
			
		
			
		}
public function grafik_all()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
				$data['tgl_1']=$tahun.'-'.$bulan;
			$data['grafik_pengunjung_beli']=$this->pegawai_model->grafik_all ($bulan,$tahun);
				$data['level']=$level;
			
			
			$this->load->view('pegawai/grafik_all',$data);
			
		
			
		}
		public function grafik_all_p()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
				$data['tgl_1']=$tahun.'-'.$bulan;
			$data['grafik_pengunjung_beli']=$this->pegawai_model->grafik_all_p ($bulan,$tahun,$id_user);
				$data['level']=$level;
				$data['pegawai']=$this->pegawai_model->get_all_pegawai1();
			
			$this->load->view('pegawai/grafik_all_p',$data);
			
		
			
		}
		public function cari_grafik_all()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
				$data['level']=$level;
				$bulan=$this->input->post('bln');
				$tahun=$this->input->post('thn');
			
			
			//menampilkan dasboard pegawai 
			
			$data['tgl_1']=$tahun.'-'.$bulan;
			
				//menampilkan total transaksi sukses per hari
			
		
			$data['grafik_pengunjung_beli']=$this->pegawai_model->grafik_all ($bulan,$tahun);
			
			
			
			$this->load->view('pegawai/grafik_all',$data);
			
		
			
		}
		public function cari_grafik_p()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
				$data['level']=$level;
				$bulan=$this->input->post('bln');
				$tahun=$this->input->post('thn');
			
			
			//menampilkan dasboard pegawai 
			
			$data['tgl_1']=$tahun.'-'.$bulan;
			
				//menampilkan total transaksi sukses per hari
			
		
			$data['grafik_pengunjung_beli']=$this->pegawai_model->grafik_all_p ($bulan,$tahun,$id_user);
			
			
			
			$this->load->view('pegawai/grafik_all_p',$data);
			
		
			
		}
	public function grafik_poin()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
			$bulan=date('m');
			$tahun=date('Y');
				$data['tgl_1']=$tahun.'-'.$bulan;
			$data['grafik_pengunjung_beli']=$this->pegawai_model->grafik_poin12 ($bulan,$tahun,$id_user);
				$data['level']=$level;
			
			$data['pegawai']=$this->pegawai_model->get_all_pegawai1();
			$this->load->view('pegawai/grafik_poin',$data);
			
		
			
		}
			public function cari_grafik_poin()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user;
			$username;
				$data['level']=$level;
				$bulan=$this->input->post('bln');
				$tahun=$this->input->post('thn');
			
			
			//menampilkan dasboard pegawai 
			
			$data['tgl_1']=$tahun.'-'.$bulan;
			
				//menampilkan total transaksi sukses per hari
			
		
					$data['grafik_pengunjung_beli']=$this->pegawai_model->grafik_poin12 ($bulan,$tahun,$id_user);
			
			
			
			$this->load->view('pegawai/grafik_poin',$data);
			
		
			
		}
		public function detail_pegawai()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$data['level']=$level;
				
				$id_user=$this->input->post('id_user');
				$username=$this->input->post('username');
				$bulan=date('m');
			$tahun=date('Y');
			$tgl=date('Y-m-d');
		    $bulan1=date('Y-m');
			$data['tgl']=$tgl;
			$data['poin']=$this->pegawai_model->poin ($bulan1,$id_user);
			$data['p_u']=$this->pegawai_model->get_all_pegawai2($id_user);
			
			//star5
			$star5=$this->pegawai_model->star5($id_user);
			$data['star5']=$star5->num_rows();
			//star4
			$star4=$this->pegawai_model->star4($id_user);
			$data['star4']=$star4->num_rows();
			//star3
			$star3=$this->pegawai_model->star3($id_user);
			$data['star3']=$star3->num_rows();
			//star2
			$star2=$this->pegawai_model->star2($id_user);
			$data['star2']=$star2->num_rows();
			//star1
			$star1=$this->pegawai_model->star1($id_user);
			$data['star1']=$star1->num_rows();
			//$t_star
			$tot_star=$data['star1']+$data['star2']+$data['star3']+$data['star4']+$data['star5'];
			$data['tot_star']=$tot_star;
			
			//pencapaian
			$data['target_pegawai_fokus_tercapai']=$this->pegawai_model->get_all_target_pegawai_fokus_tercapai ($username,$bulan,$tahun);
			$data['target_pegawai_all_type_tercapai']=$this->pegawai_model->get_all_target_pegawai_all_type_tercapai ($username,$bulan,$tahun);
			$data['pegawai']=$this->pegawai_model->get_all_pegawai1();
			
			$this->load->view('pegawai/detail_pegawai',$data);
			
			
			
			
		
			
		}
	public function detail_grafik_p()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user=$this->input->post('id_user');
			$username=$this->input->post('username');
			$bulan=date('m');
			$tahun=date('Y');
			$data['username']=$username;
				$data['tgl_1']=$tahun.'-'.$bulan;
			$data['grafik_pengunjung_beli']=$this->pegawai_model->grafik_all_p ($bulan,$tahun,$id_user);
				$data['level']=$level;
				$data['pegawai']=$this->pegawai_model->get_all_pegawai1();
			
			$this->load->view('pegawai/grafik_all_pp',$data);
			
		
			
		}
		public function detail_poin_p()
		{	
			$user=$this->session->userdata('user');
			extract($user);
			$id_user=$this->input->post('id_user');
			$username=$this->input->post('username');
			$bulan=$this->input->post('bln');
			$tahun=$this->input->post('thn');
			$data['username']=$username;
				$data['tgl_1']=$tahun.'-'.$bulan;
		
				$data['level']=$level;
				$data['pegawai']=$this->pegawai_model->get_all_pegawai1();
			$data['grafik_pengunjung_beli']=$this->pegawai_model->grafik_poin12 ($bulan,$tahun,$id_user);
			$this->load->view('pegawai/grafik_poin_p',$data);
			
		
			
		}
	
	
	
	
}

?>