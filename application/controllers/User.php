<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
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
        $data['user'] 			= $this->main->get_data_join('mst_user','mst_role','mst_user.id_role = mst_role.id_role');
		$this->load->view('User/index',$data);
	}
	public function add_data(){
		$id_role 				= $this->session->userdata('id_role');
        $data['menu'] 			= $this->main->get_menu_selected($id_role); 
        $data['role']           = $this->main->get_data('mst_role');
		$this->load->view('User/tambah',$data);
	}
	public function save_data(){
        $data['id_role'] 	    = $this->input->post('id_role');
        $data['nama_user'] 	    = $this->input->post('nama_user');
        $data['email_user'] 	= $this->input->post('email_user');
        $data['password_user'] 	= sha1($this->input->post('password_user',TRUE));
		
		$this->main->insert_data('mst_user',$data);
		redirect('user/index');
	}
	public function edit_data($id_user){
		$id_role 				= $this->session->userdata('id_role');
        $data['menu'] 			= $this->main->get_menu_selected($id_role);
        $data['role']           = $this->main->get_data('mst_role');
		$where 					= ['id_user' => $id_user];
		$data['user'] 			= $this->main->get_data_where('mst_user',$where);
		$this->load->view('user/ubah',$data);
	}
	public function update_data(){
		$where['id_user'] 		= $this->input->post('id_user');
        $data['id_role'] 	    = $this->input->post('id_role');
        $data['nama_user'] 	    = $this->input->post('nama_user');
        $data['email_user'] 	= $this->input->post('email_user');
        $data['password_user'] 	= sha1($this->input->post('password_user',TRUE));
		$this->main->update_data('mst_user',$data,$where);
		redirect('user/index');

	}
}
