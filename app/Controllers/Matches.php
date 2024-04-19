<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BoxModel;
use App\Models\LoginModel;
class Matches extends Controller
{
    public $session;
    public $boxModel, $loginModel;
    public function __construct()
    {
        helper('form');
        $this->boxModel = new BoxModel();
        $this->loginModel = new LoginModel();
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
        $data['profiles'] = $this->boxModel->getBoxProfiles($tab, 'match');
        return view('mymatches.php', $data);
    }
}