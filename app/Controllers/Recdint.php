<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BoxModel;
use App\Models\LoginModel;
class Recdint extends Controller
{
    public $session;
    public $boxModel, $loginModel;
    public function __construct()
    {
        helper('form');
        $this->loginModel = new LoginModel();
        $this->boxModel = new BoxModel();
        $this->session = session();
    }
    public function index()
    {

        if ($this->session->get('access') == false)
            return view('user_login');

        $data = [];
        $uname = $this->session->get('uname');
        $data['user'] = $this->loginModel->getUser($uname);
        $tab = $uname . "box";
        $data['profiles'] = $this->boxModel->getBoxProfiles($tab, 'recd');
        return view('recd_interests.php', $data);
    }
}