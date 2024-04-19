<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegisterModel;
use App\Models\LoginModel;

class Profile extends Controller
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

        if ($this->request->getMethod() == 'post') {

            $userdata = [
                'sendby' => $this->request->getVar('uname'),
                'recdby' => $this->request->getVar('intuname'),
            ];
            $uname = $userdata['recdby'];
            $data = [];
            $data['profile'] = $this->loginModel->getUser($uname);
            $data['user'] = $this->loginModel->getUser($userdata['sendby']);
        }
        return view('userprofile.php', $data);
    }
}