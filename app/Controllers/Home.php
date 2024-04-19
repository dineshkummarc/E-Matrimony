<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('user_login');
    }
    public function test()
    {
        $db = \Config\Database::connect();
        $query = $db->query("select * from users");
        $result = $query->getResult();
        print_r($result);
    }
}
