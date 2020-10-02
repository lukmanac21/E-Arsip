<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Role extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('main');
        $this->load->library('session');
        $this->load->helper('main_helper');
    }
    public function index(){
        if ($this->session->userdata['logged_in'] == FALSE)
        {
            redirect(site_url("Login"));
        }
		$id_role				= $this->session->userdata('id_role');
		$data['menu'] 			= $this->main->get_menu_selected($id_role); 
		$data['role'] 		    = $this->main->get_data('mst_role');
        $this->load->view('Role/index',$data);
	}
    public function add_data(){
		$id_role				= $this->session->userdata('id_role');
		$data['menu'] 			= $this->main->get_menu_selected($id_role); 
        $this->load->view('Role/tambah', $data);
    }
    public function save_data(){
        $data['nama_role'] 		= $this->input->post('nama_role');

        $this->main->insert_data('mst_role',$data);
        redirect('Role/index');
    }
    public function access_data($id_role){
        $role_id                = $this->session->userdata('id_role');
        $data['menu']           = $this->main->get_menu_selected($role_id);
        $data['data']           = $this->main->show_all_data_order_by('mst_sub_menu','nama_sub_menu');
        $data['role']           = $this->db->get_where('mst_role',['id_role'=>$id_role])->row_array();
        $data['func'] 		    = $this->main->get_data('mst_function');
        
        $this->load->view('Role/akses', $data);
    }
    public function change_access(){

        $id_sub_menu            = $this->input->post('menuId');
        $id_role                = $this->input->post('roleId');
        $data                   = array(
                                        'id_sub_menu' => $id_sub_menu,
                                        'id_role' => $id_role
                                    );
        $result = $this->db->get_where('mst_user_access',$data);
                var_dump($result);
                if($result->num_rows() < 1){
                    $this->db->insert('mst_user_access',$data);
                }else{
                    $this->db->delete('mst_user_access',$data);
                }
    }

    public function edit_data($id_role){
        $where                  = array(
                                        'id_role' => $id_role
                                    );
        $role_id                = $this->session->userdata('id_role');
        $data['menu']           = $this->main->get_menu_selected($role_id);
        $data['role']           = $this->main->get_data_where('mst_role',$where);
        $this->load->view('Role/ubah',$data);
    }
    public function update_data(){
        $id_role = $this->input->post('id_role');
        $nama_role = $this->input->post('nama_role');
        $where = array(
            'id_role' => $id_role
        );
        $data  = array(
            'nama_role' => $nama_role
        );
        $this->main->update_data('mst_role',$data,$where);
        redirect('Role/index');
    }
    public function delete_data(){
		$where['id_role'] 		= $this->input->post('id_role');
		
        $this->main->delete_data('mst_role',$where);
        $this->main->delete_data('mst_user_access',$where);
		redirect('Role/index');
	}
}