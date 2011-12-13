files = Dir.entries(File.dirname(__FILE__)).select do |file|
	file =~ /_test.rb$/
end
files.each { |file| require 'test/' + file }
