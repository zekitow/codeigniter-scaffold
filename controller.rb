class Controller 

	# construct
	def initialize(model, fields)
		@model = model
		@fields = fields
	end

	# creates a new controller
	# for codeiginiter framework
	def create
		file = File.new("ci/controllers/#{@model}.php", "w")
		file.write(content())
		file.close
		puts "\tController #{@model} was successfully created."
	end

	# generates the controller content
	# based on model name
	def content
  	"<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n\n" +
    "class #{@model.capitalize} extends CI_Controller {\n\n " +
    "\tfunction __construct() {\n " +
    "\t\tparent::__construct();\n " +
		"\t\t$this->load->model('#{@model.downcase}_model');\n" +
    "\t}\n\n" +
		"\tfunction index() {\n"+
		"\t\t$data['#{@model.downcase}'] = $this->#{@model.downcase}_model->findAll();\n" +
		"\t\t$this->load->view('#{@model.downcase}/index', $data);\n" +
		"\t}\n\n"+
		"\tfunction save() {\n" +
		get_fields_from_view +
		"\t\t$this->#{@model.downcase}_model->save($data)\n" +
		"\t\t$this->load->view('#{@model.downcase}/index', $data);\n" +
		"\t}\n" +
    "}\n " +
    "?>"
	end

	def get_fields_from_view
		sets = "\t\t$data[] = array();\n"
		@fields.each { |f|
			sets += "\t\tarray_push($this->input->xss_clean($this->input->post('#{f}')));\n"
		}
		sets.to_s
	end

end
