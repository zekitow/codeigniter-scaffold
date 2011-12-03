#!/usr/bin/env ruby

require 'rubygems'
require 'thor'
require 'erb'

class Generate < Thor

  namespace "generator"

  desc      "scaffold", "scaffold *some-model*"
  def scaffold(model, *fields)

		@model = model
		@fields = fields

		create "templates/controller.php","application/controllers/#{@model.downcase}.php"
		create "templates/model.php","application/models/#{@model.downcase}_model.php"
		create "templates/migration.sql","application/migrations/create_#{@model.downcase}.sql"
		mkdir("application/views/#{@model.downcase}")
		create "templates/view_create.php","application/views/#{@model.downcase}/create.php"
		create "templates/view_index.php","application/views/#{@model.downcase}/index.php"
	end

	no_tasks {	
		def create(template, output)
			read(template)
			parse_to(output)
			puts "File #{output} was successfully created."
		end

		def read(template)
			@template = File.read(template)
		end

		def parse_to(path)
				template = ERB.new(@template)
				file = File.new(path,"w")
				file.write(template.result(binding))
				file.close
		end

		def mkdir(directory_name)
			begin
				Dir::mkdir(directory_name)
			rescue
				# directory exists	
			end
		end
	}

end

# starts the thor job
Generate.start
