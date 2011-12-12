<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class <%=@model.capitalize%> extends CI_Controller {

	function __construct() { 
		parent::__construct();
 		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('<%=@model.downcase%>_model');
	}

	function index() {
		$data['<%=@model.downcase%>'] = $this-><%=@model.downcase%>_model->find();
		$this->load->view('<%=@model.downcase%>/index', $data);
	}

	function create() {
		$this->load->view('<%=@model.downcase%>/create');
	}

	function save() {
		$data[] = array();
		$data['id'] = $this->input->post('id', TRUE);
		<% @attributes.each { |f| %>
		$data['<%= f.name %>'] = $this->input->post('<%= f.name %>', TRUE);<% } %>
		$this-><%=@model.downcase%>_model->save($data);
		redirect('/<%=@model.downcase%>/index', 'refresh');
	}

	function edit() {
		$id = $this->uri->segment(3);
		$data['<%=@model.downcase%>'] = $this-><%=@model.downcase%>_model->find($id);
		$this->load->view('<%=@model.downcase%>/create', $data);
	}

	function destroy() {
		$id = $this->uri->segment(3);
		$data['<%=@model.downcase%>_model'] = $this-><%=@model.downcase%>_model->destroy($id);
		redirect('/<%=@model.downcase%>/index', 'refresh');
	}
}

?>

