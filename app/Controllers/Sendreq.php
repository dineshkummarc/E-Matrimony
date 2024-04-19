<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegisterModel;

class Sendreq extends Controller
{
    public $session;
    public $registerModel;
    public function __construct()
    {
        helper('form');
        $this->session = session();
        $this->registerModel = new RegisterModel();
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

            $status = $this->registerModel->createInterest($userdata);
            if($status == 1)
            {
                $this->registerModel->createMatch($userdata);
                $this->session->set('match',true);
            }
            else if($status == 0)
                $this->session->set('alreadysent',true);
            else if($status == 3)
                $this->session->set('sent',true);
            else if($status == 2)
                $this->session->set('alreadymatch',true);
            else if($status == 4)
                $this->session->set('error',true);
        }
        return redirect()->to(base_url() . 'dash');
    }
}