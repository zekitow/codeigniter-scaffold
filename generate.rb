#!/usr/bin/env ruby

require 'rubygems'
require 'thor'
require 'controller'
require 'model'

class Generate < Thor
  namespace "generator"

  desc      "scaffold", "scaffold *some-model*"
  def scaffold(model, *fields)
		Controller.new(model, fields).create
		Model.new(model,fields).create
	end

end

Generate.start
