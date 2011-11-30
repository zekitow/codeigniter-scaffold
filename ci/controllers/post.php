<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('post_model');
	}

	function index() {
		$data['post'] = $this->post_model->findAll();
		$this->load->view('post/index', $data);
	}

	function save() {
		$data[] = array();	
		
		array_push($data,$this->input->xss_clean($this->input->post('title')));
		array_push($data,$this->input->xss_clean($this->input->post('body')));
		$this->post_model->save($data);
		$this->load->view('post/index', $data);
	}
}
?>
