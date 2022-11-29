<?php namespace App\Controllers;


use App\Models\model_operator;
class operator extends BaseController{
    protected $model;
   public function __construct() {
        // parent::__construct();
        // $this->load->model('model_operator');
        // chek_session();
        $this->model = new model_operator();
        $this->helpers = ['form', 'url'];
    }
    
    public function index()
    {
        $operator = new model_operator();
            $data = [
                'operator' => $operator->findAll()
            ];
            return view('operator/lihat_data', $data);
    }
    
    public function handleTambahOperator() {
        $operator = new model_operator();
        $operatorData = $this->request->getPost();

        $operator->insert([
            'nama_lengkap' => $operatorData['nama'],
            'username' => $operatorData['username'],
            'password' => md5($operatorData['password']),
            'last_login' => '2022-11-24'
        ]);
        return redirect()->to('/operator');
    }

    public function post()
    {
        if(isset($_POST['submit'])){
            // proses data
            $nama       =  $this->input->post('nama',true);
            $username   =  $this->input->post('username',true);
            $password   =  $this->input->post('password',true);
            $data       =  array(   'nama_lengkap'=>$nama,
                                    'username'=>$username,
                                    'password'=>md5($password));
            $this->db->insert('operator',$data);
            redirect('operator');
        }
        else{
            $operator = new model_operator();
            $data = [
                'operator' => $operator->findAll()
            ];
            //$this->load->view('operator/form_input');
            // return ('template','operator/form_input');
            return view('operator/form_input',$data);
        }
    }
    
    public function edit()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $id         =  $this->input->post('id',true);
            $nama       =  $this->input->post('nama',true);
            $username   =  $this->input->post('username',true);
            $password   =  $this->input->post('password',true);
            if(empty($password)){
                 $data  =  array(   'nama_lengkap'=>$nama,
                                    'username'=>$username);
            }
            else{
                  $data =  array(   'nama_lengkap'=>$nama,
                                    'username'=>$username,
                                    'password'=>md5($password));
            }
             $this->db->where('operator_id',$id);
             $this->db->update('operator',$data);
             redirect('operator');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_operator->get_one($id)->row_array();
            //$this->load->view('operator/form_edit',$data);
            $this->template->load('template','operator/form_edit',$data);
        }
    }
    
    
    public function delete()
    {
        $id=  $this->uri->segment(3);
        $this->db->where('operator_id',$id);
        $this->db->delete('operator');
        redirect('operator');
    }
}