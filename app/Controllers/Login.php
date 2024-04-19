<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;

class Login extends Controller
{
    public $loginModel;
    public $session;
    public function __construct()
    {
        helper('form');
        $this->loginModel = new LoginModel();
        $this->session = session();
    }
    public function index()
    {
        if ($this->session->get('ac') == true) {
            echo "<script>alert('Account Successfully Created')</script>";
            $this->session->set('ac' , false);
        }
        $data = [];
        $data['validation'] = null;
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'uname' => 'required',
                'pwd' => 'required',
            ];

            if ($this->validate($rules)) {
                $userdata = [
                    'uname' => $this->request->getVar('uname'),
                    'pwd' => md5($this->request->getVar('pwd'))
                ];

                $status = $this->loginModel->loginUser($userdata);

                if ($status) {
                    $this->session->set('login', true);
                    $this->session->set('uname', $status);
                    $this->session->set('access',true);
                    return redirect()->to(base_url() . 'dash');
                } 
                else
                {
                    $data['login'] = false;
                    echo $status;
                }

            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('user_login', $data);
    }
}