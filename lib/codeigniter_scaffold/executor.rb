module CodeigniterScaffold
  class Executor

    def run(args)
      action = args.shift if args
      COMMANDS.fetch(action, Command::Help)
    end

    COMMANDS = {
      "--help"   => Command::Help,
      "-h"       => Command::Help
    }
  end
end
