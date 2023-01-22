<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController{

    protected $request;

    public function __construct(){
        $this->request = \Config\Services::request();
    }

    public function index(){
        $data = [];
        helper(['form']);


        if ($this->request->getMethod() === 'post') {

            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|validateUser[email, password]',
            ];

            $error = [
                'password' => [
                    'validateUser' => "Email or Password don't match"
                ]
            ];

            if (!$this->validate($rules, $error)) {
                $data['validation'] = $this->validator;
            } else {


                $newData = [
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                ];


                $model = new UserModel();
                $user = $model->where('email', $newData['email'])->first();

                $this->setUserSession($user);

                $base = base_url();
                return redirect()->to($base . '/dashboard');
            }
        } 

        return view('login', $data);
    }


    private function setUserSession($user){
        
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'isLoggedIn' => true
        ];

        session()->set($data);
        return true;
    }

    public function register(){

        $data = [];
        helper(['form']);


        if ($this->request->getMethod() === 'post') {
            
            $rules = [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else {


                $newData = [
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                ];


                $model = new UserModel();

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Registration successful!');
                $base = base_url();
                return redirect()->to($base.'/');
            }

        } 
    
        return view('register', $data);
    }


    public function profile(){

        $data = [];
        helper(['form']);
        $model = new UserModel();

        if ($this->request->getMethod() === 'post') {

            $rules = [
                'firstname' => 'required',
                'lastname' => 'required',
            ];

            if($this->request->getPost('password') !== ''){
                $rules['password'] = 'required|min_length[2]|max_length[255]';
            }

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {


                $newData = [
                    'id' => session()->get('id'),
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                ];

                if ($this->request->getPost('password') !== '') {
                    $newData['password'] = $this->request->getPost('password');
                }


                $model->save($newData);
                session()->setFlashdata('success', 'Updated successful!');
                return redirect()->to(base_url() . '/profile');
            }
        }

        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('profile', $data);
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url(). '/');
    }
}
