<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		$id_role			= $this->session->userdata('id_role');
		$data['menu'] 		= $this->main->get_menu_selected($id_role);
		$this->load->view('dashboard',$data);
	}

}
