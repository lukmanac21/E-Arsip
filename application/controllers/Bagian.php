<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('main');
		$this->load->library('session');
		if(!$this->session->has_userdata('id_user')) {
			redirect('Login');
		}
    }
	public function index()
	{
        $id_role 				= $this->session->userdata('id_role');
		$data['menu'] 			= $this->main->get_menu_selected($id_role); 
        $data['bagian'] 			= $this->main->get_data('mst_bagian');
		$this->load->view('bagian/index',$data);
	}
	public function add_data(){
		$id_role 				= $this->session->userdata('id_role');
        $data['menu'] 			= $this->main->get_menu_selected($id_role); 
        $data['role']           = $this->main->get_data('mst_role');
		$this->load->view('bagian/tambah',$data);
	}
	public function save_data(){
        $data['nama_bagian'] 	    = $this->input->post('nama_bagian');
	
		$this->main->insert_data('mst_bagian',$data);
		redirect('bagian/index');
	}
	public function edit_data($id_bagian){
		$id_role 				= $this->session->userdata('id_role');
        $data['menu'] 			= $this->main->get_menu_selected($id_role);
        $data['role']           = $this->main->get_data('mst_role');
		$where 					= ['id_bagian' => $id_bagian];
		$data['bagian'] 			= $this->main->get_data_where('mst_bagian',$where);
		$this->load->view('bagian/ubah',$data);
	}
	public function update_data(){
		$where['id_bagian'] 		= $this->input->post('id_bagian');
        $data['nama_bagian'] 	    = $this->input->post('nama_bagian');

		$this->main->update_data('mst_bagian',$data,$where);
		redirect('bagian/index');
    }
    public function delete_data(){
        $where['id_bagian'] 	= $this->input->post('id_bagian');
		
		$this->main->delete_data('mst_bagian',$where);
		redirect('bagian/index');

    }
}
