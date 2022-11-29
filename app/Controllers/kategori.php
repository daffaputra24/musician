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
    
    public function edit()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $this->model_kategori->edit();
            redirect('kategori');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_kategori->get_one($id)->row_array();
            //$this->load->view('kategori/form_edit',$data);
            $this->template->load('template','kategori/form_edit',$data);
        }
    }
    
    
    public function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_kategori->delete($id);
        redirect('kategori');
    }
}