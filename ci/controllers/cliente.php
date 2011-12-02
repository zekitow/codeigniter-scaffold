<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('cliente_model');
	}

	function index() {
		$data['cliente'] = $this->cliente_model->findAll();
		$this->load->view('cliente/index', $data);
	}

	function save() {
		$data[] = array();	
		
		array_push($data,$this->input->xss_clean($this->input->post('nome')));
		array_push($data,$this->input->xss_clean($this->input->post('sobrenome')));
		array_push($data,$this->input->xss_clean($this->input->post('idade')));
		$this->cliente_model->save($data);
		$this->load->view('cliente/index', $data);
	}
}
?>
