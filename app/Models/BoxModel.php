<?php

namespace App\Models;

use CodeIgniter\Model;

class BoxModel extends Model
{
    public function getBoxProfiles($tab, $status)
    {
        $sql = "select * from users where uname in (select uname from $tab where status = '$status')";
        $res = $this->db->query($sql);
        $res = $res->getResultArray();
        if (count($res) >= 1)
            return $res;
        else
            return false;
    }
}