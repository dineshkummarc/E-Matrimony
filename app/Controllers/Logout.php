<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Logout extends Controller
{
    public $session;
    public function __construct()
    {
        $this->session = session();
    }
    public function index()
    {
        $this->session->set('access',false);
        $this->session->set('uname',null);
        return view('user_login');
    }
}
