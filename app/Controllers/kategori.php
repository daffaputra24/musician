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
        // $this->load->library('pagination'); 
        // $config['base_url']   = base_url().'index.php/kategori/index/';
        // $config['total_rows'] = $this->model_kategori->tampilkan_data()->num_rows();
        // $config['per_page']   = 3; 
        // $this->pagination->initialize($config); 
        // $data['paging']     = $this->pagination->create_links();
        // $halaman            = $this->uri->segment(3);
        // $halaman            = $halaman==''?0:$halaman;
        // $data['record']     = $this->model_kategori->tampilkan_data_paging($halaman,$config['per_page']);
        // $this->template->load('template','kategori/lihat_data',$data);
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
   
    public function post()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $this->model_kategori->post();
            redirect('kategori');
        }
        else{
            //$this->load->view('kategori/form_input');
            $kategori = new model_kategori();
            $data = [
                'kategori' => $kategori->tampilkan_data()
            ];
            
            return view('kategori/form_input',$data);
        }
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