module CodeigniterScaffold
  module Command
    class Scaffold

      attr_accessor :model, :attributes

      def run(args)
        return Kernel.puts("Some arguments are needed, please, try again.") if not valid?(args)
        parse(args)
      end

      protected
      def valid?(args)
        return false if not args or args.empty?
        return false if args.size <= 1
        true
      end

      def parse(args)
        @model = args.shift.capitalize
        @attributes = Array.new
        args.each {|a| @attributes << Attribute.new(a) }
        @attributes
      end
    end
  end
end
