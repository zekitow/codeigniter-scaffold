module CodeigniterScaffold
  module Command
    class Scaffold

      attr_accessor :model, :attributes

      ARGS_ARE_NEEDED = "Some arguments are needed, please, try again."
      ARGS_WRONG      = "Something goes wrong! Aborting."

      def run(args)
        begin
          return Kernel.puts(ARGS_ARE_NEEDED) unless valid?(args)
          parse(args)

          create("controller.php","application/controllers/#{@model.downcase}.php")
          create("model.php","application/models/#{@model.downcase}_model.php")
          create("migration.sql","application/migrations/create_#{@model.downcase}.sql")
          mkdir ("application/views/#{@model.downcase}")
          create("view_create.php","application/views/#{@model.downcase}/create.php")
          create("view_index.php","application/views/#{@model.downcase}/index.php")
        rescue
          return Kernel.puts(ARGS_WRONG)
        end
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
      end

      private
      def create(template, output)
        parse_to(template, output)
        puts "File #{output} was successfully created."
      end

      def parse_to(path_to_template, path_to_output)
        resource_dir = File.dirname(__FILE__) + "/../../resources/"
        @template = File.read(File.join(resource_dir, path_to_template))
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

    end
  end
end
