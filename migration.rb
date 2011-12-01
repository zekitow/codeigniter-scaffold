
require 'base'

class Migration < Base

	# construct
	def initialize(model, fields)
		@model = model
		@fields = fields
	end

	# creates a file migration
	# with SQL ANSI
	def create
		read("templates/migration.sql")
		parse_to("ci/migrations/create_#{@model.downcase}.sql")
		puts "Migration for #{@model} was successfully created."
	end

end
