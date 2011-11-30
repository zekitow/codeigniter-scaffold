
require 'base'

class Model < Base

	# construct
	def initialize(model, fields)
		@model = model
		@fields = fields
	end

	# creates a new model
	# for codeiginiter framework
	def create
		read("templates/model.php")
		parse_to("ci/models/#{@model.downcase}_model.php")
		puts "Model #{@model} was successfully created."
	end

end
