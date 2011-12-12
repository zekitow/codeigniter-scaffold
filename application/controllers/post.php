<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	function __construct() { 
		parent::__construct();
 		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('post_model');
	}

	function index() {
		$data['post'] = $this->post_model->find();
		$this->load->view('post/index', $data);
	}

	function create() {
		$this->load->view('post/create');
	}

	function save() {
		$data[] = array();
		$data['id'] = $this->input->post('id', TRUE);
		
		$data['nome'] = $this->input->post('nome', TRUE);
		$data['sobrenome'] = $this->input->post('sobrenome', TRUE);
		$this->post_model->save($data);
		redirect('/post/index', 'refresh');
	}

	function edit() {
		$id = $this->uri->segment(3);
		$data['post'] = $this->post_model->find($id);
		$this->load->view('post/create', $data);
	}

	function destroy() {
		$id = $this->uri->segment(3);
		$data['post_model'] = $this->post_model->destroy($id);
		redirect('/post/index', 'refresh');
	}
}

?>

