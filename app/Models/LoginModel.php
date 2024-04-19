<?php

namespace App\Models;

use CodeIgniter\Model;


class LoginModel extends Model
{
    public function loginUser($data)
    {
        $builder = $this->db->table('users');
        $builder->select("uname,name");
        $builder->where('uname', $data['uname']);
        $builder->where('pwd', $data['pwd']);
        $res = $builder->get();
        $uname = $res->getRow('uname');
        if (count($res->getResultArray()) == 1) {
            // $this->session->set('uname',$userdata['uname']);
            return $uname;
        } else
            return false;
    }

    public function getUser($uname)
    {
        $builder = $this->db->table('users');
        $builder->select("*");
        $builder->where('uname', $uname);
        $res = $builder->get();
        return $res->getResultArray();
    }

    public function getGend($uname)
    {
        $builder = $this->db->table('users');
        $builder->select("gender");
        $builder->where('uname', $uname);
        $res = $builder->get();
        $res = $res->getResultArray();
        return $res[0]['gender'];
    }

    public function getProfiles($gend)
    {
        $builder = $this->db->table('users');
        $builder->select("*");
        $builder->where('gender', $gend);
        $res = $builder->get();
        $res = $res->getResultArray();
        return $res;
    }

    public function getSpecificProfiles($data)
    {
        $builder = $this->db->table('users');
        $builder->select("uname,name");
        $builder->where('uname', $data['u']);
       // $res = $builder->get();
        //return $res;
    }
}