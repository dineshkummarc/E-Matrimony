<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;

class Dash extends Controller
{
    public $session;
    public $loginModel;
    public function __construct()
    {
        helper('form');
        $this->loginModel = new LoginModel();
        $this->session = session();
    }
    public function index()
    {

        if ($this->session->get('access') == false)
            return view('user_login');

        $data = [];
        $uname = $this->session->get('uname');
        $data['uname'] = $uname;
        if($this->session->get('login') == true)
        {
            $data['user'] = $this->loginModel->getUser($uname);
            $gend = $this->loginModel->getGend($uname);
            if($gend == "male")
                $gend = "female";
            else
                $gend = "male";
            $data['profiles'] = $this->loginModel->getProfiles($gend);
            return view("dash",$data);
        }
        else
            return view("user_login");
    }
}