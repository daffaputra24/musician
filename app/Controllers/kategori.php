<?php namespace App\Controllers;


use App\Models\model_kategori;
class kategori extends BaseController{
    protected $model;
    
   public function __construct() {
        // parent::__construct();
        // $this->load->model('model_kategori');
        // chek_session();
        $this->model = new model_kategori();
        $this->helpers = ['form', 'url'];
    }
    
    public function index(){
        $kategori = new model_kategori();
            $data = [
                'kategori' => $kategori->findAll()
            ];
            return view('kategori/lihat_data', $data);
    }

    public function handleTambahKategori() {
        $kategori = new model_kategori();
        $kategoriData = $this->request->getPost();

        $kategori->insert([
            'nama_kategori' => $kategoriData['kategori'],
            'harga' => $kategoriData['harga'],
        ]);
        return redirect()->to('/kategori');
    }
   
    
    public function edit($kategori_id)
    {
            $kategori = new model_kategori();
            
            $data = [
                'kategory' => $kategori->where('kategori_id', $kategori_id)->first()
            ];
            // dd($data);
            return view('kategori/form_edit', $data);          
    }

    public function handleEditKategori() {
        $kategoriModel = new model_kategori();
        $kategoriData = $this->request->getPost();

        $data = [
            'kategori_id' => $kategoriData['kategori_id'],
            'nama_kategori' => $kategoriData['nama_kategori'],
            'harga' => $kategoriData['harga'],
        ];
        $kategoriModel->save($kategoriData);
        return redirect()->to('/kategori');
    }
    
    public function handleDeleteKategori($kategori_id) {
            (new model_kategori)->delete($kategori_id);
            return redirect()->to('/kategori');
        
    }
}