<?php

namespace App\Models;

use CodeIgniter\Model;
class Model_kategori extends Model{

    protected $table = 'kategori_barang';
    protected $primaryKey = 'kategori_id';
    protected $protectFields = false;
    protected $useTimeStamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    function tampil_data()
  {
    $query= "SELECT b.barang_id, b.nama_barang, kb.nama_kategori, kb.harga
            FROM barang as b, kategori_barang as kb
            WHERE b.kategori_id=kb.kategori_id"; 
     return $this->db->query($query);
  } 
    
  function tampilkan_data()
  {    
    return $this->findAll();
  }
    
  function tampilkan_data_paging($halaman,$batas)
  {
      return $this->db->query("select * from kategori_barang");
  }     
     
    function post(){
        $data=array(
           'nama_kategori'=>  $this->input->post('kategori'),
           'harga' => $this->input->post('harga')
                    );
        $this->db->insert('kategori_barang',$data);
    }
    
    
    
    
    
    
    
    // function delete($id)
    // {
    //     $this->db->where('kategori_id',$id);
    //     $this->db->delete('kategori_barang');
    // }
}