<?php

namespace App\Models;

use CodeIgniter\Model;

class model_barang extends Model{

    protected $table = 'barang';
    protected $primary = 'barang_id';
    protected $protectFields = false;
    protected $useTimeStamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    public function getBarang()
    {
        return $this->findAll();
    }

    public function daftarStudio()
    {
        $builder = $this->db->table('kategori_barang');
        $builder->join('barang', 'kategori_barang.kategori_id = barang.kategori_id');
        $query = $builder->get()->getResultArray();
        return $query;
    }



    public function post($data)
    {
        $this->db->insert('barang',$data);

    }
    
    public function get_one($id)
    {
        $param  =   array('barang_id'=>$id);
        return $this->db->get_where('barang',$param);
    }
    
    public function edit($data,$id)
    {
        $this->db->where('barang_id',$id);
        $this->db->update('barang',$data);
    }
    
    
    // public function delete($id)
    // {
        
    //     $this->db->where('barang_id',$id);
    //     $this->db->delete('barang');
    // }
}