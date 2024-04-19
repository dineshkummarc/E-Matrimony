<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegisterModel;

class Register extends Controller
{
    public $registerModel;
    public $session;
    public function __construct()
    {
        helper('form');
        $this->registerModel = new RegisterModel();
        $this->session = session();
    }
    public function index()
    {
        $data = [];
        $data['validation'] = null;
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'uname' => 'is_unique[users.uname]',
            ];

            if ($this->validate($rules)) {
                $userdata = [
                    'uname' => $this->request->getVar('uname'),
                    'pwd' => md5($this->request->getVar('pswd1')),
                    'name' => $this->request->getVar('fname') . " " . $this->request->getVar('lname'),
                    'mobno' => $this->request->getVar('phno'),
                    'email' => $this->request->getVar('eml'),
                    'gender' => $this->request->getVar('gend'),
                    'job' => $this->request->getVar('job'),
                    'address' => $this->request->getVar('addr1'),
                    'religion' => $this->request->getVar('religion'),
                ];
                $file = $this->request->getFile('photo');
                if($file->isValid() && !$file->hasMoved()){
                    $filename = $userdata['uname'] . ".jpg";
                    //$fileStatus = $file->move(WRITEPATH.'uploads/', $filename);
                    $fileStatus = $file->move(ROOTPATH.'public/assets/images', $filename);
                }

                if($fileStatus)
                {
                    $status = $this->registerModel->createUser($userdata);
                    if ($status)
                    {
                        $this->session->set('ac',true);
                        return redirect()->to(base_url().'login');
                    }
                    else
                        $data['unknown'] = true;
                }
                else
                {
                    $data['file'] = true;
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view("user_register", $data);
    }
}