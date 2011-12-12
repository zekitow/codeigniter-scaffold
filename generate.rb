#!/usr/bin/env ruby

require 'rubygems'
require 'thor'
require 'erb'
require 'attribute'

class Generate < Thor

  namespace "generator"

  desc      "scaffold", "scaffold *some-model*"
  def scaffold(model, *fields)

		@attributes = Array.new
		fields.each { |f|
			@attributes.push(Attribute::parse(f))
		}

		@model = model

		create "templates/controller.php","application/controllers/#{@model.downcase}.php"
		create "templates/model.php","application/models/#{@model.downcase}_model.php"
		create "templates/migration.sql","application/migrations/create_#{@model.downcase}.sql"
		mkdir("application/views/#{@model.downcase}")
		create "templates/view_create.php","application/views/#{@model.downcase}/create.php"
		create "templates/view_index.php","application/views/#{@model.downcase}/index.php"
	end

	desc  "clean", "Clean the output folders"
	def clean
		FileUtils.rm    Dir.glob('application/controllers/*')
		FileUtils.rm    Dir.glob('application/models/*')
		FileUtils.rm_rf Dir.glob('application/views/*')
		FileUtils.rm    Dir.glob('application/migrations/*')	
	end

	no_tasks {	

		def create(template, output)
			parse_to(template, output)
			puts "File #{output} was successfully created."
		end


		def parse_to(path_to_template, path_to_output)
				@template = File.read(path_to_template)
				template = ERB.new(@template)
				file = File.new(path_to_output,"w")
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
