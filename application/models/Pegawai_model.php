<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model

{

	var $table = 'user';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


public function get_all_pegawai()
{
$this->db->from('user');
$query=$this->db->get();

return $query->result();
}
public function get_all_pegawai1()
{
$this->db->from('user');
$this->db->where('level','pegawai');
$query=$this->db->get();

return $query->result();
}
public function get_all_pegawai2($id_user)
{
$this->db->from('user');
$this->db->where('id_user',$id_user);
$query=$this->db->get();

return $query->result();
}
//----------

public function get_all_target_pegawai_fokus ($bulan,$tahun,$id_user)
{
$this->db->select('
					kategori.kategori,target_pegawai.fokus,
					target_pegawai.all,
				');
$this->db->from('kategori');
$this->db->join('target_pegawai', 'kategori.id_kategori = target_pegawai.id_kategori','left');

$this ->db->where('bulan_target', $bulan);
$this ->db->where('tahun_target', $tahun);
$this ->db->where('id_user', $id_user);
$query = $this->db->get();
return $query->result();
}

//database menampilkan jumlah target fokuus-tercapai
public function get_all_target_pegawai_fokus_tercapai ($username,$bulan,$tahun)
{
$this->db->select('
					transaksi.id_user,user.username,barang.barang,kategori.kategori,target_pegawai.fokus,target_pegawai.`all`,
					COUNT(kategori.kategori) AS jumlah_target
				');
$this->db->from('transaksi');
$this->db->join('user', 'user.id_user=transaksi.id_user','left');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this->db->join('target_pegawai', 'kategori.id_kategori=target_pegawai.id_kategori','left');


$this ->db->where('username', $username);
$this ->db->where('tipe', 'fokus');
$this ->db->where('keterangan', '1');
$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $tahun);


$this->db->group_by('kategori');

$query = $this->db->get();
return $query->result();
}

//database menampilkan jumlah target All type
public function get_all_target_pegawai_all_type_tercapai ($username,$bulan,$tahun)
{
$this->db->select('
					transaksi.id_user,user.username,barang.barang,kategori.kategori,target_pegawai.fokus,target_pegawai.`all`,
					COUNT(kategori.kategori) AS jumlah_target
				');
$this->db->from('transaksi');
$this->db->join('user', 'user.id_user=transaksi.id_user','left');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this->db->join('target_pegawai', 'kategori.id_kategori=target_pegawai.id_kategori','left');


$this ->db->where('username', $username);
$this ->db->where('tipe', 'all');
$this ->db->where('keterangan', '1');
$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $tahun);


$this->db->group_by('kategori');

$query = $this->db->get();
return $query->result();
}

// menampilkan data transaksi per individu
public function get_all_transaksi_statistik($tgl,$id_user)
{
$this->db->select('
					 id_transaksi,no_transaksi,tgl_transaksi ,COUNT(no_transaksi) AS jumlah_transaksi,SUM(harga) AS total_harga 
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
		
$this ->db->where('keterangan', '1');
$this ->db->where('tgl_transaksi', $tgl);
$this ->db->where('id_user', $id_user);
$this->db->group_by('no_transaksi');
$query=$this->db->get();

return $query->result();
}
//--------------------------------------------controler index----------------------------------------------------------------------------------------------------------

//total record trnsaksi beli barang per hari
public function get_all_transaksi_statistik_beli($tgl)
{
$this->db->select('
					 id_transaksi,no_transaksi,COUNT(no_transaksi) AS jumlah_transaksi,tgl_transaksi 
				');
$this->db->from('transaksi');
$this ->db->where('keterangan', '1');
$this ->db->where('tgl_transaksi', $tgl);
$this->db->group_by('no_transaksi');

$query=$this->db->get();
return $query;
;
}



//total record trnsaksi tidak  beli barang per hari
public function get_all_transaksi_statistik_tdk($tgl)
{
$this->db->select('
					 id_transaksi,no_transaksi,tgl_transaksi 
				');
$this->db->from('transaksi');
$this ->db->where('keterangan', '0');
$this ->db->where('tgl_transaksi', $tgl);

$query=$this->db->get();
return $query;
;
}

//total record trnsaksi beli barang per bln
public function get_all_transaksi_statistik_beli_bln($bulan,$thn)
{
$this->db->select('
					 id_transaksi,no_transaksi,COUNT(no_transaksi) AS jumlah_transaksi,tgl_transaksi 
				');
$this->db->from('transaksi');
$this ->db->where('keterangan', '1');
$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $thn);
$this->db->group_by('no_transaksi');

$query=$this->db->get();
return $query;
;
}
//total record trnsaksi tidak  beli barang per bulan
public function get_all_transaksi_statistik_tdk_bln($bulan,$thn)
{
$this->db->select('
					 id_transaksi,no_transaksi,tgl_transaksi 
				');
$this->db->from('transaksi');
$this ->db->where('keterangan', '0');

$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $thn);
$query=$this->db->get();
return $query;
;
}
//data periodik tgl sebulan beli untuk grfaik

public function get_all_transaksi_statistik_beli_prd($bulan1)
{
$this->db->select('
					 id_transaksi,no_transaksi,count(tgl_transaksi) AS jumlah ,tgl_transaksi
				');
$this->db->from('transaksi');

$this ->db->where('date_format(tgl_transaksi,"%Y-%m")', $bulan1);

$this->db->group_by('tgl_transaksi');
$query=$this->db->get();

return $query->result();
;
}

//data periodik tgl sebulan beli untuk grfaik beli

public function get_all_transaksi_statistik_beli_prd_beli($bulan1)
{
$this->db->select('
					 id_transaksi,no_transaksi,count(tgl_transaksi) AS jumlah ,tgl_transaksi
				');
$this->db->from('transaksi');

$this ->db->where('date_format(tgl_transaksi,"%Y-%m")', $bulan1);
$this ->db->where('keterangan', '1');

$this->db->group_by('no_transaksi');
$query=$this->db->get();

return $query->result();
;
}

public function get_all_transaksi_statistik_beli_prd_beli1($bulan1)
{
$this->db->select('
					 id_transaksi,no_transaksi,count(tgl_transaksi) AS jumlah ,tgl_transaksi
				');
$this->db->from('transaksi');

$this ->db->where('date_format(tgl_transaksi,"%Y-%m")', $bulan1);
$this ->db->where('keterangan', '1');

$this->db->group_by('no_transaksi');
$query=$this->db->get();

return $query;
;
}
//data periodik tgl sebulan beli untuk grfaik tdk

public function get_all_transaksi_statistik_beli_prd_tdk ($bulan,$tahun)
{
$this->db->select('
					 id_transaksi,no_transaksi,count(tgl_transaksi) AS jumlah ,tgl_transaksi
				');
$this->db->from('transaksi');

$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $tahun);
$this ->db->where('keterangan', '0');

$this->db->group_by('tgl_transaksi');
$query=$this->db->get();

return $query->result();
;
}

//--------------------------------------------------------------------------contrler	transaksi	Pegawai	-------------------------------------

//data transaksi	individu	perhari

public function get_all_transaksi_individu ($tgl,$id_user)
{
$this->db->select('
					 id_transaksi,no_transaksi,count(no_transaksi) AS jum_transaksi, tgl_transaksi,SUM(harga) AS tot_harga,tipe,brand,kategori
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('brand', 'brand.id_brand=barang.id_brand','left');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this ->db->where('date_format(tgl_transaksi,"%Y-%m-%d")', $tgl);
$this ->db->where('keterangan', '1');
$this ->db->where('id_user', $id_user);

$this->db->group_by('no_transaksi');
$this->db->order_by('kategori','asc');

$query=$this->db->get();

return $query->result();
;
}
//total-transaki-individu-
public function get_all_transaksi_total ($tgl,$id_user)
{
$this->db->select('
					 id_transaksi,no_transaksi,count(no_transaksi) AS jum_transaksi, tgl_transaksi,SUM(harga) AS tot_harga,tipe,brand,kategori
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('brand', 'brand.id_brand=barang.id_brand','left');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this ->db->where('date_format(tgl_transaksi,"%Y-%m-%d")', $tgl);
$this ->db->where('keterangan', '1');
$this ->db->where('id_user', $id_user);


$this->db->order_by('kategori','asc');

$query=$this->db->get();

return $query->result();
;
}
//transaksi-barang-
public function get_all_transaksi_individu_barang ($tgl,$id_user)
{
$this->db->select('
					 id_transaksi,no_transaksi,count(barang) AS jum_barang, tgl_transaksi,SUM(harga) AS tot_harga,tipe,brand,kategori,barang,poin
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('brand', 'brand.id_brand=barang.id_brand','left');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this ->db->where('date_format(tgl_transaksi,"%Y-%m-%d")', $tgl);
$this ->db->where('keterangan', '1');
$this ->db->where('id_user', $id_user);

$this->db->group_by('barang');
$this->db->order_by('kategori','asc');

$query=$this->db->get();

return $query->result();
;
}
//transaksi-barang-bln
public function get_all_transaksi_individu_barang_b ($bulan,$tahun,$id_user)
{
$this->db->select('
					 id_transaksi,no_transaksi,count(barang) AS jum_barang, tgl_transaksi,SUM(harga) AS tot_harga,tipe,brand,kategori,barang,poin
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('brand', 'brand.id_brand=barang.id_brand','left');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $tahun);
$this ->db->where('keterangan', '1');
$this ->db->where('id_user', $id_user);

$this->db->group_by('barang');
$this->db->order_by('kategori','asc');

$query=$this->db->get();

return $query->result();
;
}

//transaksi-barang-
public function get_all_transaksi_b_barang ($tgl)
{
$this->db->select('
					 id_transaksi,no_transaksi,count(barang) AS jum_barang, tgl_transaksi,SUM(harga) AS tot_harga,tipe,brand,kategori,barang,poin
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('brand', 'brand.id_brand=barang.id_brand','left');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this ->db->where('date_format(tgl_transaksi,"%Y-%m-%d")', $tgl);
$this ->db->where('keterangan', '1');


$this->db->group_by('barang');
$this->db->order_by('kategori','asc');

$query=$this->db->get();

return $query->result();
;
}
//transaksi-barang-
public function get_all_transaksi_b_barang_b ($bulan,$tahun)
{
$this->db->select('
					 id_transaksi,no_transaksi,count(barang) AS jum_barang, tgl_transaksi,SUM(harga) AS tot_harga,tipe,brand,kategori,barang,poin
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('brand', 'brand.id_brand=barang.id_brand','left');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $tahun);
$this ->db->where('keterangan', '1');


$this->db->group_by('barang');
$this->db->order_by('kategori','asc');

$query=$this->db->get();

return $query->result();
;
}

//-------------------------------------------------------------target-toko---------------------------------------------------------------------------------------
//total-target-toko
public function get_all_target_toko_fokus ($bulan,$tahun)
{
$this->db->select('
					kategori,p_all,p_fokus,
				');
$this->db->from('kategori');
$this->db->join('produk_fokus', 'kategori.id_kategori = produk_fokus.id_kategori','left');

$this ->db->where('P_bulan', $bulan);
$this ->db->where('P_tahun', $tahun);

$query = $this->db->get();
return $query->result();
}
//total-target-toko-tercapai

//database menampilkan jumlah target fokuus-tercapai
public function get_all_target_toko_fokus_tercapai ($bulan,$tahun)
{
$this->db->select('
					tgl_transaksi,barang,kategori,count(tipe)AS	jum_target,p_fokus
				');
$this->db->from('transaksi');

$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this->db->join('produk_fokus', 'kategori.id_kategori=produk_fokus.id_kategori','left');



$this ->db->where('tipe', 'fokus');
$this ->db->where('keterangan', '1');
$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $tahun);


$this->db->group_by('kategori');

$query = $this->db->get();
return $query->result();
}

//database menampilkan jumlah target altype-tercapai
public function get_all_target_toko_all_tercapai ($bulan,$tahun)
{
$this->db->select('
					tgl_transaksi,barang,kategori,count(tipe)AS	jum_target,p_all
				');
$this->db->from('transaksi');

$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this->db->join('produk_fokus', 'kategori.id_kategori=produk_fokus.id_kategori','left');



$this ->db->where('tipe', 'all');
$this ->db->where('keterangan', '1');
$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $tahun);


$this->db->group_by('kategori');

$query = $this->db->get();
return $query->result();
}

public function tdk_beli($data)
	{
		return $this->db->insert('transaksi', $data);
	}
//----------------------------------------------------------------------------produk----------------------------------	
//---**kategori**---
public function get_all_kategori()
{
$this->db->from('kategori');
$query=$this->db->get();
return $query->result();
}


//**------jumlah-total-keranjang

//total record trnsaksi tidak  beli barang per bulan
public function get_all_transaksi_tot($id_user,$tgl)
{
$this->db->select('
					no_transaksi,COUNT(no_transaksi)AS	jum,tgl_transaksi
				');
$this->db->from('transaksi');
$this ->db->where('date_format(tgl_transaksi,"%Y-%m-%d")', $tgl);
$this ->db->where('level', '0');
$this ->db->where('id_user', $id_user);

$this->db->group_by('id_user');


$query=$this->db->get();

return $query->result();
;
}

public function filter_kategori($kategori)
{
$this->db->select('*');
$this->db->from('barang');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this->db->join('brand', 'brand.id_brand=barang.id_brand','left');
$this ->db->where('kategori', $kategori);




$query=$this->db->get();

return $query->result();
;
}
//no_transaksi
public function no_transaksi()
{
$this->db->select('*');
$this->db->from('transaksi');


$query=$this->db->get();

return $query;
;
}

//update-no-transaksi
public function no_transaksi_update($id_user,$tgl,$data)
	{
		$this ->db->where('date_format(tgl_transaksi,"%Y-%m-%d")', $tgl);
		$this->db->where('level', '0');
		$this->db->where('id_user', $id_user);
		$this->db->update('transaksi', $data);
	}
//transaksi-barang-
public function transaksi_barang ($tgl,$id_user,$no_transaksi)
{
$this->db->select('
					 no_transaksi,tgl_transaksi,barang,harga,kategori
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('brand', 'brand.id_brand=barang.id_brand','left');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this ->db->where('date_format(tgl_transaksi,"%Y-%m-%d")', $tgl);
$this ->db->where('keterangan', '2');
$this ->db->where('level', '0');

$this ->db->where('id_user', $id_user);


$this->db->order_by('kategori','asc');

$query=$this->db->get();

return $query->result();
;
}

//subtotal--------------
public function transaksi_barang_subtotal ($tgl,$id_user,$no_transaksi)
{
$this->db->select('
					 no_transaksi,tgl_transaksi,barang,harga,kategori,sum(harga)	as	subtotal
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('brand', 'brand.id_brand=barang.id_brand','left');
$this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori','left');
$this ->db->where('date_format(tgl_transaksi,"%Y-%m-%d")', $tgl);
$this ->db->where('keterangan', '2');
$this ->db->where('level', '0');

$this ->db->where('id_user', $id_user);


$this->db->order_by('kategori','asc');

$query=$this->db->get();

return $query->result();
;
}

//update--simpanno-transaksi
public function simpan_update($id_user,$tgl,$no_transaksi,$data)
	{
		$this ->db->where('date_format(tgl_transaksi,"%Y-%m-%d")', $tgl);
		$this->db->where('level', '0');
		$this->db->where('id_user', $id_user);
		$this->db->where('no_transaksi', $no_transaksi);
		$this->db->update('transaksi', $data);
	}

//rating
public function rating($data)
	{
		return $this->db->insert('rating', $data);
	}
//poin
public function poin ($bulan1,$id_user)
{
$this->db->select('
					 SUM(poin)	AS	total_poin	
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');

$this ->db->where('date_format(tgl_transaksi,"%Y-%m")', $bulan1);
$this ->db->where('keterangan', '1');
$this ->db->where('id_user', $id_user);

$this->db->group_by('id_user');
$this->db->order_by('poin','asc');

$query=$this->db->get();

return $query->result();

}
//jumlh-star5
public function star5 ($id_user)
{
$this->db->select('*');
$this->db->from('rating');
$this ->db->where('rating', '5');
$this ->db->where('id_user', $id_user);
$query=$this->db->get();
return $query;

}
//jumlh-star4
public function star4 ($id_user)
{
$this->db->select('*');
$this->db->from('rating');
$this ->db->where('rating', '4');
$this ->db->where('id_user', $id_user);
$query=$this->db->get();
return $query;

}
//jumlh-star3
public function star3 ($id_user)
{
$this->db->select('*');
$this->db->from('rating');
$this ->db->where('rating', '3');
$this ->db->where('id_user', $id_user);
$query=$this->db->get();
return $query;

}
//jumlh-star2
public function star2 ($id_user)
{
$this->db->select('*');
$this->db->from('rating');
$this ->db->where('rating', '2');
$this ->db->where('id_user', $id_user);
$query=$this->db->get();
return $query;

}
//jumlh-star1
public function star1 ($id_user)
{
$this->db->select('*');
$this->db->from('rating');
$this ->db->where('rating', '1');
$this ->db->where('id_user', $id_user);
$query=$this->db->get();
return $query;

}
//poin
public function rank_poin ($tgl)
{
$this->db->select('
					 SUM(poin)	AS	total_poin	,username
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('user', 'user.id_user=transaksi.id_user','left');
$this ->db->where('date_format(tgl_transaksi,"%Y-%m-%d")', $tgl);
$this ->db->where('keterangan', '1');


$this->db->group_by('username');
$this->db->order_by('total_poin','desc');

$query=$this->db->get();

return $query->result();

}

//poin
public function rank_poin_b ($bulan,$tahun)
{
$this->db->select('
					 SUM(poin)	AS	total_poin	,username
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this->db->join('user', 'user.id_user=transaksi.id_user','left');
$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $tahun);
$this ->db->where('keterangan', '1');


$this->db->group_by('username');
$this->db->order_by('total_poin','desc');

$query=$this->db->get();

return $query->result();

}


public function kepuasan_p_h1 ($tgl,$username)
{
$this->db->select('
					 username,rating,COUNT(rating)	AS	tot_rating
				');
$this->db->from('rating');

$this->db->join('user', 'user.id_user=rating.id_user','left');
$this ->db->where('date_format(tgl_rating,"%Y-%m-%d")', $tgl);
$this ->db->where('username', $username);


$this->db->group_by('rating');


$query=$this->db->get();

return $query->result();

}

public function kepuasan_p_h1_tot ($tgl,$username)
{
$this->db->select('
					 username,rating,COUNT(rating)	AS	tot_rating1
				');
$this->db->from('rating');

$this->db->join('user', 'user.id_user=rating.id_user','left');
$this ->db->where('date_format(tgl_rating,"%Y-%m-%d")', $tgl);
$this ->db->where('username', $username);


$this->db->group_by('username');


$query=$this->db->get();

return $query->result();

}

public function st_pengunjung ($bulan,$tahun)
{
$this->db->select('
					 no_transaksi,tgl_rating,COUNT(tgl_rating)	as	jumlah_rating
				');
$this->db->from('rating');

$this ->db->where('date_format(tgl_rating,"%m")', $bulan);
$this ->db->where('date_format(tgl_rating,"%Y")', $tahun);


$this->db->group_by('tgl_rating');


$query=$this->db->get();

return $query->result();

}
//grafik-all
public function grafik_all ($bulan,$tahun)
{
$this->db->select('
					 no_transaksi,tgl_transaksi,COUNT(id_barang)	as	jumlah_barang
				');
$this->db->from('transaksi');

$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $tahun);


$this->db->group_by('tgl_transaksi');


$query=$this->db->get();

return $query->result();

}


//grafik-all
public function grafik_all_p ($bulan,$tahun,$id_user)
{
$this->db->select('
					 id_user,no_transaksi,tgl_transaksi,COUNT(id_barang)	as	jumlah_barang
				');
$this->db->from('transaksi');

$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $tahun);
$this ->db->where('id_user', $id_user);

$this->db->group_by('tgl_transaksi');


$query=$this->db->get();

return $query->result();

}
//grafik-all
public function grafik_poin12 ($bulan,$tahun,$id_user)
{
$this->db->select('
					 tgl_transaksi,barang,sum(poin)	as	jumlah_poin
				');
$this->db->from('transaksi');
$this->db->join('barang', 'barang.id_barang=transaksi.id_barang','left');
$this ->db->where('date_format(tgl_transaksi,"%m")', $bulan);
$this ->db->where('date_format(tgl_transaksi,"%Y")', $tahun);
$this ->db->where('id_user', $id_user);


$this->db->group_by('tgl_transaksi');


$query=$this->db->get();

return $query->result();

}






}
?>