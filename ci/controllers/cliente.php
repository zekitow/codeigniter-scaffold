<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

	function __construct() { 
		parent::__construct();
 		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('cliente_model');
	}

	function index() {
		$data['cliente'] = $this->cliente_model->find();
		$this->load->view('cliente/index', $data);
	}

	function create() {
		$this->load->view('cliente/create');
	}

	function save() {
		$data[] = array();
		$data['id'] = $this->input->post('id', TRUE);
		
		$data['nome'] = $this->input->post('nome', TRUE);
		$data['sobrenome'] = $this->input->post('sobrenome', TRUE);
		$data['data_nascimento'] = $this->input->post('data_nascimento', TRUE);
		$this->cliente_model->save($data);
		redirect('/cliente/index', 'refresh');
	}

	function edit() {
		$id = $this->uri->segment(3);
		$data['cliente'] = $this->cliente_model->find($id);
		$this->load->view('cliente/create', $data);
	}

	function destroy() {
		$id = $this->uri->segment(3);
		$data['cliente_model'] = $this->cliente_model->destroy($id);
		redirect('/cliente/index', 'refresh');
	}
}

?>

