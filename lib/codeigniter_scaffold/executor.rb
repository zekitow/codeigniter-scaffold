module CodeigniterScaffold
  class Executor

    def run(args)
      action = args.shift if args
      COMMANDS.fetch(action, Command::Help).new.run(args)
    end
  end

  COMMANDS = {
    "--help"     => Command::Help,
    "--init"     => Command::Init,
    "--scaffold" => Command::Scaffold,
    "-h"         => Command::Help,
    "-i"         => Command::Init,
    "-s"         => Command::Scaffold
  }

end
