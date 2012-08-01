module CodeigniterScaffold
  module Command
    class Help

      def run(args)
        Kernel.puts "Available runners for vraptor are: #{CodeigniterScaffold::COMMANDS.keys.join(', ')}"
        Kernel.puts "Usage:"
        Kernel.puts "  codeigniter-scaffold runner"
      end

    end
  end
end
