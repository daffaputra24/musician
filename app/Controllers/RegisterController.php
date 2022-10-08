<?php namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
        $data = [
            'title' => 'Register | Musician: Solusi latihan bermusik murah dan nyaman'
        ];

        return view('auth/register', $data);
    }

    public function store()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $no_telp = $this->request->getPost('no_telp');

        $user = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'no_telp' => $no_telp
        ];

        $save = $this->model->save($user);

        if ($save) {
            session()->setFlashdata('success', 'Register Berhasil!');
            return redirect()->to(base_url('login'));
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }
}