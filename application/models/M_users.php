<?php

class M_users extends CI_Model
{

    protected $table = 'users';

    function get_all($role,$dt1,$dt2){
        $this->db->select("id,nama,email,password,role,DATE(created_at) join_date");
        if(count($role) > 0){
            $this->db->group_start();
            foreach($role as $r){
                $this->db->or_where('role', $r);
            }
            $this->db->group_end();
        }
        if(strlen($dt1) == 10 && strlen($dt2) == 10){
            $dt1 = date('Y-m-d',strtotime($dt1));
            $dt2 = date('Y-m-d',strtotime($dt2));
            $this->db->where('DATE(created_at)>=', $dt1);
            $this->db->where('DATE(created_at)<=', $dt2);
        }
        $this->db->where('deleted_at', null);
        return $this->db->get($this->table)->result();
    }

    function store($data){
        $this->db->set('created_at', 'NOW()', FALSE);
        $this->db->set('updated_at', 'NOW()', FALSE);
        return $this->db->insert($this->table, $data);
    }

    function get_one($id){
        $this->db->select("id,nama,email,password,role,DATE(created_at) join_date");
        $this->db->where('deleted_at', null);
        $this->db->where('id', $id);
        return $this->db->get($this->table)->result()[0];
    }

    function update($data, $id)
    {
        $this->db->set('updated_at', 'NOW()', FALSE);
        $status = $this->db->update($this->table, $data, array('id' => $id));
        return $status;
    }

    function delete($id)
    {
        $this->db->where('id', $id);
    	$this->db->set('deleted_at', 'NOW()', FALSE);
		return $this->db->update($this->table);
    }
}
