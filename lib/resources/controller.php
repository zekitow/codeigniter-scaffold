<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * <%=@model.capitalize%> Controller.
 */
class <%=@model.capitalize%> extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->model('<%=@model.downcase%>_model');
	}

	# GET /<%=@model.downcase%>
	function index() {
		$data['<%=@model.downcase%>'] = $this-><%=@model.downcase%>_model->find();
		$data['content'] = '/<%=@model.downcase%>/index';
		$this->load->view('/includes/template', $data);
	}

	# GET /<%=@model.downcase%>/create
	function create() {
		$data['content'] = '/<%=@model.downcase%>/create';
		$this->load->view('/includes/template', $data);
	}

	# GET /<%=@model.downcase%>/edit/1
	function edit() {
		$id = $this->uri->segment(3);
		$data['<%=@model.downcase%>'] = $this-><%=@model.downcase%>_model->find($id);
		$data['content'] = '/<%=@model.downcase%>/create';
		$this->load->view('/includes/template', $data);
	}

	# GET /<%=@model.downcase%>/destroy/1
	function destroy() {
		$id = $this->uri->segment(3);
		$data['<%=@model.downcase%>'] = $this-><%=@model.downcase%>_model->destroy($id);
		redirect('/<%=@model.downcase%>/index', 'refresh');
	}

	# POST /<%=@model.downcase%>/save
	function save() {
		<% @attributes.each { |f| %>
		$this->form_validation->set_rules('<%= f.name %>', '<%= f.name.capitalize %>', 'required');<% } %>

		if ($this->form_validation->run()) {

			$data[] = array();
			$data['id'] = $this->input->post('id', TRUE);<% @attributes.each { |f| %>
			$data['<%= f.name %>'] = $this->input->post('<%= f.name %>', TRUE);<% } %>
			$this-><%=@model.downcase%>_model->save($data);
			redirect('/<%=@model.downcase%>/index', 'refresh');
		}
		$data['<%=@model.downcase%>'] =	$this->rebuild();
		$data['content'] = '/<%=@model.downcase%>/create';
		$this->load->view('/includes/template', $data);
	}

	function rebuild() {
		$object = new <%=@model.downcase%>_model();
		$object->id = $this->input->post('id', TRUE);<% @attributes.each { |f| %>
		$object-><%= f.name %> = $this->input->post('<%= f.name %>', TRUE);<% } %>
		return $object;
	}
}

?>

