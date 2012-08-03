module CodeigniterScaffold
  module Command
    class Help

      def run(args)
        Kernel.puts("Usage: codeigniter-scaffold [options...]\r\n")
        Kernel.puts("  -h, --help show this help\r\n")
        Kernel.puts("  -i, --init unzip a codeigniter 2.1.2 installaion in the current dir\r\n")
      end

    end
  end
end
