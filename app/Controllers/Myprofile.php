<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegisterModel;
use App\Models\LoginModel;

class Myprofile extends Controller
{
    public $session;
    public $registerModel, $loginModel;
    public function __construct()
    {
        helper('form');
        $this->session = session();
        $this->registerModel = new RegisterModel();
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        if ($this->session->get('access') == false)
            return view('user_login');

        $uname = $this->session->get('uname');
        $data = [];
        $data['user'] = $this->loginModel->getUser($uname);
        return view('myprofile.php', $data);
    }
}