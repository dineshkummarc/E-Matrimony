<?php

namespace App\Models;

use CodeIgniter\Model;
class RegisterModel extends Model
{
    public function createUser($data)
    {
        $builder = $this->db->table('users');
        $res = $builder->insert($data);
        if($this->db->affectedRows() == 1)
        {
            $sql = "create table ".$data['uname']."box". "(uname varchar(20) primary key, status varchar(20))";
            $res = $this->db->simpleQuery($sql);
            return true;
        }
        else
            return false;
    }

    public function createInterest($data)
    {
        $sendtab = $data['sendby'].'box';
        $recdtab = $data['recdby'].'box';
        $flag1 = false;
        $flag2 = false;
        $flag3 = false;
        $sql = "select * from $sendtab where uname = '".$data['recdby']."' and status = 'sent'";
        $res = $this->db->query($sql);
        $res = $res->getResultArray();
        if(count($res) == 1)
        {
            $flag1 = true;
            return 0;    //already sent
        }

        $sql = "select * from $sendtab where uname = '".$data['recdby']."' and status = 'recd'";
        $res = $this->db->query($sql);
        $res = $res->getResultArray();
        if (count($res) == 1)
        {
            $flag2 = true;
            return 1; //match
        }

        $sql = "select * from $sendtab where uname = '" . $data['recdby'] . "' and status = 'match'";
        $res = $this->db->query($sql);
        $res = $res->getResultArray();
        if (count($res) == 1) {
            $flag3 = true;
            return 2;  //already a match
        }

       if($flag1 == false && $flag2 == false && $flag3 == false)
        {
            //data in sender box
            $mydata['uname'] = $data['recdby'];
            $mydata['status'] = 'sent';
            $builder = $this->db->table($sendtab);
            $builder->insert($mydata);
            
            //data in receiver box
            $mydata['uname'] = $data['sendby'];
            $mydata['status'] = 'recd';
            $builder = $this->db->table($recdtab);
            $builder->insert($mydata);   
            return 3; //success
        }
        else 
            return 4;  //error
    }
    public function createMatch($data)
    {
        $sendtab = $data['sendby'].'box';
        $recdtab = $data['recdby'].'box';

        $sql1 = "update $sendtab set status = 'match' where uname = '".$data['recdby']."'";
        $res1 = $this->db->simpleQuery($sql1);

        $sql2 = "update $recdtab set status = 'match' where uname = '" . $data['sendby'] . "'";
        $res2 = $this->db->simpleQuery($sql2);
        if($res1 && $res2)
            return true;
        else
            return false;
    }
}
