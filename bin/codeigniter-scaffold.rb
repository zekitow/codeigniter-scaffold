#!/usr/bin/env ruby

require File.dirname(__FILE__) + '/../lib/codeigniter-scaffold'

begin
  CodeigniterScaffold::Executor.new.run(ARGV.dup)
end
