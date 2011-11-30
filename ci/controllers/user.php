<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

 	function __construct() {
 		parent::__construct();
 		$this->load->model('user_model');
	}

	function index() {
		$data['user'] = $this->user_model->findAll();
		$this->load->view('user/index', $data);
	}

	function save() {
		$data[] = array();
		array_push($this->input->xss_clean($this->input->post('nome')));
		array_push($this->input->xss_clean($this->input->post('sobrenome')));
		array_push($this->input->xss_clean($this->input->post('endereco')));
		$this->user_model->save($data)
		$this->load->view('user/index', $data);
	}}
 }
 ?>