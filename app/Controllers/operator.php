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
    
    public function editOperator($operator_id)
    {
            $operator = new model_operator();
            
            $data = [
                'operator' => $operator->where('operator_id', $operator_id)->first()
            ];
            // dd($data);
            return view('operator/form_edit', $data);          
    }

    public function handleEditOperator() {
        $operatorModel = new model_operator();
        $operatorData = $this->request->getPost();
        // dd($operatorData);
        $data = [
            'operator_id' => $operatorData['operator_id'],
            'nama_lengkap' => $operatorData['nama'],
            'username' => $operatorData['username'],
            'password' => $operatorData['password']
        ];
        // dd($data);
        $operatorModel->save($data);
        return redirect()->to('/operator');
    }
    
    public function handleDeleteOperator($operator_id) {
            (new model_operator)->delete($operator_id);
            return redirect()->to('/operator');
        
    }
}