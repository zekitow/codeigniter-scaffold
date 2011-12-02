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

		create "templates/controller.php","ci/controllers/#{@model.downcase}.php"
		create "templates/model.php","ci/models/#{@model.downcase}_model.php"
		create "templates/migration.sql","ci/migrations/create_#{@model.downcase}.sql"

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

		def write_file(path, content)
			file = File.new(path,"w")
			file.write(contet)
			file.close
		end
	}

end

# starts the thor job
Generate.start
