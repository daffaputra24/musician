<?php namespace App\Controllers;


use App\Models\model_barang;
use App\Models\model_kategori;
class Barang extends BaseController{
    
    protected $model;
    public function __construct() {
        // parent::__construct();
        // $this->load->model('model_barang'); 
        // chek_session();
        
        $this->model = new model_barang();
        $this->helpers = ['form', 'url'];
    }


    public function index() 
    {
        
        $barang = new model_barang();
            $data = [
                'barang' => $barang->daftarStudio()
            ];
            return view('barang/lihat_data', $data);
    }

    public function handleTambahRuangan() {
        $barang = new model_barang();
        $barangData = $this->request->getPost();

        $barang->insert([
            'nama_barang' => $barangData['nama_barang'],
            'kategori_id' => $barangData['kategori'],
        ]);
        return redirect()->to('/barang');
}

     
    public function post() 
    {
        if(isset($_POST['submit'])){
            // proses barang
            $nama       =   $this->input->post('nama_barang');
            $kategori   =   $this->input->post('kategori');
           // $harga      =   $this->input->post('harga');
            $data       = array('nama_barang'=>$nama,
                                'kategori_id'=>$kategori,
                                //'harga'=>$harga
                            );
            $this->model_barang->post($data);
            redirect('barang');
        }
        else{
            $kategori = new model_kategori();
            $data = [
                'kategori' => $kategori->tampilkan_data()
            ];
            // ]=  $this->model_kategori->tampilkan_data()->result();
            //$this->load->view('barang/form_input',$data);
            return view('barang/form_input',$data);
            // template->load('template','barang/form_input',$data);
        }
    }
    
    
    public function edit()
    {
       if(isset($_POST['submit'])){
            // proses barang
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_barang');
            $kategori   =   $this->input->post('kategori');
           // $harga      =   $this->input->post('harga');
            $data       = array('nama_barang'=>$nama,
                                'kategori_id'=>$kategori,
                              //  'harga'=>$harga
                            );
            $this->model_barang->edit($data,$id);
            redirect('barang');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_kategori');
            $data['kategori']   =  $this->model_kategori->tampilkan_data()->result();
            $data['record']     =  $this->model_barang->get_one($id)->row_array();
            //$this->load->view('barang/form_edit',$data);
            $this->template->load('template','barang/form_edit',$data);
        }
    }
    
    
    public function editBarang($barang_id)
    {
            $barang = new model_barang();
            $kategori = new model_kategori();
            
            $data = [
                'barang' => $barang->cariStudio($barang_id)[0],
                'kategori' => $kategori->findAll()
            ];
            // dd($data);
            return view('barang/form_edit', $data);          
    }

    public function handleEditBarang() {
        $barangModel = new model_barang();
        $barangData = $this->request->getPost();
        // dd($barangData);
        $data = [
            'barang_id' => $barangData['barang_id'],
            'kategori_id' => $barangData['kategori'],
            'nama_barang' => $barangData['nama_barang'],
        ];
        dd($data);
        $barangModel->save($barangData);
        return redirect()->to('/barang');
    }
    
    public function handleDeleteBarang($barang_id) {
            (new model_barang)->delete($barang_id);
            return redirect()->to('/barang');
        
    }
}