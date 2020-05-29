<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model

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


	public function get_by_id_pegawai($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_user',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function pegawai_add($data)
	{
		return $this->db->insert('user', $data);
	}

	public function pegawai_update($id_user, $data)
	{
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}

//---**kategori**---
public function get_all_kategori()
{
$this->db->from('kategori');
$query=$this->db->get();
return $query->result();
}
//**proses-delete--
public function delete_by_id_kategori($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori');
	}
//**proses-tambah-kategori
public function kategori_add($data)
	{
		return $this->db->insert('kategori', $data);
	}
//**edit-kategori
public function get_by_id_kategori($id)
	{
		$this->db->from('kategori');
		$this->db->where('id_kategori',$id);
		$query = $this->db->get();

		return $query->row();
	}
public function kategori_update($id_kategori, $data)
	{
		$this->db->where('id_kategori', $id_kategori);
		$this->db->update('kategori', $data);
	}

//**brand**
//---**brand**---
public function get_all_brand()
{
$this->db->from('brand');
$query=$this->db->get();
return $query->result();
}
//**proses-delete--
public function delete_by_id_brand($id)
	{
		$this->db->where('id_brand', $id);
		$this->db->delete('brand');
	}
//**proses-tambah-brand
public function brand_add($data)
	{
		return $this->db->insert('brand', $data);
	}
//**edit-brand
public function get_by_id_brand($id)
	{
		$this->db->from('brand');
		$this->db->where('id_brand',$id);
		$query = $this->db->get();

		return $query->row();
	}
public function brand_update($id_brand, $data)
	{
		$this->db->where('id_brand', $id_brand);
		$this->db->update('brand', $data);
	}
//---**barang**---
public function get_all_barang()
{
$this->db->select('*');
$this->db->from('barang');
$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori','left');
$this->db->join('brand', 'brand.id_brand = barang.id_brand','left');
$this->db->order_by('kategori','ASC'); 
$query = $this->db->get();
return $query->result();
}

public function get_all_barang1()
{
$this->db->select('*');
$this->db->from('barang');
$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori','left');
$this->db->join('brand', 'brand.id_brand = barang.id_brand','left');
 $this->db->where('tipe', 'fokus');
$query = $this->db->get();
return $query->result();
}
//**proses-delet--
public function delete_by_id_barang($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('barang');
	}
//**proses-tambah-barang
public function barang_add($data)
	{
		return $this->db->insert('barang', $data);
	}
//**edit-barang
public function get_by_id_barang($id)
	{
		$this->db->from('barang');
		$this->db->where('id_barang',$id);
		$query = $this->db->get();

		return $query->row();
	}
public function barang_update($id_barang, $data)
	{
		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang', $data);
	}
	
	//---**produk_fokus**---
public function get_all_produk_fokus()
{
$this->db->select('*');
$this->db->from('produk_fokus');
$this->db->join('kategori', 'kategori.id_kategori = produk_fokus.id_kategori','left');

 
$query = $this->db->get();
return $query->result();
}
//**proses-delet produk fokus
public function delete_by_id_produk_fokus($id)
	{
		$this->db->where('id_produk_fokus', $id);
		$this->db->delete('produk_fokus');
	}
//**proses-tambah-produk_fokus
public function produk_fokus_add($data)
	{
		return $this->db->insert('produk_fokus', $data);
	}
//**edit-produk_fokus
public function get_by_id_produk_fokus($id)
	{
		$this->db->from('produk_fokus');
		$this->db->where('id_produk_fokus',$id);
		$query = $this->db->get();

		return $query->row();
	}
public function produk_fokus_update($id_produk_fokus, $data)
	{
		$this->db->where('id_produk_fokus', $id_produk_fokus);
		$this->db->update('produk_fokus', $data);
	}
//**-----target_pegawai--------
public function get_all_target_pegawai()
{
$this->db->select('*');
$this->db->from('target_pegawai');
$this->db->join('user', 'user.id_user = target_pegawai.id_user','left');
$this->db->join('kategori', 'kategori.id_kategori = target_pegawai.id_kategori','left');
 
$query = $this->db->get();
return $query->result();
}

//**proses-delet--
public function delete_by_id_target_pegawai($id)
	{
		$this->db->where('id_target_pegawai', $id);
		$this->db->delete('target_pegawai');
	}
//**proses-tambah-target_pegawai
public function target_pegawai_add($data)
	{
		return $this->db->insert('target_pegawai', $data);
	}
//**edit-target_pegawai
public function get_by_id_target_pegawai($id)
	{
		$this->db->from('target_pegawai');
		$this->db->where('id_target_pegawai',$id);
		$query = $this->db->get();

		return $query->row();
	}
public function target_pegawai_update($id_target_pegawai, $data)
	{
		$this->db->where('id_target_pegawai', $id_target_pegawai);
		$this->db->update('target_pegawai', $data);
	}

	

}
