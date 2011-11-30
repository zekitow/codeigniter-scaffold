class Model 

	# construct
	def initialize(model, fields)
		@model = model
		@fields = fields
	end

	# creates a new model
	# for codeiginiter framework
	def create
		file = File.new("ci/models/#{@model}_model.php", "w")
		file.write(content())
		file.close
		puts "\tModel #{@model} was successfully created."
	end

	# generates the model content
	# based on model name
	def content
		"<?php\n\n" +
		"class #{@model.capitalize}_model extends CI_Model {\n\n" +
		"\tfunction save($data) {\n" +
	  get_fields_to_set  +
		"\t\t$this->db->insert('#{@model.downcase}');\n" +
		"\t\treturn $this->db->affected_rows();\n" +
		"\t}\n\n" +
		"\tfunction find($id) {\n" +
		"\t\t$this->db->where('id', $id);\n" +
		"\t\t$query = $this->db->get('#{@model.downcase}');\n" +
		"\t\treturn $query;\n" +
		"\t}\n\n" +
		"\tfunction findAll() {\n" +
		"\t\treturn $this->db->get('#{@model.downcase}')->result();\n" +
		"\t}\n\n" +
		"\tfunction update($id, $data) {\n" +
		"\t\t$this->db->where('id', $data['id']);\n" +
		get_fields_to_set  +
		"\t\t$this->db->update('#{@model.downcase}');\n" +
		"\t\treturn $this->db->affected_rows();\n" +
		"\t}\n" +
		"\tfunction destroy($id) {\n" +
		"\t\t$this->db->where('id', $id);\n" +
		"\t\t$this->db->delete('#{@model.downcase}');\n" +
		"\t\treturn $this->db->affected_rows();\n" +
		"\t}\n" +
		"}\n?>"
	end

	def get_fields_to_set
		sets = ''
		@fields.each { |f|
			sets += "\t\t$this->db->set('#{f}', $data['#{f}']);\n"
		}
		sets.to_s
	end

end
