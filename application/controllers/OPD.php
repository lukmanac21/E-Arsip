<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OPD extends CI_Controller {
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
        $data['opd'] 			= $this->main->get_data('mst_opd');
		$this->load->view('opd/index',$data);
	}
	public function add_data(){
		$id_role 				= $this->session->userdata('id_role');
        $data['menu'] 			= $this->main->get_menu_selected($id_role); 
        $data['role']           = $this->main->get_data('mst_role');
		$this->load->view('opd/tambah',$data);
	}
	public function save_data(){
        $data['nama_opd'] 	    = $this->input->post('nama_opd');
	
		$this->main->insert_data('mst_opd',$data);
		redirect('opd/index');
	}
	public function edit_data($id_opd){
		$id_role 				= $this->session->userdata('id_role');
        $data['menu'] 			= $this->main->get_menu_selected($id_role);
        $data['role']           = $this->main->get_data('mst_role');
		$where 					= ['id_opd' => $id_opd];
		$data['opd'] 			= $this->main->get_data_where('mst_opd',$where);
		$this->load->view('opd/ubah',$data);
	}
	public function update_data(){
		$where['id_opd'] 		= $this->input->post('id_opd');
        $data['nama_opd'] 	    = $this->input->post('nama_opd');

		$this->main->update_data('mst_opd',$data,$where);
		redirect('opd/index');
    }
    public function delete_data(){
        $where['id_opd'] 	= $this->input->post('id_opd');
		
		$this->main->delete_data('mst_opd',$where);
		redirect('OPD/index');

    }
}
