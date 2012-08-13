module CodeigniterScaffold
  class Attribute

    attr_accessor :name, :type, :mysql_type

    def initialize(argument)
      @name = argument.split(":")[0].downcase
      @type = argument.split(":")[1].downcase
      @mysql_type = mysql_type
      validate
    end

    private
    def self.valid_types
      %w(string text integer)
    end

    def validate
      unless Attribute.valid_types.include?(@type)
        puts "Attribute #{@type} is not supported. The supported attributes types are: #{Attribute.valid_types.join(", ")}"
        Kernel.exit
      end
    end

    def mysql_type
      return "VARCHAR(255)" if @type == 'string'
      return "INT" if @type == 'integer'
      "TEXT"
    end
  end
end
