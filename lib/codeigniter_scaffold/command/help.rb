module CodeigniterScaffold
  module Command
    class Help

      def run(args)
        Kernel.print "Available runners for codeigniter  are: #{CodeigniterScaffold::COMMANDS.keys.join(', ')}"
        Kernel.print "Usage:\r\n\tcodeigniter-scaffold runner"
      end

    end
  end
end
