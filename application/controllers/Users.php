<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('M_users');
    }

	function index(){
        $role = $this->input->get('role[]');
        $role=(is_array($role))?$role:array();
        $tanggal = $this->input->get('tanggal');
        $dt1 = substr($tanggal,0,10);
        $dt2 = substr($tanggal,13,10);
        $data['users'] = $this->M_users->get_all($role,$dt1,$dt2);
		$this->load->view('index',$data);
    }
    
    public function tambah(){
		$this->load->view('tambah');
    }
    
    public function insert(){
        $data['nama'] = $this->input->post('nama');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        $data['role'] = $this->input->post('role');
        $q = $this->M_users->store($data);
        if($q){
            $this->session->set_flashdata('item', array('message' => 'Berhasil menambahkan data!', 'color' => 'success'));
        }else{
            $this->session->set_flashdata('item', array('message' => 'Gagal menyimpan data!', 'color' => 'danger'));
        }
        redirect('users');
    }
    
    public function edit($id){
        $data['data'] = $this->M_users->get_one($id);
		$this->load->view('edit',$data);
    }
    
    public function update(){
        $data['nama'] = $this->input->post('nama');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('newpassword');
        $data['role'] = $this->input->post('role');
        $id = $this->input->post('id');
        $q = $this->M_users->update($data,$id);
        if($q){
            $this->session->set_flashdata('item', array('message' => 'Berhasil mengubah data!', 'color' => 'success'));
        }else{
            $this->session->set_flashdata('item', array('message' => 'Gagal menyimpan data!', 'color' => 'danger'));
        }
        redirect('users');
    }
    
    public function delete($id){
        $q = $this->M_users->delete($id);
        if($q){
            $this->session->set_flashdata('item', array('message' => 'Berhasil menghapus data!', 'color' => 'success'));
        }else{
            $this->session->set_flashdata('item', array('message' => 'Gagal menghapus data!', 'color' => 'danger'));
        }
        redirect('users');
	}
}
