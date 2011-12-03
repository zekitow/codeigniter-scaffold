<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {

	function __construct() { 
		parent::__construct();
 		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('posts_model');
	}

	function index() {
		$data['posts'] = $this->posts_model->find();
		$this->load->view('posts/index', $data);
	}

	function create() {
		$this->load->view('posts/create');
	}

	function save() {
		$data[] = array();
		$data['id'] = $this->input->post('id', TRUE);
		
		$data['title'] = $this->input->post('title', TRUE);
		$data['body'] = $this->input->post('body', TRUE);
		$this->posts_model->save($data);
		redirect('/posts/index', 'refresh');
	}

	function edit() {
		$id = $this->uri->segment(3);
		$data['posts'] = $this->posts_model->find($id);
		$this->load->view('posts/create', $data);
	}

	function destroy() {
		$id = $this->uri->segment(3);
		$data['posts_model'] = $this->posts_model->destroy($id);
		redirect('/posts/index', 'refresh');
	}
}

?>

