require 'test/unit'
require 'attribute'

class AttributeTest < Test::Unit::TestCase

	def test_should_be_instantiated_with_field_name
		attr = Attribute.new('body','text')
		assert_equal('body',attr.name)
	end

	def test_should_be_instantiated_with_field_type
		attr = Attribute.new('body','text')
		assert_equal('text',attr.type)
	end

	def test_should_parse_name_into_attribute
		arg = 'title:string'		
		attr = Attribute::parse(arg)
		assert_equal('title',attr.name)
	end

	def test_should_parse_type_into_attribute
		arg = 'title:string'		
		attr = Attribute::parse(arg)
		assert_equal('string',attr.type)
	end

	def test_should_validate_the_arg_type
		arg = 'title:invalid-type'
		assert_raise(SystemExit) do
			Attribute::parse(arg)
		end
	end

	def test_should_return_varchar_for_mysql
		arg = 'title:string'		
		attr = Attribute::parse(arg)
		assert_equal('VARCHAR(255)',	attr.mysql_type)
	end

	def test_should_return_text_for_mysql
		arg = 'title:text'		
		attr = Attribute::parse(arg)
		assert_equal('TEXT',	attr.mysql_type)
	end

end
