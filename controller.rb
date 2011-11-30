
require 'base'

class Controller < Base

	# construct
	def initialize(model, fields)
		@model = model
		@fields = fields
	end

	# creates a new controller
	# for codeiginiter framework
	def create
		read("templates/controller.php")
		parse_to("ci/controllers/#{@model.downcase}.php")
		puts "Controller #{@model} was successfully created."
	end

end
