module CodeigniterScaffold
  module Command
    class Scaffold

      def run(args)
        return Kernel.puts("Some arguments are needed, please, try again.") if not valid?(args)
      end

      private
      def valid?(args)
        return false if not args or args.empty?
        return false if args.size <= 1
        true
      end

    end
  end
end
